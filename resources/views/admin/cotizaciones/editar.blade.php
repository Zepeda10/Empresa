<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <p class="mt-3">Cotización</p>
    <form id="form1" action="{{route('cotizaciones.update',$cotizacion)}}" method="POST" >
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="id_cliente" class="form-control border border-secondary" value="{{ old('id_cliente', $cotizacion->id_cliente) }}" required>
            </div>
            <div class="col">
                <input type="text" name="iva" class="form-control border border-secondary" value="{{ old('iva', $cotizacion->iva) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="subtotal" class="form-control border border-secondary" value="{{ old('subtotal', $cotizacion->subtotal) }}" required>
            </div>
            <div class="col">
                <input type="text" name="total" class="form-control border border-secondary" value="{{ old('total', $cotizacion->total) }}" required>
            </div>
        </div>
       
    </form>

    <p class="mt-3">Detalle</p>
    <form id="form2" action="{{route('detalles.update',$cotizacion)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="cod_servicio" class="form-control border border-secondary" value="{{ old('cod_servicio', $cotizacion->cod_servicio) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="cod_producto" class="form-control border border-secondary" value="{{ old('cod_producto', $cotizacion->cod_producto) }}" required>
            </div>
            <div class="col">
                <input type="text" name="total_linea" class="form-control border border-secondary" value="{{ old('total_linea', $cotizacion->total_linea) }}" required>
            </div>
        </div>

    </form>

    <button type="button" class="btn btn-danger d-inline" id="enviar">Aceptar</button>
    <button class="btn btn-secondary mx-3 d-inline"><a href="{{route('cotizaciones.index')}}" class="text-decoration-none text-white">Regresar</a></button>



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
                        window.location.href = "{{route('cotizaciones.index')}}";
                    }); 
                }); 
            }); 
        });
    </script>
@stop