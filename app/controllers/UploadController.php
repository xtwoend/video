<?php 


class UploadController extends BaseController
{
	public function __construct()
	{
		parent::__construct();


	}

	public function getUpload()
	{		
		return $this->theme->of('video.uploadresumeble')->render();
	}

	public function postVideo()
	{	
		//$data = Video::bigUploads();
		
		//return $data;
		
		$fileData = file_get_contents('php://input');
		$handle = fopen(public_path('/videos/tmp/').Input::get('key', null), 'a');

		fwrite($handle, $fileData);
		fclose($handle);

		return array(
			'key' => Input::get('key', null),
			'errorStatus' => 0
		);
		
	}

	/**
	 * 
	 */
	public function addInformasi()
	{	
		$id = Input::get('video_id', false);
		
		$model = Video::info(Input::all());
		$model->tag(explode(',', Input::get('tags')));
		return array('statusError' => 0 ,'data'=>$model);
	}

	/**
	 * 
	 * @return void
	 */
	public function upload()
	{
		return Video::uploadx();
	}
}