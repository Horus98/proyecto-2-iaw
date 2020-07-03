@extends('navAdministrador')
@section('content')

<div class="container">
    <br>
    <br>

    <div class="card ">
        <div class="card-header text-white bg-secondary ">
            Autos
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Usted se encuentra en la sección <b>Autos</b> En esta sección usted podra realizar todas las acciones
                    referidas a autos, ya sea ingresar uno nuevo, mediante el botón "Agregar Auto", ó, podrá listar los
                    autos en
                    stock, y a su vez editarlos o eliminarlos según se desee.
                </p>
            </blockquote>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-4 "></div>
        <div class="col-4 ">
            <a class="btn btn-success btn-lg btn-block" href="{{route('AgregarAuto')}}" role="button">
                <svg class="bi bi-plus" width="1.5em" height="1.5em" viewBox="0 0 17 17" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                </svg>
                Agregar Autos
            </a>
        </div>
        <div class="col-4"></div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <a class="btn btn-primary btn-lg btn-block" href="{{route('EliminarAuto')}}" role="button">
                <svg class="bi bi-info-circle-fill" width="1em" height="1em" viewBox="0 0 18 18" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                </svg>
                Información Autos
            </a>
        </div>
        <div class="col-4"></div>
    </div>
    <br>
    <br>
</div>

@endsection
