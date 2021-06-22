<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>



@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')


<a class="btn btn-primary " href="{{route('servicios.create')}}">Agregar</a>

<table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
        <thead>
            <tr>
                <th class="w-24">Id</th>
                <th class="w-24">Código</th>
                <th class="w-24">Nombre</th>
                <th class="w-24">Descripción</th>
                <th class="w-24">Tipo</th>
                <th class="w-24">Especificación</th>
                <th class="w-24">Cantidad</th>
                <th class="w-24">Precio</th>        
                
                <th class="w-24">Editar</th>
                <th class="w-24">Eliminar</th>
            </tr>
        </thead>
        <tbody>
			@foreach($servicios as $servicio)
				<tr>
					<td>
						{{$servicio->id}}
					</td>
                    <td>
						{{$servicio->codigo}}
					</td>

                    <td>
						{{$servicio->nombre}}
					</td>  
                    <td>
						{{$servicio->descripcion}}
					</td>
                    <td>
						{{$servicio->tipo}}
					</td>
                    <td>
						{{$servicio->especificacion}}
					</td>
                    <td>
						{{$servicio->cantidad}}
					</td>
                    <td>
						{{$servicio->precio}}
					</td>                   
                   
                    <td>
						<a href="{{route('servicios.edit', $servicio->id)}}">
                            <button class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush-fill" viewBox="0 0 16 16">
                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04z"/>
                                </svg>
                            </button>
						</a>
					</td>
					<td>
						<form class="form-eliminar" action="{{route('servicios.destroy',$servicio->id)}}"  method="post" accept-charset="utf-8">
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

                    