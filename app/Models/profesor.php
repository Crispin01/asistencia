<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
  protected $table = 'profesor'; // Nombre de la tabla en la base de datos

  protected $primaryKey = 'idprofesor';

  protected $fillable = [
      'nombre',
      'apellido',
      'direccion',
      'documento',
      'telefono',
      'email',
      'fechacrea',
      'fechamodi'
      // Agrega aquí otros campos que desees llenar masivamente (mass assignment)
  ];
}
