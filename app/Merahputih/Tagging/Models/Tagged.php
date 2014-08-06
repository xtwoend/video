<?php namespace Merahputih\Tagging\Models;

use Illuminate\Database\Eloquent\Model;

class Tagged extends Model {

	protected 	$table = 'tagging_tagged';
	public 		$timestamps = false;
	protected 	$softDelete = false;
	protected 	$fillable = ['tag_name', 'tag_slug'];

	public function taggable() {
		return $this->morphTo();
	}

}