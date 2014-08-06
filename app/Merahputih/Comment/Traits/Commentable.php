<?php namespace Merahputih\Comment\Traits;

/**
 * Comment Trait
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


trait Commentable {

	/**
	 * Return collection of comments related to this model
	 * 
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function comments() 
	{
		return $this->morphMany('Merahputih\Comment\Models\Comment', 'commentable');
	}
	

	/**
	 * Adds a Comment
	 * 
	 * @param $attribute array
	 */
	public function addComment(array $attribute) {
		
		return $this->comments()->create($attribute);
	}

	/**
	 * Removes a single Comment
	 * 
	 * @param $id integer
	 */
	public function removeComment($id) {
		
		return $this->comments()->find($id)->delete();
	}
}