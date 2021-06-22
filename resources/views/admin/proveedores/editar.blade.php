<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <p class="mt-3">Proveedor</p>
    <form id="form1" action="{{route('proveedores.update',$prov)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="razon_social" class="form-control border border-secondary" value="{{ old('razon_social', $prov->razon_social) }}" required>
            </div>
            <div class="col">
                <input type="text" name="nombre_contacto" class="form-control border border-secondary" value="{{ old('nombre_contacto', $prov->nombre_contacto) }}" required>
            </div>
            <div class="col">
                <input type="text" name="puesto_contacto" class="form-control border border-secondary" value="{{ old('puesto_contacto', $prov->puesto_contacto) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="rfc" class="form-control border border-secondary" value="{{ old('rfc', $prov->rfc) }}" required>
            </div>
            <div class="col">
                <input type="text" name="fecha_alta" class="form-control border border-secondary" value="{{ old('fecha_alta', $prov->fecha_alta) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="fecha_nacimiento" class="form-control border border-secondary" value="{{ old('fecha_nacimiento', $prov->fecha_nacimiento) }}" required>
            </div>
            <div class="col">
                <input type="text" name="telefono" class="form-control border border-secondary" value="{{ old('telefono', $prov->telefono) }}" required>
            </div>
            <div class="col">
                <input type="text" name="celular" class="form-control border border-secondary" value="{{ old('celular', $prov->celular) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="celular_alterno" name="fecha_nacimiento" class="form-control border border-secondary" value="{{ old('fecha_nacimiento', $prov->fecha_nacimiento) }}" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control border border-secondary" value="{{ old('email', $prov->email) }}" required>
            </div>
            <div class="col">
                <input type="text" name="email_alternativo" class="form-control border border-secondary" value="{{ old('email_alternativo', $prov->email_alternativo) }}" required>
            </div>
        </div>
    </form>

    <p class="mt-3">Domicilio</p>
    <form id="form2" action="{{route('direccion.update',$prov->ide)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="calle" class="form-control border border-secondary" value="{{ old('calle', $prov->calle) }}" required>
            </div>
            <div class="col">
                <input type="text" name="num_exterior" class="form-control border border-secondary" value="{{ old('num_exterior', $prov->num_exterior) }}" required>
            </div>
            <div class="col">
                <input type="text" name="num_interior" class="form-control border border-secondary" value="{{ old('num_interior', $prov->num_interior) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="cod_postal" class="form-control border border-secondary" value="{{ old('cod_postal', $prov->cod_postal) }}" required>
            </div>
            <div class="col">
                <input type="text" name="barrio" class="form-control border border-secondary" value="{{ old('barrio', $prov->barrio) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="ciudad" class="form-control border border-secondary" value="{{ old('ciudad', $prov->ciudad) }}" required>
            </div>
            <div class="col">
                <input type="text" name="municipio" class="form-control border border-secondary" value="{{ old('municipio', $prov->municipio) }}" required>
            </div>
            <div class="col">
                <input type="text" name="estado" class="form-control border border-secondary" value="{{ old('estado', $prov->estado) }}" required>
            </div>
        </div>

    </form>



    <button type="button" class="btn btn-danger d-inline" id="enviar">Aceptar</button>
        <button class="btn btn-secondary mx-3 d-inline"><a href="{{route('proveedores.index')}}" class="text-decoration-none text-white">Regresar</a></button>



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
                        window.location.href = "{{route('proveedores.index')}}";
                    }); 
                }); 
            }); 
        });
    </script>
@stop