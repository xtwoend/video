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

use Illuminate\Support\ServiceProvider;

use Merahputih\Video\Video;
use Merahputih\Video\Repositories\DbRepository;
use Merahputih\Video\Repositories\DbInfoRepository;

class VideoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{	
		//
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerRepository();
		$this->registerInfoRepository();
		$this->registerVideo();
	}
	
	/**
     * Register the repository.
     *
     * @return void
     */
    private function registerRepository()
    {
        $this->app['video.repository'] = $this->app->share(function($app)
        {
            $repository = $app['config']->get('video.repository');
            $model      = $app['config']->get('video.model');
            
            switch ($repository)
            {
                case 'database':
                    $class = '\\'.ltrim($model, '\\');

                    return new DbRepository(new $class);
                    break;
            }

            throw new \InvalidArgumentException("Invalid repository [$repository] chosen for Order.");
        });
    }

    /**
     * Register the repository.
     *
     * @return void
     */
    private function registerInfoRepository()
    {
        $this->app['video.infoRepository'] = $this->app->share(function($app)
        {
            $repository = $app['config']->get('video.repository');
            $model      = $app['config']->get('video.infomodel');
            
            switch ($repository)
            {
                case 'database':
                    $class = '\\'.ltrim($model, '\\');

                    return new DbInfoRepository(new $class);
                    break;
            }

            throw new \InvalidArgumentException("Invalid repository [$repository] chosen for Order.");
        });
    }

    /**
     * Register the order.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function registerVideo()
    {
        $this->app['video'] = $this->app->share(function($app)
        {
            return new Video(
                $app['video.repository'],
                $app['video.infoRepository']
            );
        });
    }

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('video', 'video.repository','video.infoRepository');
	}

}
