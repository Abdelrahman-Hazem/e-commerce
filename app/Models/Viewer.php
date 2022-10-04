<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    protected $table = 'viewers';
    protected $fillable = ['number_of_viewers'];
}
