<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionDetalle;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::join('cotizacion_detalle', 'cotizacion_detalle.id_cotizacion', '=', 'cotizacion.id')
                ->select(['cotizacion_detalle.id AS ide','cotizacion_detalle.*', 'cotizacion.*'])
                ->get(); 

        //$clientes = Cliente::all();
        return view("admin.cotizaciones.index",compact("cotizaciones")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cotizaciones.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion();
        $cotizacion->id_cliente = $request->id_cliente;
        $cotizacion->iva = $request->iva;
        $cotizacion->subtotal = $request->subtotal;
        $cotizacion->total = $request->total;
        
        $cotizacion->save();
        session_start();
        $_SESSION['cotizacionId'] = $cotizacion->id;

        return redirect()->route('cotizaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles = CotizacionDetalle::where('id_cotizacion', '=', $id)->firstOrFail();
        return view("admin.cotizaciones.detalle",compact('detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::join('cotizacion_detalle', 'cotizacion_detalle.id_cotizacion', '=', 'cotizacion.id')
                ->select(['cotizacion_detalle.id AS ide','cotizacion_detalle.*', 'cotizacion.*'])
                ->findOrFail($id);
        return view("admin.cotizaciones.editar",compact('cotizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cotizacion = Cotizacion::findOrFail($id);

        $entrada = $request->all();
        $cotizacion->update($entrada);
 
        return redirect()->route('cotizaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        $detalle = CotizacionDetalle::where('id_cotizacion', '=', $id)->firstOrFail();
        $cotizacion->delete();
        $detalle->delete();
        

        return redirect()->route('cotizaciones.index'); 
    }
}
