<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>


@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')

    <p class="mt-3">Usuario</p>
    <form id="form1" action="{{route('usuarios.update',$usuario)}}" method="POST">
        @csrf
        @method('put')
        <div class="row my-4">
            <div class="col">
                <input type="text" name="nombre" class="form-control border border-secondary" value="{{ old('nombre', $usuario->nombre) }}" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_paterno" class="form-control border border-secondary" value="{{ old('apellido_paterno', $usuario->apellido_paterno) }}" required>
            </div>
            <div class="col">
                <input type="text" name="apellido_materno" class="form-control border border-secondary" value="{{ old('apellido_materno', $usuario->apellido_materno) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="fecha_nacimiento" class="form-control border border-secondary" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}" required>
            </div>
            <div class="col">
                <input type="text" name="usuario" class="form-control border border-secondary" value="{{ old('usuario', $usuario->usuario) }}" required>
            </div>
            <div class="col">
                <input type="text" name="rol" class="form-control border border-secondary" value="{{ old('authKey', $usuario->rol) }}" required>
            </div>
        </div>
        <div class="row my-4">
            <div class="col">
                <input type="text" name="clave" class="form-control border border-secondary" value="{{ old('clave', $usuario->clave) }}" required>
            </div>
            <div class="col">
                <input type="text" name="rfc" class="form-control border border-secondary" value="{{ old('rfc', $usuario->rfc) }}" required>
            </div>
            <div class="col">
                <input type="text" name="fecha_alta" class="form-control border border-secondary" value="{{ old('fecha_alta', $usuario->fecha_alta) }}" required>
            </div>
        </div>
        <div class="row my-4">       
            <div class="col">
                <input type="text" name="telefono" class="form-control border border-secondary" value="{{ old('telefono', $usuario->telefono) }}" required>
            </div>
            <div class="col">
                <input type="text" name="celular" class="form-control border border-secondary" value="{{ old('celular', $usuario->celular) }}" required>
            </div>
            <div class="col">
                <input type="text" name="celular_alterno" class="form-control border border-secondary" value="{{ old('celular_alterno', $usuario->celular_alterno) }}" required>
            </div>
        </div>
        <div class="row my-4">       
            <div class="col">
                <input type="email" name="email" class="form-control border border-secondary" value="{{ old('email', $usuario->email) }}" required>
            </div>
            <div class="col">
                <input type="text" name="email_alternativo" class="form-control border border-secondary" value="{{ old('email_alternativo', $usuario->email_alternativo) }}" required>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                <input type="text" name="accessToken" class="form-control border border-secondary" value="{{ old('accessToken', $usuario->accessToken) }}" required>
            </div>
            <div class="col">
                <input type="text" name="authKey" class="form-control border border-secondary" value="{{ old('authKey', $usuario->authKey) }}" required>
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