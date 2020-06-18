<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlordinfo extends Model
{
    public function personalinfo()
    {
        return $this->belongsTo(Personalinfo::class);
    }
}
