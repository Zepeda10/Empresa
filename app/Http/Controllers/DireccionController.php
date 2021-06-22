<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
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
        $domicilio = new Direccion();
        $domicilio->calle = $request->calle;
        $domicilio->num_exterior = $request->num_exterior;
        $domicilio->num_interior = $request->num_interior;
        $domicilio->cod_postal = $request->cod_postal;
        $domicilio->barrio = $request->barrio;
        $domicilio->ciudad = $request->ciudad;
        $domicilio->municipio = $request->municipio;
        $domicilio->estado = $request->estado;
        
        $domicilio->save();
        session_start();
        $_SESSION['domicilioId'] = $domicilio->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $direccion = Direccion::findOrFail($id);

        $entrada = $request->all();
        $direccion->update($entrada);
 
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion)
    {
        //
    }
}
