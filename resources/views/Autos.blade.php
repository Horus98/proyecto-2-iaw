@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-dark btn-lg btn-block" href="{{route('listarAutos')}}" role="button">Listar Todos</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-success btn-lg btn-block" href="{{route('Stock')}}" role="button">Listar Stock</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-danger btn-lg btn-block" href="{{route('AgregarAuto')}}" role="button">Agregar Autos</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-warning btn-lg btn-block" href="/" role="button">Eliminar Autos</a>
        </div>
        <div class = "col-4"></div>
    </div>



</div>
             
@endsection