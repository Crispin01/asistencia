<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
  protected $table = 'alumno'; // Nombre de la tabla en la base de datos

  protected $primaryKey = 'idalumno';

  protected $fillable = [
      'nombre',
      'apellido',
      'direccion',
      'documento',
      'celular',
      'email',
      'fechacrea',
      'fechamodi'
      // Agrega aquí otros campos que desees llenar masivamente (mass assignment)
  ];
}
