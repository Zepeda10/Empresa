<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table="servicios"; //Declarando que la tabla 
    public $timestamps = false;
    
    use HasFactory;

    protected $fillable = ['codigo',
                            'tipo',
                            'especificacion',
                            'nombre',
                            'descripcion',
                            'cantidad',
                            'precio'];
}
