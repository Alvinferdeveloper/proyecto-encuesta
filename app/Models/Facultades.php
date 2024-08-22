<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    use HasFactory;

    protected $table = 'facultades';

    public function carreras(){
        return $this->hasMany(Carreras::class);
    }
}
