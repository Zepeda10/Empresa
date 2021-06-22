<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>


@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Agregar</h1>
@stop

@section('content')

    <p class="mt-3">Usuario</p>
    <form id="form1" action="{{route('usuarios.store')}}" method="POST">
        @csrf

        <div class="row my-4">
            <div class="col">
                <input type="text" name="nombre" class="form-control border border-secondary" placeholder="Nombre" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_paterno" class="form-control border border-secondary" placeholder="Apellido paterno" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_materno" class="form-control border border-secondary" placeholder="Apellido materno" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="fecha_nacimiento" class="form-control border border-secondary" placeholder="Fecha de nacimiento" required>
            </div>
            <div class="col">
                <input type="text" name="usuario" class="form-control border border-secondary" placeholder="Usuario" required>
            </div>
            <div class="col">
                <input type="text" name="rol" class="form-control border border-secondary" placeholder="Rol" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="clave" class="form-control border border-secondary" placeholder="Clave" required>
            </div>
            <div class="col">
                <input type="text" name="rfc" class="form-control border border-secondary" placeholder="Rfc" required>
            </div>
            <div class="col">
                <input type="text" name="fecha_alta" class="form-control border border-secondary" placeholder="Fecha alta" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="telefono" class="form-control border border-secondary" placeholder="Teléfono" required>
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

        <div class="row my-4">
            <div class="col">
                <input type="text" name="accessToken" class="form-control border border-secondary" placeholder="accessToken" required>
            </div>
            <div class="col">
                <input type="text" name="authKey" class="form-control border border-secondary" placeholder="authKey" required>
            </div>
        </div>

        <button type="submit" class="btn btn-danger d-inline" id="enviar">Aceptar</button>
        <button class="btn btn-secondary mx-3 d-inline"><a href="{{route('usuarios.index')}}" class="text-decoration-none text-white">Regresar</a></button>
    </form>

   



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop