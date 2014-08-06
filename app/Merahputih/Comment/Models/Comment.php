<?php namespace Merahputih\Comment\Models;

/**
 * Comment Model
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

use Illuminate\Database\Eloquent\Model;
use Merahputih\Comment\Models\CommentInterface;

class Comment extends Model implements CommentInterface
{
	/**
     * Comment table
     */ 
    protected 	$table = 'comments';
	
    /**
     *
     * {@inheritdoc}
     */ 
    protected 	$fillable = ['commentable_id','commentable_type','comment', 'owner_id'];

    /**
     * morph 
     */ 
	public function commentable() 
	{
		return $this->morphTo();
	}

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getKey();
    }

}