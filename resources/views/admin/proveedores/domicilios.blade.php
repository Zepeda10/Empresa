<?php 
session_start();
if(!isset($_SESSION['usuario'])||$_SESSION['usuario']==null || $_SESSION['usuario']==""){
    return redirect()->route('sesion.login');
}

?>

@extends('adminlte::page')

@section('title', 'Domicilios')

@section('content_header')
    <h1>Domicilios de Proveedores</h1>
@stop

@section('content')


<table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
        <thead>
            <tr>
                <th class="w-24">ID</th>
                <th class="w-24">Calle</th>
                <th class="w-24">No. Exterior</th>
                <th class="w-24">No. Interior</th>
                <th class="w-24">Código Postal</th>
                <th class="w-24">Barrio</th>
                <th class="w-24">Ciudad</th>
                <th class="w-24">Municipio</th>
                <th class="w-24">Estado</th>
            </tr>
        </thead>
        <tbody>
			@foreach($proveedor as $prov)
				<tr>
					<td>
						{{$prov->id}}
					</td>   
                    <td>      
						{{$prov->calle}}
					</td>
                    <td>
						{{$prov->num_exterior}}
					</td>
                    <td>
						{{$prov->num_interior}}
					</td>
                    <td>
						{{$prov->cod_postal}}
					</td>
                    <td>
						{{$prov->barrio}}
					</td>
                    <td>
						{{$prov->ciudad}}
					</td>
                    <td>
						{{$prov->municipio}}
					</td>
                    <td>
						{{$prov->estado}}
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

        