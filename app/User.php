<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function roles()
    {
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }
    public function movies()
    {
        return $this->belongsToMany('App\Movie','user_movie','user_id','movie_id');
    }
    public function getId()
    {
        return $this->id;
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $roles)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }
   public function hasRole($role)
   {
       if($this->roles()->where('name',$role)->first())
       {
           return true;
       }
       return false;
   }
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
