<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="clientes"; //Declarando que la tabla 'clientes'
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['nombre',
                            'apellido_paterno',
                            'apellido_materno',
                            'clave',
                            'rfc',
                            'fecha_alta',
                            'fecha_nacimiento',
                            'telefono',
                            'celular',
                            'celular_alterno',
                            'email',
                            'email_alternativo',
                            'id_domicilio'];
}
