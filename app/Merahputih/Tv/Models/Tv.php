<?php namespace Merahputih\Tv\Models;

use Illuminate\Database\Eloquent\Model;
use Merahputih\Tv\Models\TvInterface;

class Tv extends Model implements TvInterface
{
    //trait 
    use \Merahputih\Tagging\Traits\Taggable;
    use \Merahputih\Comment\Traits\Commentable;

    /**
     * Table name
     * @var string
     */
	protected $table = 'tvs';

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
     *
     * {@inheritdoc}
     */ 
    protected $fillable = array('title','description','schedule','cover','owner_id');
	
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
     * {@inheritdoc}
     */
    public function getOwnerId()
    {
        return $this->{static::OWNER_ID};
    }


}