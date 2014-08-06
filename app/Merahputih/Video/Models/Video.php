<?php namespace Merahputih\Video\Models;

use Illuminate\Database\Eloquent\Model;
use Merahputih\Video\Models\VideoInterface;

class Video extends Model implements VideoInterface
{
    //trait 
    use \Merahputih\Tagging\Traits\Taggable;
    use \Merahputih\Comment\Traits\Commentable;

    /**
     * Table name
     * @var string
     */
	protected $table = 'videos';

	/**
     * The name of the "owner id" column.
     *
     * @var string
     */
    const OWNER_ID = 'owner_id';

    /**
     * User exposed observable events
     *
     * @var array
     */
    protected $observables = array(
        'updating.owner_id', 
        'updated.owner_id'
    );


    /**
     * The info model.
     *
     * @var string
     */
    protected $infoModel = 'Merahputih\Video\Models\VideoInfo';

    /**
     *
     * {@inheritdoc}
     */ 
    protected $fillable = array('filename', 'path', 'extension','mimetype','size','owner_id');
	
    /**
     * {@inheritdoc}
     */
    public function setInfoModel($model)
    {
        $this->infoModel = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * {@inheritdoc}
     */
    public function setOwnerId($id)
    {
        if ($this->exists) {
            if ($this->fireModelEvent('updating.owner_id') === false) return false;
        }

        $this->{static::OWNER_ID} = $id;

        $this->incrementExpiresAt();

        if ($this->exists) {
            if ($this->save()) {
                $this->fireModelEvent('updated.owner_id', false);
            }
        }
    }

    /**
     * Returns the relationship between orders and items.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function info()
    {
        return $this->hasOne($this->infoModel, 'video_id');
    }

    /**
     * {@inheritdoc}
     */
    public function getOwnerId()
    {
        return $this->{static::OWNER_ID};
    }

    /**
     * Delete the order.
     *
     * @return bool
     */
    public function delete()
    {
        $this->info()->delete();
        
        return parent::delete();
    }
}