<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $guarded = ['id'];

    public function client(){
    	return $this->belongsTo('\App\Client');
    }

    public function getCollectionDateAttribute(){
        $d = date_create($this->attributes['collection_date']);
        return date_format($d, 'd/m/Y');
    }

    public function getStatusAttribute(){
        if($this->attributes['status'] == "0")
            return "Incomplete";
        

        return "Complete";
    }

       public function getRepeatAttribute(){
        if($this->attributes['repeat'] == "0")
            return "No";
        

        return "Yes";
    }

}
