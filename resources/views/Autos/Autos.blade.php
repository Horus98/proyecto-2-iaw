@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <div class="card ">
        <div class="card-header text-white bg-secondary ">
            Autos
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>Usted se encuentra en la sección <b>Autos</b>, aqui podra ver todos los autos que hay almacenados en la BD, mediante un click
            al botón "Listar Todos Los Autos", si desea agregar uno, haga click en el botón "Agregar Auto", finalmente, si desea ver 
            los autos en stock y a su vez, si lo desea, puede eliminarlos o editarlos, presione el botón "Información Autos".
            </p>
            </blockquote>
        </div>
    </div>
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
            <a class="btn btn-primary btn-lg btn-block" href="{{route('EliminarAuto')}}" role="button">Información Autos</a>
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