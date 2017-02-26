<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['collection_date'];


    public function client(){

    	return $this->belongsTo('\App\Client');
    }

    public function setCollectionDateAttribute($date){

        $d = date_create_from_format('d/m/Y',$date);
        $this->attributes['collection_date'] = date_format($d, 'Y/m/d'); 
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
