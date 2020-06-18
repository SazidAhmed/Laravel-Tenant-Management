<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driverinfo extends Model
{
    public function personalinfo(){
    return $this->belongsTo(Personalinfo::class);
    }
       
}
