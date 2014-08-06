<?php namespace Merahputih\License;

/**
 * License
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Licensed
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Merahputih\License\Repositories\LicenseRepositoryInterface;
use Illuminate\Support\Str;

class License 
{
	/**
     * Video repository.
     *
     * @var VideoRepositoryInterface
     */
    protected $repository;

	/**
     * Create a new Order object.
     *
     * @param  VideoRepositoryInterface $repository
     * @param  integer $ownerId
     *
     * @return void
     */
    public function __construct(
        LicenseRepositoryInterface $repository
    )
    {
        $this->repository     = $repository;
    }

    /**
     * Set order repository
     *
     * @param  VideoRepositoryInterface $repository
     *
     * @return void
     */
    public function setRepository(LicenseRepositoryInterface $repository)
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
     * 
     * @return void
     */
    public function all(array $attribute = array('*') )
    {
        return $this->repository->getModel()->all($attribute);
    }


    /**
     * 
     * @return void
     */
    public function newInstance()
    {
        return $this->repository->getModel()->newInstance();
    }

    /**
     * 
     * @return void
     */
    public function create(array $attribute = array())
    {   
        $model = $this->newInstance();
        $model->fill(array_merge($attribute, array(
                'slug' => Str::slug($attribute['license'])
            )));
        return $model->save();
    }

    /**
     * 
     * @return void
     */
    public function lists($attribute, $id)
    {
        return $this->newInstance()->lists($attribute, $id);
    }

}