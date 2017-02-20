<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	protected $fillable = ['fullname','practice_id'];

	public function practice(){
		return $this->belongsTo('App\Practice');
	}

	public function setFullnameAttribute($fn){
		$this->attributes['fullname'] = ucwords(strtolower($fn));
	}

	public function setPracticeIdAttribute($p){
		$this->attributes['practice_id'] = \App\Practice::where('name','=',$p)->value('id');
	}

	public static function isUnique($r){
		if(Doctor::where([['fullname', '=', $r->fullname],['practice_id', '=', Practice::where('name', '=', $r->practice)->value('id')]])->exists())
			return false;
		
		return true;
	}
}
