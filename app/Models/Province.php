<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Province extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre_provincia',
        'capital_provincia',
        'descripcion_provincia',
        'poblacion_provincia',
        'superficie_provincia',
        'latitud_provincia',
        'longitud_provincia',
        'id_region',
    ];
}
