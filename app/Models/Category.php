<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable =['name_ar','name_en','active'];

    public function products()
    {
    	return $this->hasMany(\App\Product::class);
    }

   
}
