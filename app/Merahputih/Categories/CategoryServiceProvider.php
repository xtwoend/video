<?php namespace Merahputih\Categories;

/**
 * Categories Packages
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Categories
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Illuminate\Support\ServiceProvider;
use Merahputih\Categories\Repositories\DbRepository;
use Merahputih\Categories\Category;

class CategoryServiceProvider extends ServiceProvider {

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
		$this->registerCategory();
	}
	
	/**
     * Register the repository.
     *
     * @return void
     */
    private function registerRepository()
    {
        $this->app['category.repository'] = $this->app->share(function($app)
        { 
            return new DbRepository(new \Merahputih\Categories\Models\Category);
        });
    }

    

    /**
     * Register the order.
     *
     * @return void
     *
     * @throws InvalidArgumentException
     */
    private function registerCategory()
    {
        $this->app['category'] = $this->app->share(function($app)
        {
            return new Category(
                $app['category.repository']
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
		return array('category', 'category.repository');
	}

}
