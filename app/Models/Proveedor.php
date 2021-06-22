<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table="proveedor"; //Declarando que la tabla 'clientes'
    public $timestamps = false;
    
    use HasFactory;

    protected $fillable = ['razon_social',
                            'rfc',
                            'fecha_alta',
                            'fecha_nacimiento',
                            'nombre_contacto',
                            'puesto_contacto',
                            'telefono',
                            'celular',
                            'celular_alterno',
                            'email',
                            'email_alternativo',
                            'id_domicilio'];
}
