@extends('navAdministrador')
@section('content')

<div class="container-xl">
<br><br>
    <div class="card ">
        <div class="card-header text-white bg-secondary ">
            Home
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
            <p>Bienvenid@ @auth <b> {{auth()->user()->name}}</b> @endauth! Usted se encuentra en el Home.</p>
            <p>Si desea navegar sobre las diferentes rutas, estas se encuentran en la parte superior del sistema.</p>
            <p>En ellas podra observar las 3 diferentes secciones, Autos, Empleados y Ventas</p>
            </blockquote>
        </div>
    </div>
</div>
@endsection
@include('partials.Scripts')
