<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Maidinfo;
class Maidinfo extends Model
{
    public function personalinfo()
    {
        return $this->belongsTo(Personalinfo::class);
    }
}
