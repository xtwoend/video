<?php namespace Merahputih\Categories\Models;

/**
 * Categories Model
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



interface CategoryInterface
{
	/**
     * Returns the order's ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws MassAssignmentException
     */
    public function fill(array $attributes);

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = array());

    /**
     * Create a new instance of the given model.
     *
     * @param  array  $attributes
     * @param  bool   $exists
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function newInstance($attributes = array(), $exists = false);

}