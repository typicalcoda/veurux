<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
	protected $fillable = ['name','address','postcode','telephone'];

	public function doctors(){
		return $this->hasMany('App\Doctor');
	}

	public function setPostcodeAttribute($pc){
		$this->attributes['postcode'] = strtoupper($pc);
	}
}
