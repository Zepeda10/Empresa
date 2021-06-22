<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Agregar</h1>
@stop

@section('content')

    <p class="mt-3">Producto</p>
    <form id="form1" action="{{route('productos.store')}}" method="POST" >
        @csrf
        <div class="row my-4">
            <div class="col">
                <input type="text" name="sku" class="form-control border border-secondary" placeholder="Sku" required>
            </div>
            <div class="col">
                <input type="text" name="codigo" class="form-control border border-secondary" placeholder="Código" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="nombre" class="form-control border border-secondary" placeholder="Nombre" required>
            </div>
            <div class="col">
                <textarea class="form-control border border-secondary" name="descripcion" id="exampleFormControlTextarea1" rows="3" placeholder="Descripción" required></textarea>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="number" name="cantidad" class="form-control border border-secondary" placeholder="Cantidad" required>
            </div>
            <div class="col">
                <input type="text" name="precio" class="form-control border border-secondary" placeholder="Precio" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-danger d-inline" id="enviar">Aceptar</button>
        <button class="btn btn-secondary mx-3 d-inline"><a href="{{route('productos.index')}}" class="text-decoration-none text-white">Regresar</a></button>
    </form>
 
    



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop