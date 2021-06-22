<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Direccion;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::join('domicilio', 'domicilio.id', '=', 'clientes.id_domicilio')
                ->get(['domicilio.id AS ide','domicilio.*', 'clientes.*']); 

        //$clientes = Cliente::all();
        return view("admin.clientes.index",compact("clientes")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.clientes.agregar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->clave = $request->clave;
        $cliente->rfc = $request->rfc;
        $cliente->fecha_alta = $request->fecha_alta;
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->celular = $request->celular;
        $cliente->celular_alterno = $request->celular_alterno;
        $cliente->email = $request->email;
        $cliente->email_alternativo = $request->email_alternativo;
        session_start();
        
        $cliente->id_domicilio = $_SESSION['domicilioId']; //ÚLTIMO ID DE TABLA DOMICILIO
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::join('domicilio', 'domicilio.id', '=', 'clientes.id_domicilio')
                ->select(['domicilio.id AS ide','domicilio.*', 'clientes.*'])
                ->findOrFail($id);
        return view("admin.clientes.editar", compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $entrada = $request->all();
        $cliente->update($entrada);
 
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $domicilio = Direccion::findOrFail($cliente->id_domicilio);
        $domicilio->delete();
        $cliente->delete();

        return redirect()->route('clientes.index'); 
    }
}
