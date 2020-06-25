

@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('AgregarVenta')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<style type="text/css">.img{width:200px;height:120px;} </style>
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
                    <table id="tabla" class="table table-striped table-bordered" style="width:100%">
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
                                <th>Sell</th>
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
                                    <td><strong>Vendido</strong></td>
                                @else
                                    <td>En venta</td>
                                @endif
                                @if ($c->imagen == "NO HAY IMAGEN DISPONIBLE" or $c->imagen == "No hay")
                                    <td>NO HAY IMAGEN DISPONIBLE</td>
                                @else
                                    <td><img class = "img" src="{{$c->imagen}}" alt="auto"></td>
                                @endif 
                                <td> 
                                    <button type="button" class="btn btn-success agregar" value = "{{$c->id}}" data-toggle="modal" data-target="#exampleModal">
                                        Agregar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
<form action="{{route('storeSale')}}" method="POST" class="needs-validation"   onsubmit="return validateForm()">
    @csrf 
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seleccion de Empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <input type="hidden" name = "carID">
                    <input name ="empleado" class="form-control" type="text" placeholder="Nombre Empleado.." required>
                </div>
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" >Guardar Venta</button>
        </div>
        </div>
    </div>
    </div>
</form>     
 @endsection

 @include('partials.Scripts')
<script>
$(document).ready(function() {
    $('#tabla').DataTable();
} );
</script>



 <script>
function validateForm() {
  var x = document.forms["agregar"]["empleado"].value;
  if (x == "" || x == null) {
    alert();
    return false;
  }
}

$(document).ready(function(){
  $(".agregar").click(function(){
    var value = $(this).val();
    $('input[name=carID]').val(value);
  });
});
</script>
