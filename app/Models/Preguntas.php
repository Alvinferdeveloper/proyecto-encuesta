<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;
    protected $table = 'preguntas';

    public function posibles_respuestas(){
        return $this->hasMany(Posibles_respuestas::class, 'pregunta_id');
    }

    public function respuestas(){
        return $this->hasMany(Respuestas::class, 'pregunta_id');
    }
}
