<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Empleado</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body> 
        <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" >Empleado</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Stock')}}">Consultar Stock</a>
                            </li>
                        </ul>
                    </div>
                    <a class ="user"> Empleado: <b> {{auth()->user()->name}}</b></a>
                    <a class="nav-link" href="{{ route('logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log Out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </nav>
        </div>

        <div class="container">
        <br><br><br>
        <div class="card ">
            <div class="card-header text-white bg-secondary ">
                Home
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>Bienvenid@ @auth <b> {{auth()->user()->name}}</b> @endauth! Usted se encuentra en el Home.</p>
                <p>
                    Para consultar el stock de un determinado auto, por favor observe en la barra de navegación,
                    la sección consultar stock, alli podra filtrar y realizar su consulta correspondiente. Para finalizar
                    la sesión, deberá hacer click en log out.
                </p>
                </blockquote>
            </div>
        </div>
</div>


        
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>