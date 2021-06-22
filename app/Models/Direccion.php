<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table="domicilio"; //Declarando que la tabla
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['calle',
                            'num_exterior',
                            'num_interior',
                            'cod_postal',
                            'barrio',
                            'ciudad',
                            'municipio',
                            'estado'];
}
