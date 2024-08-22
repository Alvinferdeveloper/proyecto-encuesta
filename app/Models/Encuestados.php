<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Encuestados extends Authenticatable
{
    use HasFactory;
    protected $table = 'Encuestados';

    protected $fillable = [
        'nombres',
        'apellidos',
        'sexo',
        'carnet',
        'correo',
        'contrasena',
        'facultad_id',
        'carrera',
        'anio',
        'role'
    ];

    public $timestamps = false;

    public function facultad()
    {
        return $this->belongsTo(Facultades::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carreras::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamentos::class);
    }

    public function respuestas()
    {
        return $this->hasMany(respuestas::class,'encuestado_id');
    }

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
