@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Ventas')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<div class = "container-fluid">  
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Las ventas encontradas son las siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @include('partials.FlashMessage')
        <div class = "row">
                <div class= "col">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Numero Venta</th>
                                <th>Empleado</th>
                                <th>Fecha</th>
                                <th>ID Auto</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Edition</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->empleado}}</td>
                                <td>{{$v->fecha}}</td>
                                <td>{{$v->auto}}</td>
                                <td>{{$v->car->marca}}</td>
                                <td>{{$v->car->modelo}}</td>
                                <td>$ {{number_format($v->car->precio,0,0,".")}}</td>
                                <td><img src="{{$v->car->imagen}}" alt="imagen del auto no disponible"></td>
                                <td>           
                                    <div class="btn-group" role="group">
                                            <div class="col-6 custom">
                                                <form  action="{{route('deleteSale',$v->id)}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"onclick="return confirm('Esta seguro que desea eliminar ');" > Eliminar</button> 
                                                </form>  
                                            </div>
                                            <div class="col-6 custom">                
                                                <button type="button" class="btn btn-info edit" data-toggle="modal" value = "{{$v->id}}" data-target="#exampleModal" > Editar</button> 
                                            </div>  
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

<form  action="{{route('editSale')}}" method="POST">
    @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edición</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name = "saleID" >  
                        <input name ="name" class="form-control" type="text" placeholder="Nombre Empleado.." required>
                        <br>                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
 <script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function(){
  $(".edit").click(function(){
    var value = $(this).val();
    $('input[name=saleID]').val(value);
  });
});
</script>