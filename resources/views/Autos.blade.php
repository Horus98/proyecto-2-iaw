@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <p><h5>Ustde se encuentra en la seccion autos, aqui podra ver todos los autos que hay almacenados en la BD, mediante un click
            al botón "Listar Todos Los Autos", si desea agregar un auto, haga click en el boton "Agregar Auto", finalmente, si desea ver 
            los autos en stock y a su vez, si lo desea, puede eliminarlos, mediante el boton "Listar/Eliminar Autos".
    </h5></p>
    <br><br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-success btn-lg btn-block" href="{{route('AgregarAuto')}}" role="button">Agregar Autos</a>    
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-danger btn-lg btn-block" href="{{route('EliminarAuto')}}" role="button">Listar/Eliminar Autos</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-dark btn-lg btn-block" href="{{route('listarAutos')}}" role="button">Listar Todos Los Autos</a>
        </div>
        <div class = "col-4"></div>
    </div>
</div>
             
@endsection