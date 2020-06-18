<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tsms extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
