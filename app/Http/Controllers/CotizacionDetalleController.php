<?php

namespace App\Http\Controllers;

use App\Models\CotizacionDetalle;
use Illuminate\Http\Request;

class CotizacionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new CotizacionDetalle();
        $detalle->cod_servicio = $request->cod_servicio;
        $detalle->cod_producto = $request->cod_producto;
        $detalle->total_linea = $request->total_linea;
        session_start();
        
        $detalle->id_cotizacion = $_SESSION['cotizacionId']; //ÚLTIMO ID DE TABLA DOMICILIO
        $detalle->save();

        return redirect()->route('cotizaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CotizacionDetalle  $cotizacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(CotizacionDetalle $cotizacionDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CotizacionDetalle  $cotizacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(CotizacionDetalle $cotizacionDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CotizacionDetalle  $cotizacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detalle = CotizacionDetalle::where('id_cotizacion', '=', $id)->firstOrFail();

        $entrada = $request->all();
        $detalle->update($entrada);
 
        return redirect()->route('cotizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CotizacionDetalle  $cotizacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CotizacionDetalle $cotizacionDetalle)
    {
        //
    }
}
