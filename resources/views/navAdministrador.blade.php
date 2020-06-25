<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


    <title>Administrador</title>
  </head>
  <body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{!! asset('uploads/logo.png') !!}" width="40" height="40" class="d-inline-block align-top" alt="icono concesionario">
            </a>
            <a class="navbar-brand" >Administración</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('administrador')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Autos')}}">Autos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('Empleados')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Ventas')}}">Ventas</a>
                </li>
                @yield('atras')
              </ul>
              
            </div>
            <a class ="user"> Administrador: <b> {{auth()->user()->name}}</b></a>
            <a class="nav-link" href="{{ route('logout')}}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Log Out') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </nav>
          
    </div>
    @yield('content')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      
    
  </body>
</html>








