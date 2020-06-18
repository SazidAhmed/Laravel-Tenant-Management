<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergcontact extends Model
{
    public function personalinfo()
    {
        return $this->belongsTo(Personalinfo::class);
    }
}
