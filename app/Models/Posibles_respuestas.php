<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posibles_respuestas extends Model
{
    use HasFactory;
    protected $table = 'posibles_respuestas';

    public function pregunta(){
        return $this->belongsTo(Preguntas::class);
    }
}
