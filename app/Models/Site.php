<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'clave_sitio',
        'clave_sitio_alterna',
        'nombre_sitio',
        'alias_sitio',
        'calle_sitio',
        'numero_sitio',
        'colonia_sitio',
        'municipio_sitio',
        'estado_sitio',
        'cp_sitio',
        'latitud_sitio',
        'longitud_sitio',
        'proyecto_sitio',
        'created_at',
        'updated_at',
    ];

}
