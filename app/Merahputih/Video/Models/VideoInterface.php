<?php
namespace Merahputih\Video\Models;

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

interface VideoInterface 
{   
	
    /**
     * Returns the order's ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Sets owner ID.
     *
     * @param mixed $id
     *
     * @return void
     */
    public function setOwnerId($id);

    /**
     * Gets owner ID.
     *
     * @return mixed
     */
    public function getOwnerId();

    
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