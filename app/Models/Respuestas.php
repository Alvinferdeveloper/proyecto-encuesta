<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;
    protected $table = 'respuestas';

    public $fillable = [
        'encuestado_id',
        'pregunta_id',
        'respuesta',
        'posible_respuesta_id',

    ];

    public $timestamps = false;

    public function encuestado(){
        return $this->belongsTo(Encuestados::class,'encuestado_id');
    }
    
    public function pregunta(){
        return $this->belongsTo(Preguntas::class);
    }

    
}
