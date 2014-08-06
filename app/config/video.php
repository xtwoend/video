<?php

return array(

	'repository' => 'database',

	/*
	|  model untuk menampung data upload
	|   
	|  
	*/
	'model'		=>	'Merahputih\Video\Models\Video',

	/*
	|  video info model untuk menampung data 
	|   
	|  
	*/
	'infomodel'		=>	'Merahputih\Video\Models\VideoInfo',

	/*
    |--------------------------------------------------------------------------
    | Upload Folder
    |--------------------------------------------------------------------------
    |
    | Folder the Uploader will use.
    | This will need to writable by the web server.
    | Recommendation: public/uploads/
    |
    */

    'upload_folder' => 'public/videos/',
    'upload_folder_public_path' => 'videos/',
    'upload_folder_permission_value' => 0777, // Default 0777 - Other likely values 0775, 0755

     /*
    |--------------------------------------------------------------------------
    | Upload Files
    |--------------------------------------------------------------------------
    |
    | Configuration items for uploaded files.
    |
    */

    'upload_file_types' => array(
    						'application/octet-stream',
							'application/annodex',
							'application/mp4',
							'application/ogg',
							'application/vnd.rn-realmedia',
							'application/x-matroska',
							'video/3gpp',
							'video/3gpp2',
							'video/annodex',
							'video/divx',
							'video/flv',
							'video/h264',
							'video/mp4',
							'video/mp4v-es',
							'video/mpeg',
							'video/mpeg-2',
							'video/mpeg4',
							'video/ogg',
							'video/ogm',
							'video/quicktime',
							'video/ty',
							'video/vdo',
							'video/vivo',
							'video/vnd.rn-realvideo',
							'video/vnd.vivo',
							'video/webm',
							'video/x-bin',
							'video/x-cdg',
							'video/x-divx',
							'video/x-dv',
							'video/x-flv',
							'video/x-la-asf',
							'video/x-m4v',
							'video/x-matroska',
							'video/x-motion-jpeg',
							'video/x-ms-asf',
							'video/x-ms-dvr',
							'video/x-ms-wm',
							'video/x-ms-wmv',
							'video/x-msvideo',
							'video/x-sgi-movie',
							'video/x-tivo',
							'video/avi',
							'video/x-ms-asx',
							'video/x-ms-wvx',
							'video/x-ms-wmx',
							),
	
    'upload_file_extensions' => array('avi','mp4','oog','flv'), // Case insensitive

    // Max upload size - In BYTES. 1GB = 1073741824 bytes, 10 MB = 10485760, 1 MB = 1048576
    'max_upload_file_size' => 50485760, // Converter - http://www.beesky.com/newsite/bit_byte.htm

    // [True] will change all uploaded file names to an obfuscated name. (Example_Image.jpg becomes Example_Image_p4n8wfnt8nwh5gc7ynwn8gtu4se8u.jpg)
    // [False] attempts to leaves the filename as is.
    'obfuscate_filenames' => false, // True/False
);