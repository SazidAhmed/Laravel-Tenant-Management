<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personalinfo extends Model
{
    //Table name
    protected $table ='personalinfos';
    //primary key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = 'ture';

    //Relationship
    public function familymember(){
    return $this->hasMany(Familymember::class);
    }

    public function emergcontact(){
    return $this->hasMany(Emergcontact::class);
    }

    public function driverinfo(){
    return $this->hasMany(Driverinfo::class);
    }
    
    public function landlordinfo(){
    return $this->hasOne(Landlordinfo::class);
    }

    public function maidinfo(){
    return $this->hasMany(Maidinfo::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
        }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
