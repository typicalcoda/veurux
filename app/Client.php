<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];

    public function pickups(){
    	$this->hasMany('\App\Pickup');
    }

    public function getDobAttribute(){
    	$d = date_create($this->attributes['dob']);
    	return date_format($d, 'dd/m/Y');
    }

}

