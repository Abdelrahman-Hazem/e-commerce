<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable implements JWTSubject 
{

	protected $fillable = ['name' , 'email','password','image' , 'role_id','phone','address' ];
   // protected $gaurded = ['created_at','updated_at'] ;


 public function role()
 {
    return $this->belongsTo(Role::class ,'role_id');
 }

  public function hasAbility($permissions)
  {
    $role = $this->role();

    if(!$role){
        return false ;
    }
     foreach($role->permissions as $permission){
        if(is_array($permissions) &&in_array($permission ,$permissions)){
            return true ;
        }elseif(is_string($permissions) &&strcmp($permissions ,$permission) == 0){
          return true ;
        }
     }

      return false ;
  }

      /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
