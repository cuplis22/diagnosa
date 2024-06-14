<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diagnosa extends Model
{
    use HasFactory;

    protected $guarded  = [];

    function gejala() {
        return $this->belongsTo(Gejala::class);
    }
}
