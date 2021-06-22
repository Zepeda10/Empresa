<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Direccion;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::join('domicilio', 'domicilio.id', '=', 'proveedor.id_domicilio')
                ->get(['domicilio.id AS ide','domicilio.*', 'proveedor.*']);

        return view("admin.proveedores.index",compact("proveedor")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.proveedores.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prov = new Proveedor();
        $prov->razon_social = $request->razon_social;
        $prov->nombre_contacto = $request->nombre_contacto;
        $prov->puesto_contacto = $request->puesto_contacto;
        $prov->rfc = $request->rfc;
        $prov->fecha_alta = $request->fecha_alta;
        $prov->fecha_nacimiento = $request->fecha_nacimiento;
        $prov->telefono = $request->telefono;
        $prov->celular = $request->celular;
        $prov->celular_alterno = $request->celular_alterno;
        $prov->email = $request->email;
        $prov->email_alternativo = $request->email_alternativo;
        session_start();
        
        $prov->id_domicilio = $_SESSION['domicilioId']; //ÚLTIMO ID DE TABLA DOMICILIO
        $prov->save();

        return redirect()->route('proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prov = Proveedor::join('domicilio', 'domicilio.id', '=', 'proveedor.id_domicilio')
                ->select(['domicilio.id AS ide','domicilio.*', 'proveedor.*'])
                ->findOrFail($id);
        return view("admin.proveedores.editar", compact("prov"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prov = Proveedor::findOrFail($id);

        $entrada = $request->all();
        $prov->update($entrada);
 
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prov = Proveedor::findOrFail($id);
        $domicilio = Direccion::findOrFail($prov->id_domicilio);
        $domicilio->delete();
        $prov->delete();

        return redirect()->route('proveedores.index'); 
    }

    public function domicilios(){
        $proveedor = Proveedor::join('domicilio', 'domicilio.id', '=', 'proveedor.id_domicilio')
                ->get(['domicilio.*']);

        return view("admin.proveedores.domicilios",compact("proveedor")); 
    }

}
