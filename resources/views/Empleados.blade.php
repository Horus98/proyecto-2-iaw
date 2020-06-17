@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <p><h5>Usted se encuentra en la seccion empleados, aqui podra ver todos los empleados del concesionario, mediante un click
            al botón "Listar Empleados", si desea agregar un empleado, haga click en el boton "Agregar Empleado", finalmente, si desea 
            eliminar a un empleado haga click en el boton "Eliminar Empleado".
    </h5></p>
    <br><br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-success btn-lg btn-block" href="{{route('listarAutos')}}" role="button">Agregar Empleado</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-danger btn-lg btn-block" href="{{route('AgregarAuto')}}" role="button">Eliminar Empleado</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-dark btn-lg btn-block" href="{{route('EliminarAuto')}}" role="button">Listar Empleados</a>
        </div>
        <div class = "col-4"></div>
    </div>



</div>
             
@endsection