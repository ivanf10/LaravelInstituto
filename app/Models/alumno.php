<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Campos que se permiten actualizar / crear mediante Mass Assignment
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'fecha_nacimiento',
    ];
}
