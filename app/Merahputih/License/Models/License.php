<?php namespace Merahputih\License\Models;

use Illuminate\Database\Eloquent\Model;
use Merahputih\License\Models\LicenseInterface;

class License extends Model implements LicenseInterface
{
    
    /**
     * Table name
     * @var string
     */
	protected $table = 'licenses';

	
    /**
     *
     * {@inheritdoc}
     */ 
    protected $fillable = array('license','slug');
	
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