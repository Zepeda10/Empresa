<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>


@extends('adminlte::page')

@section('title', 'Cotizaciones')

@section('content_header')
    <h1>Cotizaciones</h1>
@stop

@section('content')


<a class="btn btn-primary " href="{{route('cotizaciones.index')}}">Regresar</a>

<table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
        <thead>
            <tr>
                <th class="w-24">Id</th>
                <th class="w-24">Id Cotización</th>
                <th class="w-24">Código Servicio</th>
                <th class="w-24">Código Producto</th>
                <th class="w-24">Total Línea</th>

            </tr>
        </thead>
        <tbody>
				<tr>
					<td>
						{{$detalles->id}}
					</td>
                    <td>
						{{$detalles->id_cotizacion}}
					</td>

                    <td>
						{{$detalles->cod_servicio}}
					</td>  
                    <td>
						{{$detalles->cod_producto}}
					</td>
                    <td>
						{{$detalles->total_linea}}
					</td>
                           
				</tr>
 
        </tbody>
    </table>




@stop

@section('css')
    <link rel="stylesheet" href="/css/table.css">

@stop

@section('js')
    <script> 
        $(document).ready(function () {
            $('#dtHorizontalExample').DataTable({
                "scrollX": true,
                "lengthChange": false,
                "bFilter": false,
                "bInfo" : false
            });
            $('.dataTables_length').addClass('bs-select');

        });


    </script>
@stop

                    