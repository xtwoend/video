<?php namespace Merahputih\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Merahputih\Categories\Models\CategoryInterface;

class Category extends Model implements CategoryInterface
{
    
    /**
     * Table name
     * @var string
     */
	protected $table = 'categories';

	
    /**
     *
     * {@inheritdoc}
     */ 
    protected $fillable = array('category','slug');
	
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getKey();
    }

    public function videos()
    {
        return $this->hasMany('Merahputih\Video\Models\VideoInfo');
    }
}