@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <div class="card ">
        <div class="card-header text-white bg-secondary ">
            Empleados
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>
                    Usted se encuentra en la sección <b>Empleados</b>, aqui podra ver todos los empleados del concesionario, mediante un click
                    al botón "Información Empleados", a su vez en dicha sección podrá eliminar si desea o incluso editar cualquiera de los empleados
                    mostrados, por último, si desea agregar un empleado, haga click en el botón "Agregar Empleado   ".
                </p>
            </blockquote>
        </div>
    </div>
    <br><br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">                   
            <a class="btn btn-success btn-lg btn-block" href="/register" role="button">Agregar Empleado</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-primary btn-lg btn-block" href="{{route('EliminarEmpleados')}}" role="button">Información Empleados</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>

</div>

@include('partials.FlashMessage')
             
@endsection

