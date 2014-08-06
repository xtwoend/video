<?php
namespace Merahputih\Video\Repositories;

/**
 * Upload Packages
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Upload
 * @version    1.0.0
 * @author     Abdul Hafidz Anshari <aditans88@gmail.com>
 * @license    MIT License
 */

use Merahputih\Video\Repositories\VideoRepositoryInterface;
use Merahputih\Video\Models\VideoInterface;


class DbRepository implements VideoRepositoryInterface
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
    public function __construct(VideoInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(VideoInterface $model)
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

    /**
     * {@inheritdoc}
     */
    public function findByOwnerId($id)
    {
        return $this->model->where('owner_id', '=', $id)->get()->all();
    }
}