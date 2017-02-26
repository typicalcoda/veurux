<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $guarded = ['id'];
	protected $dates = ['dob'];


	public function pickups(){
		$this->hasMany('\App\Pickup');
	}

    public function setDobAttribute($date){

        $d = date_create_from_format('d/m/Y',$date);
        $this->attributes['dob'] = date_format($d, 'Y/m/d'); 
    }

	public function getDobAttribute(){
		$d = date_create($this->attributes['dob']);
		return date_format($d, 'dd/m/Y');
	}

}

