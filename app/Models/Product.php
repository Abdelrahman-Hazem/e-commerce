<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];

public function category()
{
	return $this->belongsTo(\App\Category::class);
}

public function users()
{
	return $this->belongsToMany(User::class,'product_user')->withTimestamps();
}







    // public function scoopeMen($query)
	// {
	// 	return $query->where('')
	// }
}
