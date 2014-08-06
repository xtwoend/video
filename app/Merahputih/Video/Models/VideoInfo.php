<?php namespace Merahputih\Video\Models;

use Illuminate\Database\Eloquent\Model;
use Merahputih\Video\Models\VideoInterface;

class VideoInfo extends Model implements VideoInfoInterface
{
	protected $table = 'video_informations';

	/**
	 *
	 * {@inheritdoc}
	 */ 
	protected $fillable = array('video_id', 'name', 'description', 'license_id', 'category_id', 'language', 'comment');

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getKey();
    }

     /**
     * Returns the relationship between orders and items.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function category()
    {
        return $this->belongsTo('Merahputih\Categories\Models\Category');
    }


    /**
     * Returns the relationship between orders and items.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function license()
    {
        return $this->belongsTo('Merahputih\License\Models\License');
    }

}