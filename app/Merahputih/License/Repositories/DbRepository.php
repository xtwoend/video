<?php namespace Merahputih\License\Repositories;

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
 * @package    License
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Merahputih\License\Repositories\LicenseRepositoryInterface;
use Merahputih\License\Models\LicenseInterface;

class DbRepository implements LicenseRepositoryInterface
{

	/**
     * The model.
     *
     * @var UploadInterface
     */
    protected $model;

    /**
     * Create a new Order database repository.
     *
     * @param  UploadInterface $model
     * @return void
     */
    public function __construct(LicenseInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(LicenseInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function findById($id)
    {
        if ( ! $order = $this->model->find($id)) {
            throw new Exception("A order could not be found with a ID value of [$id].");
        }

        return $order;
    }

}