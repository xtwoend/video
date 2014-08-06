<?php namespace Merahputih\Comment\Repositories;

/**
 * Comment
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://opensource.org/licenses/MIT
 *
 * @package    Comment
 * @version    1.0.0
 * @author     Abdul Hafidz A <aditans88@gmail.com>
 * @license    MIT License
 */

use Merahputih\Comment\Repositories\CommentRepositoryInterface;
use Merahputih\Comment\Models\CommentInterface;

class DbRepository implements CommentRepositoryInterface
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
    public function __construct(CommentInterface $model)
    {
        $this->model = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel(CommentInterface $model)
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