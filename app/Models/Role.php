<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
class Role extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'permissions'];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
    public function getPermissionsAttribute($val)
    {
        return json_decode($val,true);
    }}
