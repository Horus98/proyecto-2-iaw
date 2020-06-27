@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('EliminarAuto')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<style type="text/css">.img{width:200px;height:120px;} </style>
    <div class = "container">
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Los vehículos encontrados son los siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class = "row">    
            <div class="col-3"></div>
                <div class="col-6">
                    <div class="flash-message">
                    <br>   
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </p>
                            @endif
                        @endforeach
                    </div> 
                </div>
            </div>
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
                                <th>Edition</th>
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
                                <td>En venta</td>
                                @if ($c->imagen == "NO HAY IMAGEN DISPONIBLE" or $c->imagen == "No hay")
                                    <td>NO HAY IMAGEN DISPONIBLE</td>
                                @else
                                    <td>
                                    <img class = "img" src="{{$c->imagen}}" title = "{{$c->marca}} {{$c->modelo}}" alt="auto"></td>
                                @endif                                       
                                <td>     
                                    <div class="btn-group" role="group">
                                        <div class="col-6 custom">
                                            <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal" value ="{{$c->id}}"  data-target="#deleteModal"> Eliminar</button>
                                        </div>
                                        <div class="col-6 custom">
                                            <button type="button" class="btn btn-info btn-sm edit" data-toggle="modal" value = "{{$c->id}}" data-target="#exampleModal" > Editar</button>   
                                        </div>  
                                    </div>
                                </td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


<form action="{{route('Autos.Eliminar.Destroy')}}" method="POST">
    @csrf
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteLabel">Eliminar Auto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Seguro que desea eliminar??
                <input type="hidden" name = "carID" > 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
</form>

    </div>

    <form  action="{{route('editCar')}}" method="POST">
    @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Auto</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name = "carID" >  
                        <div class="form-row">
                            <br><br>
                            <input type="number" min = "1935" max = "2021" class="form-control" id="validationCustom03" placeholder="Año" name="anio" >
                            <br><br>
                            <input type="number" min="0" max = "10000000" class="form-control" id="validationCustom04" placeholder="Kilometros" name="km">
                            <br><br>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Descripción" name="descripcion" >
                            <br><br>
                            <input type="number" min="100000" max = "100000000" class="form-control" id="validationCustom01" placeholder="Precio" name="price" >
                            <br><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   


@endsection
@include('partials.Scripts') <script>

</script>
    <script>
        window.setTimeout(function() {
            $("#alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 1500);

$(document).ready(function(){
  $(".delete").click(function(){
    var value = $(this).val();
    $('input[name=carID]').val(value);
  });
});

$(document).ready(function(){
  $(".edit").click(function(){
    var value = $(this).val();
    $('input[name=carID]').val(value);
  });
});

$(document).ready(function() {
    $('#example').DataTable();
} );

</script>