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

use Merahputih\Video\Repositories\VideoRepositoryInterface;
use Merahputih\Video\Repositories\VideoInfoRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Merahputih\Video\VideoUpload;
use Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Rafasamp\Sonus\Facade as Sonus;
use Illuminate\Support\Facades\Session;

class Video {

    /**
     * Video repository.
     *
     * @var VideoRepositoryInterface
     */
    protected $repository;

    /**
     * Video repository.
     *
     * @var VideoRepositoryInterface
     */
    protected $infoRepository;


    /**
     * Video owner ID.
     *
     * @var mixed
     */
    protected $ownerId;


    /**
     * Video license.
     *
     * @var mixed
     */
    protected $license;
    
    /**
     * Video.
     *
     * @var VideoInterface
     */
    protected $model;

    /**
     * Upload.
     *
     * @var VideoUpload
     */
    protected $uploadfile;

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
    public function __construct(
        VideoRepositoryInterface $repository,
        VideoInfoRepositoryInterface $infoRepository,
        $ownerId = 0 ,
        $privacy = ''  
    )
    {
        $this->repository     = $repository;
        $this->infoRepository = $infoRepository;
        $this->ownerId        = $ownerId;
        $this->privacy        = $privacy;
        $this->uploadfile     = new VideoUpload;

        if (empty($this->privacy)) {
            $this->license = \Merahputih\Video\Models\VideoInfo::LICENSE;
        }

        if ( ! static::$app )
            static::$app = app();
    }

    /**
     * Set order repository
     *
     * @param  VideoRepositoryInterface $repository
     *
     * @return void
     */
    public function setRepository(VideoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the order repository
     *
     * @return UploadRepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Set order infoRepository
     *
     * @param  VideoRepositoryInterface $repository
     *
     * @return void
     */
    public function setinfoRepository(VideoInfoRepositoryInterface $infoRepository)
    {
        $this->infoRepository = $infoRepository;
    }

    /**
     * Return the order infoRepository
     *
     * @return UploadRepositoryInterface
     */
    public function getinfoRepository()
    {
        return $this->infoRepository;
    }

    /**
     * Set order owner
     *
     * @param  integer $ownerId
     *
     * @return void
     */
    public function setOwner($ownerId)
    {
        $this->ownerId = $ownerId;
    }

    /**
     * Upload proses
     *
     * @param  Object File
     *
     * @return void
     */
    public function upload(UploadedFile $file)
    {	
        
    	// Create a new order if not exist
        if (null === $this->model) {

	    	$this->model = $this->repository->getModel()->newInstance();

	        // File extension
            $this->model->code         = Str::random(10);
	        $this->model->extension    = $file->getClientOriginalExtension();
	        $this->model->mimetype     = $file->getMimeType();
	        $this->model->owner_id     = $this->ownerId;
	        $this->model->size         = $file->getSize();
	        list($this->model->path, $this->model->filename, $this->model->playback, $this->model->cover ) = $this->uploadfile->upload($file);
	        $this->model->save();
        }

        return $this;
    }

    /**
     * 
     * @return void
     */
    public function uploadx()
    {
        $upload = new \Merahputih\Video\ResumeUpload();
        return $upload->upload();
    }

    /**
     * Big Upload 
     * ini adalah upload menggunakan metode chuck 
     * dengan ajax file
     */
    public function bigUploads()
    {   
        $bigUpload = new BigUpload;
        $folder = $this->uploadfile->getUploadFolder();
        $bigUpload->setTempDirectory(public_path('/videos/tmp'));
        $bigUpload->setMainDirectory($folder);

        $bigUpload->setTempName(Input::get('key', null));
        switch(Input::get('action')) {
            case 'upload':
                return $bigUpload->uploadFile();
                break;
            case 'abort':
                return $bigUpload->abortUpload();
                break;
            case 'finish':
                $rand       = Str::random(10);
                $randomname = $rand  . '.' . Input::get('ext');
                $finish = $bigUpload->finishUpload($randomname);
                if(0 === $finish['errorStatus']){
                    // Create a new order if not exist
                    if (null === $this->model) {
                        $this->model = $this->repository->getModel()->newInstance();
                        /*
                        //shell_exec("ffmpegthumbnailer -i " . $folder. $randomname ." -o ". static::$app['path.base']."/public/covers/" . $rand . ".png -s 400"); 
                        shell_exec("ffmpeg  -itsoffset -5  -i ". $folder. $randomname  ." -vcodec mjpeg -vframes 5 -an -f rawvideo  ".static::$app['path.base']."/public/covers/" . $rand . ".jpg");
                        //Sonus::convert()->input( $folder. $randomname )->output(static::$app['path.base'].'/public/streams/' . $randomname )->go();
                        $resolusi = $this->__get_video_dimensions($folder.$randomname);
                        if($resolusi['height'] >= 720){
                          shell_exec("ffmpeg -i {$folder}{$randomname} -s 960x720 -vcodec h264 -acodec aac -strict -2 {$folder}{$rand}_720.mp4");  
                        }
                        shell_exec("ffmpeg -i {$folder}{$randomname} -s 480×360 -vcodec h264 -acodec aac -strict -2 {$folder}{$rand}_360.mp4");
                        */
                        // File extension
                        $this->model->code         = $rand;
                        $this->model->extension    = File::extension($folder.$randomname);
                        $this->model->mimetype     = File::type($folder.$randomname);
                        $this->model->owner_id     = $this->ownerId;
                        $this->model->size         = File::size($folder.$randomname);
                        $this->model->path         = $this->uploadfile->cleanPath(static::$app['config']->get('video.upload_folder_public_path')).$this->uploadfile->dateFolderPath; 
                        $this->model->filename     = $randomname;
                        $this->model->playback     = $randomname;
                        $this->model->cover        = $rand . '.png';
                        $this->model->save(); 

                        if (null !== $this->model) {
                            $info = $this->infoRepository->getModel()->where('video_id',$this->model->getId())->first();
                            // Create a new item
                            $info = ($info)?  $info : $this->infoRepository->getModel()->newInstance();
                            $info->fill(array_merge(array('name'=> Input::get('name')), array(
                                'video_id' => $this->model->getId()
                            )));

                            if ( ! $info->save()) {
                                throw new Exception("Could not create a video info");
                            }
                        }
                    }
                    
                    return array('errorStatus' => 0, 'id' => $this->model->getId(), 'code' => $this->model->code );
                }
                return $finish;
                break;
            case 'post-unsupported':
                //return $bigUpload->postUnsupported();
                return $this->upload(Input::file('bigUploadFile'));
                break;
        }
    }

    /** 
     * Get the dimensions of a video file 
     * 
     * @param unknown_type $video 
     * @return array(width,height) 
     * @author Jamie Scott 
     */  
    function __get_video_dimensions($video = false) {  
        $ffmpeg = "ffmpeg";
        if (file_exists ( $video )) {  
        $command = $ffmpeg . ' -i ' . $video . ' -vstats 2>&1';  
        $output = shell_exec ( $command );  
      
        $result = ereg ( '[0-9]?[0-9][0-9][0-9]x[0-9][0-9][0-9][0-9]?', $output, $regs );  
          
            if (isset ( $regs [0] )) {  
                $vals = (explode ( 'x', $regs [0] ));  
                $width = $vals [0] ? $vals [0] : null;  
                $height = $vals [1] ? $vals [1] : null;  
                return array ('width' => $width, 'height' => $height );  
            } else {  
                return false;  
            }  
        } else {          
            return false;  
        }  
    }

    public function info(array $attributes)
    {   
        $this->model = (is_null($this->model))? $this->repository->getModel()->find($attributes['video_id']) : $this->model ;
        
        if (null !== $this->model) {
            $info = $this->infoRepository->getModel()->where('video_id',$this->model->getId())->first();
            // Create a new item
            $info = ($info)?  $info : $this->infoRepository->getModel()->newInstance();
            $info->fill(array_merge($attributes, array(
                'video_id' => $this->model->getId()
            )));

            if ( ! $info->save()) {
                throw new Exception("Could not create a video info");
            }
        }

        return $this->model;
    }
    
}