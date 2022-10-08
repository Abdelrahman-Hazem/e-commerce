<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded =[];

public function category()
{
	return $this->belongsTo('App\Models\Category' ,'category_id' );
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
