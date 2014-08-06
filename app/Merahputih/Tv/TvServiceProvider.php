<?php namespace Merahputih\Tv;

/**
 * Tv Packages
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Tv
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Illuminate\Support\ServiceProvider;
use Merahputih\Tv\Repositories\DbRepository;
use Merahputih\Tv\Tv;

class TvServiceProvider extends ServiceProvider {

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
		$this->registerTv();
	}
	
	/**
     * Register the repository.
     *
     * @return void
     */
    private function registerRepository()
    {
        $this->app['tv.repository'] = $this->app->share(function($app)
        { 
            return new DbRepository(new \Merahputih\Tv\Models\Tv);
        });
    }

    

    /**
     * Register the order.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function registerTv()
    {
        $this->app['tv'] = $this->app->share(function($app)
        {
            return new Tv(
                $app['tv.repository']
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
		return array('tv', 'tv.repository');
	}

}
