<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Payment;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'username', 'mobile', 'password',
    ];

    protected $dates = [
        'created_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function role(){
        return $this->hasOne(Role::class,'id','role_id');
    }

    public function family(){
        return $this->hasMany(Family::class);
    }

    public function emergency(){
        return $this->hasMany(Emergency::class);
    }

    public function extrainfo(){
        return $this->hasMany(Extrainfo::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }

    public function userinfo(){
        return $this->hasOne(Userinfo::class);
    }
}
