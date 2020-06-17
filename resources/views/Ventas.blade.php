@extends('navAdministrador')
@section('content')

<div class = "container">
    <br>
    <br>
    
    <p><h5>Usted se encuentra en la seccion ventas, aqui podra ver todos las ventas del concesionario, mediante un click
            al botón "Listar Ventas", si desea agregar una venta, haga click en el boton "Agregar Venta", finalmente, si desea 
            eliminar una Venta haga click en el boton "Eliminar Venta".
    </h5></p>
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
            <a class="btn btn-danger btn-lg btn-block" href="{{route('AgregarAuto')}}" role="button">Eliminar Venta</a>
        </div>
        <div class = "col-4"></div>
    </div>
    <br>
    <br>
    <div class = "row">
        <div class = "col-4"></div>
        <div class = "col-4">
            <a class="btn btn-dark btn-lg btn-block" href="{{route('ListarVentas')}}" role="button">Listar Ventas</a>
        </div>
        <div class = "col-4"></div>
    </div>



</div>
             
@endsection
