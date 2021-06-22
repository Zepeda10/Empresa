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


<a class="btn btn-primary " href="{{route('cotizaciones.create')}}">Agregar</a>

<table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
        <thead>
            <tr>
                <th class="w-24">Id</th>
                <th class="w-24">Id Cliente</th>
                <th class="w-24">IVA</th>
                <th class="w-24">Subtotal</th>
                <th class="w-24">Total</th>
                    
                <th class="w-24">Detalles</th>
                <th class="w-24">Editar</th>
                <th class="w-24">Eliminar</th>
            </tr>
        </thead>
        <tbody>
			@foreach($cotizaciones as $cotizacion)
				<tr>
					<td>
						{{$cotizacion->id}}
					</td>
                    <td>
						{{$cotizacion->id_cliente}}
					</td>

                    <td>
						{{$cotizacion->iva}}
					</td>  
                    <td>
						{{$cotizacion->subtotal}}
					</td>
                    <td>
						{{$cotizacion->total}}
					</td>
                           
                    <td>
						<a href="{{route('cotizaciones.show', $cotizacion->id)}}">
                            <button class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                            </svg>
                            </button>
						</a>
					</td>
                    <td>
						<a href="{{route('cotizaciones.edit', $cotizacion->id)}}">
                            <button class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                </svg>
                            </button>
						</a>
					</td>
					<td>
						<form class="form-eliminar" action="{{route('cotizaciones.destroy',$cotizacion->id)}}"  method="post" accept-charset="utf-8">
							@csrf
							@method('delete')
							<button type="submit" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
							</button>
						</form>
					</td>
				</tr>
			@endforeach	  
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

                    