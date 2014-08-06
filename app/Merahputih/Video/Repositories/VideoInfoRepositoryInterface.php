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

use Merahputih\Video\Models\VideoInfoInterface;

interface VideoInfoRepositoryInterface 
{
	/**
     * Set the model
     *
     * @param  OrderInterface $model
     *
     * @return void
     */
    public function setModel(VideoInfoInterface $model);

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

    /**
     * Find order by the owner ID
     *
     * @param  mixed $id
     *
     * @return Array
     */
    public function findByOwnerId($id);
}