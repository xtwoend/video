<?php namespace Merahputih\Categories\Repositories;

/**
 * Categories
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

use Merahputih\Categories\Models\CategoryInterface;


interface CategoryRepositoryInterface
{
	
	/**
     * Set the model
     *
     * @param  OrderInterface $model
     *
     * @return void
     */
    public function setModel(CategoryInterface $model);

    /**
     * Get the model
     *
     * @return OrderInterface
     */
    public function getModel();

    /**
     * Find order by ID
     *
     * @param  mixed $id
     *
     * @return OrderInterface
     *
     * @throws OrderNotFoundException
     */
    public function findById($id);

}