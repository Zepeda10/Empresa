<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="d-inline-block">Dashboard</h1>
    <a class="d-inline-block float-right" href="{{route('sesion.salir')}}">Cerrar sesión</a>
@stop

@section('content')
    <p>Bienvenido al panel de control.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop