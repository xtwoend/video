<?php 

/**
 * Video Controller
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    controllers
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */



class VideoController extends BaseController
{
	public function __construct()
	{
		parent::__construct();


	}

	public function watch()
	{	
		$this->theme->asset()->add('jwplayer', 'assets/js/jwplayer.js');
		$this->theme->asset()->add('jwplayerhtml5', 'assets/js/jwplayer.html5.js');
		

		$codevideo = Input::get('v', false);
		$video = Video::getRepository()->getModel()->where('code','=', $codevideo)->first();
		
		$this->theme->setTitle($video->name);
		$this->theme->setDesciption($video->description);
		$this->theme->setCover($video->cover);

		$data['video'] = $video;
		return $this->theme->of('video.watch', $data)->render();
	}

}