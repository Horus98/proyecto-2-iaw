@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Ventas')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<div class = "container-fluid">  
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Las ventas encontradas son las siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class = "row">
                <div class= "col">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero Venta</th>
                                <th>Empleado</th>
                                <th>Fecha</th>
                                <th>ID Auto</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $v)
                            <tr>
                                <td>{{$v->numero}}</td>
                                <td>{{$v->empleado}}</td>
                                <td>{{$v->fecha}}</td>
                                <td>{{$v->auto}}</td>
                                <td>{{$v->car->marca}}</td>
                                <td>{{$v->car->modelo}}</td>
                                <td>$ {{number_format($v->car->precio,0,0,".")}}</td>
                                <td><img src="{{$v->car->imagen}}" alt="imagen del auto no disponible"></td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <button id ="btnDelete" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Esta seguro que desea eliminar el auto);"> Eliminar</button>
                                    </form>  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection