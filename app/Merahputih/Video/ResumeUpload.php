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

use Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Response;
use Request;

class ResumeUpload
{

	/**
	 * Temporary directory for uploading files
	 */
	const TEMP_DIRECTORY = 'temp/';

	/**
	 * Directory files will be moved to after the upload is completed
	 */
	const MAIN_DIRECTORY = 'videos/';

	/**
	 * Max allowed filesize. This is for unsupported browsers and
	 * as an additional security check in case someone bypasses the js filesize check.
	 *
	 * This must match the value specified in main.js
	 */
	const MAX_SIZE = 2147483648;

	/**
	 * Temporary directory
	 * @var string
	 */
	private $tempDirectory;

	/**
	 * Directory for completed uploads
	 * @var string
	 */
	private $mainDirectory;

	/**
	 * Name of the temporary file. Used as a reference to make sure chunks get written to the right file.
	 * @var string
	 */
	private $tempName;


	/**
	 *
	 *
	 */
	public $fileinfo = [];

	/**
	 * Constructor function, sets the temporary directory and main directory
	 */
	public function __construct() {
		$this->setTempDirectory(self::TEMP_DIRECTORY);
		$this->setMainDirectory(self::MAIN_DIRECTORY);
		$this->setTempName();
	}


	/**
	 * Create a random file name for the file to use as it's being uploaded
	 * @param string $value Temporary filename
	 */
	public function setTempName($value = null) {
		if($value) {
			$this->tempName = $value;
		}
		else {
			$this->tempName = Input::get('resumableFilename');
		}
	}

	/**
	 * Return the name of the temporary file
	 * @return string Temporary filename
	 */
	public function getTempName() {
		return $this->tempName;
	}

	/**
	 * Set the name of the temporary directory
	 * @param string $value Temporary directory
	 */
	public function setTempDirectory($value) {
		$this->tempDirectory = $value;
		return true;
	}

	/**
	 * Return the name of the temporary directory
	 * @return string Temporary directory
	 */
	public function getTempDirectory() {
		return $this->tempDirectory;
	}

	/**
	 * Set the name of the main directory
	 * @param string $value Main directory
	 */
	public function setMainDirectory($value) {
		$this->mainDirectory = $value;
	}

	/**
	 * Return the name of the main directory
	 * @return string Main directory
	 */
	public function getMainDirectory() {
		return $this->mainDirectory;
	}

	/**
	 * 
	 * @return void
	 */
	public function upload()
	{
		if (Request::isMethod('get'))
		{
    		   $temp_dir = $this->tempDirectory . Input::get('resumableIdentifier');
    		   $chunk_file = $temp_dir.'/'.$this->tempName.'.part'.Input::get('resumableChunkNumber');
    		   
	    	   if (File::exists($chunk_file)) {
	    	   	 return Response::json(array(), 200);
		       } 
		       else
		       {
		       	 return Response::json(array(), 404);
		       }
		       
	    }
	    
	    if (!empty($_FILES)) foreach ($_FILES as $file) {

		    // check the error status
		    if ($file['error'] != 0) {
		        $this->_log('error '.$file['error'].' in file '.$this->tempName);
		        continue;
		    }

		    // init the destination file (format <filename.ext>.part<#chunk>
		    // the file is stored in a temporary directory
		    $temp_dir = $this->tempDirectory . Input::get('resumableIdentifier');
		    $dest_file = $temp_dir.'/'.$this->tempName.'.part'.Input::get('resumableChunkNumber');

		    // create the temporary directory
		    if (!File::isDirectory($temp_dir)) {
		        File::makeDirectory($temp_dir, 0777, true);
		    }

		    // move the temporary file
		    if (!move_uploaded_file($file['tmp_name'], $dest_file)) {
		        $this->_log('Error saving (move_uploaded_file) chunk '.Input::get('resumableChunkNumber').' for file '.$this->tempName);
		    } else {

		        // check if all the parts present, and create the final destination file
		        $this->createFileFromChunks($temp_dir, $this->tempName, 
		                Input::get('resumableChunkSize'), Input::get('resumableTotalSize'));

		    }
		}
		return $this->fileinfo;
	}
	
	/**
	 *
	 * Logging operation - to a file (upload_log.txt) and to the stdout
	 * @param string $str - the logging string
	 */
	function _log($str) {

	    $log_str = date('d.m.Y').": {$str}\r\n";

	    File::append( $this->tempDirectory .'upload_log.txt',$log_str);

	}

	/**
	 * 
	 * Delete a directory RECURSIVELY
	 * @param string $dir - directory path
	 * @link http://php.net/manual/en/function.rmdir.php
	 */
	function rrmdir($dir) {

		File::deleteDirectory($dir);

	}

	/**
	 *
	 * Check if all the parts exist, and 
	 * gather all the parts of the file together
	 * @param string $dir - the temporary directory holding all the parts of the file
	 * @param string $fileName - the original file name
	 * @param string $chunkSize - each chunk size (in bytes)
	 * @param string $totalSize - original file size (in bytes)
	 */
	function createFileFromChunks($temp_dir, $fileName, $chunkSize, $totalSize) {

	    // count all the parts of this file
	    $total_files = 0;
	    foreach(scandir($temp_dir) as $file) {
	        if (stripos($file, $fileName) !== false) {
	            $total_files++;
	        }
	    }

	    // check that all the parts are present
	    // the size of the last part is between chunkSize and 2*$chunkSize
	    if ($total_files * $chunkSize >=  ($totalSize - $chunkSize + 1)) {

	        // create the final destination file 
	        if (($fp = fopen($this->mainDirectory.$fileName, 'w')) !== false) {
	            for ($i=1; $i<=$total_files; $i++) {
	                fwrite($fp, file_get_contents($temp_dir.'/'.$fileName.'.part'.$i));
	                $this->_log( $fileName.' writing chunk '.$i);
	            }
	            fclose($fp);
	            //set return fileinfo
	            $this->fileinfo = array(
	            	'filename'	=>	$fileName,
	            	'extension' =>  File::extension($this->mainDirectory.$fileName),
	            	'size'		=>  File::size($this->mainDirectory.$fileName),
	            	);
	        } else {
	            $this->_log('cannot create the destination file');
	            return false;
	        }

	        // rename the temporary directory (to avoid access from other 
	        // concurrent chunks uploads) and than delete it
	        if (rename($temp_dir, $temp_dir.'_UNUSED')) {
	            $this->rrmdir($temp_dir.'_UNUSED');
	        } else {
	            $this->rrmdir($temp_dir);
	        }
	    }
	}
}