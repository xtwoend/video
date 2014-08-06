<?php namespace Merahputih\Video;

/**
 * Backend App
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Backend
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Rafasamp\Sonus\Facade as Sonus;
use Illuminate\Http\Request;

class VideoUpload {

	  /**
     * static app
     *
     * @var array
     */
    public static $app;


    /**
     * Create a new Order object.
     *
     * @param  VideoRepositoryInterface $repository
     * @param  integer $ownerId
     *
     * @return void
     */
    public function __construct()
    {   
        if ( ! static::$app )
            static::$app = app();
    }
	

	/**
     * Upload a file.
     * Handles folder creation.
     * @param UploadedFile $file
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     * @return array
     */
    public function upload(UploadedFile &$file)
    {
        // Check the upload type is valid by extension and mimetype
        $this->verifyUploadType($file);

        // Get the folder for uploads
        $folder = $this->getUploadFolder();

        // Check file size
        if ($file->getSize() > static::$app['config']->get('video.max_upload_file_size')) {
            throw new FileException('File is too big.');
        }

        // Check to see if file exists already. If so append a random string.
        list($folder, $file) = $this->resolveFileName($folder, $file);

        // Upload the file to the folder. Exception thrown from move.
        $file->move($folder, $file->fileSystemName);

        //convert to flv
        //$this->convertTo( $folder.$file->fileSystemName , $folder , $file->fileSystemName, '.flv');
        
        //shell_exec("ffmpeg -i " . $folder.$file->fileSystemName ." -vf scale=320:240 ". static::$app['path.base']."/public/streams/" . $this->getBasename($file) . ".mp4"); 
        
        //shell_exec("ffmpeg -i " . $folder.$file->fileSystemName ." ". static::$app['path.base']."/public/covers/" . $this->getBasename($file) . ".jpg"); 
        
        Sonus::convert()->input($folder.$file->fileSystemName)->output(static::$app['path.base'].'/public/streams/' . $this->getBasename($file) . '.mp4')->go();

        Sonus::getThumbnails($folder.$file->fileSystemName, static::$app['path.base'].'/public/covers/'.$file->fileSystemName, 3); // Yields 5 thumbnails

        // If it returns an array it's a successful video. Otherwise an exception will be thrown.
        return array($this->cleanPath(static::$app['config']->get('video.upload_folder')).$this->dateFolderPath, $file->fileSystemName, $this->getBasename($file) . '.mp4', 'covers/'. $this->getBasename($file). '.jpg');
    }

    
    /**
     * Resolve whether the file exists and if it already does, change the file name.
     * @param string $folder
     * @param $file
     * @param bool $enableObfuscation
     * @return array
     */
    public function resolveFileName($folder, UploadedFile $file, $enableObfuscation=true)
    {
        if(! isset($file->fileSystemName)) {
            $file->fileSystemName = $file->getClientOriginalName();
        }

        if(static::$app['config']->get('video.obfuscate_filenames') && $enableObfuscation) {
            $fileName = basename($file->fileSystemName, $file->getClientOriginalExtension()) . '_' . md5( uniqid(mt_rand(), true) ) . '.' . $file->getClientOriginalExtension();
            $file->fileSystemName = $fileName;
        } else {
            $fileName = $file->fileSystemName;
        }

        // If file exists append string and try again.
        if (File::isFile($folder.$fileName)) {
            // Default file postfix
            $i = '0000';

            // Get the file bits
            $basename = $this->getBasename($file);
            $basenamePieces = explode('_', $basename);

            // If there's more than one piece then let see if it's our counter.
            if (count($basenamePieces) > 1) {
                // Pop the last part of the array off.
                $last = array_pop($basenamePieces);
                // Check to see if the last piece is an int. Must be 4 long. This isn't the best, but it'll do in most cases.
                if (strlen($last) == 4 && (is_int($last) || ctype_digit($last))) {
                    // Add one, which converts this string to an int. Gotta love PHP ;)
                    $last += 1;
                    // Prepare to add the proper amount of 0's in front
                    $b = 4 - strlen($last);
                    $i = $last;
                    for ($c=1; $c <= $b; $c++) {
                        $i = '0' . $i;
                    }
                } else {
                    // Put last back on the array
                    array_push($basenamePieces, $last);
                }
                // Put the pieces back together without the postfix.
                $basename = implode('_', $basenamePieces);
            }

            // Create the filename
            $file->fileSystemName = $basename . '_' . $i . '.' . $file->getClientOriginalExtension();
            list($folder, $file) = $this->resolveFileName($folder, $file, false);
        }

        return array($folder, $file);
    }

    public function getBasename($file)
    {
        // Get the file bits
        $basename = basename((isset($file->fileSystemName) ? $file->fileSystemName : $file->getClientOriginalName()), $file->getClientOriginalExtension());
        // Remove trailing period
        return (substr($basename, -1) == '.' ? substr($basename,0,strlen($basename)-1) : $basename);
    }
    
    /**
     * Get upload path with date folders
     * @param $date
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     * @throws \Doctrine\Common\Proxy\Exception\InvalidArgumentException
     * @return string
     */
    public function getUploadFolder($date=null)
    {
        // Check that a date was given
        if (is_null($date)) {
            $date = Carbon::now();
        } elseif (! is_a($date, 'Carbon')) {
            throw new InvalidArgumentException('Must me a Carbon object');
        }

        // Get the configuration value for the upload path
        $path = static::$app['config']->get('video.upload_folder');

        $path = $this->cleanPath($path);

        // Add the project base to the path
        $path = static::$app['path.base'].$path;

        $this->dateFolderPath = str_replace('-','/',$date->toDateString()) . '/';

        // Parse in to a folder format. 2013:03:30 -> 2013/03/30/{filename}.jpg
        $folder = $path . $this->dateFolderPath;

        // Check to see if the upload folder exists
        if (! File::exists($folder)) {
            // Try and create it
            if (! File::makeDirectory($folder, static::$app['config']->get('video.upload_folder_permission_value'), true)) {
                throw new FileException('Directory is not writable. Please make upload folder writable.');
            }
        }

        // Check that the folder is writable
        if (! File::isWritable($folder)) {
            throw new FileException('Folder is not writable.');
        }

        return $folder;
    }

    /**
     * Checks the upload vs the upload types in the config.
     * @param $file
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    public function verifyUploadType(UploadedFile $file)
    {
        if (! in_array($file->getMimeType() , static::$app['config']->get('video.upload_file_types')) ||
            ! in_array(strtolower($file->getClientOriginalExtension()), static::$app['config']->get('video.upload_file_extensions'))) {
            throw new FileException('Invalid upload type.');
        }
    }

 	/**
     * Checks the upload vs the upload types in the config.
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return bool
     */
    public function verifyImageType($file)
    {
        if (in_array($file->getMimeType() , static::$app['config']->get('video.image_file_types')) ||
            in_array(strtolower($file->getClientOriginalExtension()), static::$app['config']->get('video.image_file_extensions'))) {
            return true;
        } else {
            return false;
        }
    }

    public function cleanPath($path)
    {
        // Check to see if it begins in a slash
        if(substr($path, 0) != '/') {
            $path = '/' . $path;
        }

        // Check to see if it ends in a slash
        if(substr($path, -1) != '/') {
            $path .= '/';
        }

        return $path;
    }
}