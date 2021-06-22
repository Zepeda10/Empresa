<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>


@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1>Agregar</h1>
@stop

@section('content')

    <p class="mt-3">Proveedor</p>
    <form id="form1" action="{{route('proveedores.store')}}" method="POST" >
        @csrf
        <div class="row my-4">
            <div class="col">
                <input type="text" name="razon_social" class="form-control border border-secondary" placeholder="Razón Social" required>
            </div>
            <div class="col">
                <input type="text" name="nombre_contacto" class="form-control border border-secondary" placeholder="Nombre contacto" required>
            </div>
            <div class="col">
                <input type="text" name="puesto_contacto" class="form-control border border-secondary" placeholder="Puesto contacto" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="rfc" class="form-control border border-secondary" placeholder="RFC" required>
            </div>
            <div class="col">
                <input type="text" name="fecha_alta" class="form-control border border-secondary" placeholder="Fecha alta" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="fecha_nacimiento" class="form-control border border-secondary" placeholder="Fecha de nacimiento" required>
            </div>
            <div class="col">
                <input type="text" name="telefono" class="form-control border border-secondary" placeholder="Telefono" required>
            </div>
            <div class="col">
                <input type="text" name="celular" class="form-control border border-secondary" placeholder="Celular" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="celular_alterno" class="form-control border border-secondary" placeholder="Celular alterno" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control border border-secondary" placeholder="Email" required>
            </div>
            <div class="col">
                <input type="text" name="email_alternativo" class="form-control border border-secondary" placeholder="Email alternativo" required>
            </div>
        </div>
    </form>

    <p class="mt-3">Domicilio</p>
    <form id="form2" action="{{route('direccion.store')}}" method="POST">
        @csrf
        <div class="row my-4">
            <div class="col">
                <input type="text" name="calle" class="form-control border border-secondary" placeholder="Calle" required>
            </div>
            <div class="col">
                <input type="text" name="num_exterior" class="form-control border border-secondary" placeholder="No. Exterior" required>
            </div>
            <div class="col">
                <input type="text" name="num_interior" class="form-control border border-secondary" placeholder="No. Interior" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="cod_postal" class="form-control border border-secondary" placeholder="Código postal" required>
            </div>
            <div class="col">
                <input type="text" name="barrio" class="form-control border border-secondary" placeholder="Barrio" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="ciudad" class="form-control border border-secondary" placeholder="Ciudad" required>
            </div>
            <div class="col">
                <input type="text" name="municipio" class="form-control border border-secondary" placeholder="Municipio" required>
            </div>
            <div class="col">
                <input type="text" name="estado" class="form-control border border-secondary" placeholder="Estado" required>
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