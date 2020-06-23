@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <div class="card ">
        <div class="card-header text-white bg-secondary ">
            Ventas
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>
                    Usted se encuentra en la sección <b>Ventas</b>, aqui podra ver todos las ventas del concesionario, mediante un click
                    al botón "Información Ventas", a su vez en dicha sección podrá eliminar o editar si desea, cualquiera de las ventas
                    mostradas, por último, si desea agregar una venta, haga click en el botón "Agregar Venta". 
                </p>
            </blockquote>
        </div>
    </div>
    <br><br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-success btn-lg btn-block" href="{{route('AgregarVenta')}}" role="button">Agregar Venta</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-primary btn-lg btn-block" href="{{route('ListarVentas')}}" role="button">Información Ventas</a>
        </div>
        <div class = "col-4"></div>
    </div>



</div>
             
@endsection
