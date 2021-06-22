<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionDetalle extends Model
{
    protected $table="cotizacion_detalle"; //Declarando que la tabla
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['id_cotizacion',
                            'cod_servicio',
                            'cod_producto',
                            'total_linea' ];
}
