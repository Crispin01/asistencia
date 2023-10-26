<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DNI extends Model
{
    use HasFactory;
    protected $table = 'dni_consultations';
    protected $fillable = [
      'id', 'nombres', 'apellido_paterno', 'apellido_materno', 'numero_documento'
  ];
}
