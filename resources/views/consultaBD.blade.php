<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<style type="text/css">.img{width:200px;height:120px;} </style>
<nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Empleado</span>
        <span class="navbar-brand mb-0 h1"><a href="/Stock">Realizar otra consulta</a></span>
        <span class="navbar-brand mb-0 h1"><a href={{route('ruta1')}}>Atras</a></span>
    </nav>
    <br>
    <div class = "container-fluid">
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Los vehículos encontrados son los siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class = "row">
                <div class= "col">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Price</th>
                                <th>Km</th>
                                <th>Description</th>
                                <th>In Sale</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consulta as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->marca}}</td>
                                <td>{{$c->modelo}}</td>
                                <td>{{$c->anio}}</td>
                                <td> $ {{number_format($c->precio,0,0,".")}}</td>
                                <td>{{number_format($c->kilometros,0,0,".")}}</td>
                                <td> {{$c->descripcion}} </td>
                                @if ($c->vendido == 1)
                                    <td>Vendido</td>
                                @else
                                    <td>En venta</td>
                                @endif
                                @if ($c->imagen == "NO HAY IMAGEN DISPONIBLE" or $c->imagen == "No hay")
                                    <td>NO HAY IMAGEN DISPONIBLE</td>
                                @else
                                    <td><img class="img" src="{{$c->imagen}}" alt="auto"></td>
                                @endif                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   
    <script>
        window.setTimeout(function() {
            $("#alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 1500);
    </script>