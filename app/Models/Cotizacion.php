<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table="cotizacion"; //Declarando que la tabla
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['id_cliente',
                            'iva',
                            'subtotal',
                            'total' ];
}
