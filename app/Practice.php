<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
	protected $fillable = ['name','address','postcode','telephone'];
}
