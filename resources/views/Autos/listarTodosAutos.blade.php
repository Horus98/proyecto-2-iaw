

@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Autos')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<style type="text/css">.img{width:200px;height:120px;} </style>
    <br>
    <div class = "container-fluid">  
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Los vehículos encontrados son los siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class = "row">
                <div class= "col">
                    <table id="tabla" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Price</th>
                                <th>Km</th>
                                <th>Description</th>
                                <th>In Sale</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consulta as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->marca}}</td>
                                <td>{{$c->modelo}}</td>
                                <td>{{$c->anio}}</td>
                                <td> $ {{number_format($c->precio,0,0,".")}}</td>
                                <td>{{number_format($c->kilometros,0,0,".")}}</td>
                                <td> {{$c->descripcion}} </td>
                                @if ($c->vendido == 1)
                                    <td><strong>Vendido</strong></td>
                                @else
                                    <td>En venta</td>
                                @endif
                                @if ($c->imagen == "NO HAY IMAGEN DISPONIBLE" or $c->imagen == "No hay")
                                    <td>NO HAY IMAGEN DISPONIBLE</td>
                                @else
                                    <td><img class = "img" src="{{$c->imagen}}" alt="auto"></td>
                                @endif 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>



  @include('partials.Scripts')
 <!-- <script>
$(document).ready(function() {
    $('#tabla').DataTable();
} );
</script>  -->
{{ $consulta->appends(['sort' => 'anio'])->links() }}

@endsection