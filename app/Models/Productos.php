<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table="productos"; //Declarando que la tabla 'clientes'
    public $timestamps = false;
    
    use HasFactory;

    protected $fillable = ['sku',
                            'codigo',
                            'nombre',
                            'descripcion',
                            'cantidad',
                            'precio'];
}
