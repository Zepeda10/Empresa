<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <p class="mt-3">Cliente</p>
    <form id="form1" action="{{route('clientes.update',$cliente)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="nombre" class="form-control border border-secondary" value="{{ old('nombre', $cliente->nombre) }}" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_paterno" class="form-control border border-secondary" value="{{ old('apellido_paterno', $cliente->apellido_paterno) }}" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_materno" class="form-control border border-secondary" value="{{ old('apellido_materno', $cliente->apellido_materno) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="clave" class="form-control border border-secondary" value="{{ old('clave', $cliente->clave) }}" required>
            </div>
            <div class="col">
                <input type="text" name="rfc" class="form-control border border-secondary" value="{{ old('rfc', $cliente->rfc) }}" required>
            </div>
            <div class="col">
                <input type="text" name="fecha_alta" class="form-control border border-secondary" value="{{ old('fecha_alta', $cliente->fecha_alta) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="fecha_nacimiento" class="form-control border border-secondary" value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}" required>
            </div>
            <div class="col">
                <input type="text" name="telefono" class="form-control border border-secondary" value="{{ old('telefono', $cliente->telefono) }}" required>
            </div>
            <div class="col">
                <input type="text" name="celular" class="form-control border border-secondary" value="{{ old('celular', $cliente->celular) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="celular_alterno" name="fecha_nacimiento" class="form-control border border-secondary" value="{{ old('fecha_nacimiento', $cliente->fecha_nacimiento) }}" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control border border-secondary" value="{{ old('email', $cliente->email) }}" required>
            </div>
            <div class="col">
                <input type="text" name="email_alternativo" class="form-control border border-secondary" value="{{ old('email_alternativo', $cliente->email_alternativo) }}" required>
            </div>
        </div>
    </form>

    <p class="mt-3">Domicilio</p>
    <form id="form2" action="{{route('direccion.update',$cliente->ide)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="calle" class="form-control border border-secondary" value="{{ old('calle', $cliente->calle) }}" required>
            </div>
            <div class="col">
                <input type="text" name="num_exterior" class="form-control border border-secondary" value="{{ old('num_exterior', $cliente->num_exterior) }}" required>
            </div>
            <div class="col">
                <input type="text" name="num_interior" class="form-control border border-secondary" value="{{ old('num_interior', $cliente->num_interior) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="cod_postal" class="form-control border border-secondary" value="{{ old('cod_postal', $cliente->cod_postal) }}" required>
            </div>
            <div class="col">
                <input type="text" name="barrio" class="form-control border border-secondary" value="{{ old('barrio', $cliente->barrio) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="ciudad" class="form-control border border-secondary" value="{{ old('ciudad', $cliente->ciudad) }}" required>
            </div>
            <div class="col">
                <input type="text" name="municipio" class="form-control border border-secondary" value="{{ old('municipio', $cliente->municipio) }}" required>
            </div>
            <div class="col">
                <input type="text" name="estado" class="form-control border border-secondary" value="{{ old('estado', $cliente->estado) }}" required>
            </div>
        </div>

    </form>



    <button type="button" class="btn btn-danger d-inline" id="enviar">Aceptar</button>
        <button class="btn btn-secondary mx-3 d-inline"><a href="{{route('clientes.index')}}" class="text-decoration-none text-white">Regresar</a></button>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
       $(document).ready(function() { 
            $("#enviar").click(function() { 
                $.post($("#form2").attr("action"), $("#form2").serialize(), 
                function() { 
                        $.post($("#form1").attr("action"), $("#form1").serialize(), 
                    function() { 
                        window.location.href = "{{route('clientes.index')}}";
                    }); 
                }); 
            }); 
        });
    </script>
@stop