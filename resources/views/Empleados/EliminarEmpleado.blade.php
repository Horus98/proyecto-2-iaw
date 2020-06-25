@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Empleados')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<div class = "container-fluid">  
        <div id = "alert" class="alert alert-success fade show" role="alert">
           Los Empleados encontradas son los siguientes:
            <button type="button" id= "close" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class = "row">
                <div class= "col">
                    <table id="example" class="table table-striped table-bordered  text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Empleado</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Edition</th>
                                <th>Api_token</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $v)
                            <tr>
                                <td>{{$v ->id}}</td>
                                <td>{{$v ->name}}</td>
                                <td>{{$v ->email}}</td>
                                <td>{{$v ->rol}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <div class="col-6 custom">  
                                            <button type="button" class="btn btn-danger delete " data-toggle="modal" value = "{{$v->id}}" data-target="#deleteModal" > Eliminar</button> 
                                        </div>
                                        <div class="col-6 custom">
                                                <button type="button" class="btn btn-info edit" data-toggle="modal" value = "{{$v->id}}" data-target="#exampleModal" > Editar</button>   
                                        </div>  
                                    </div>
                                </td>
                                <td>
                                    <button  type="button" class="btn btn-primary " data-toggle="popover" data-placement="top" title="Api Token" data-content="{{$v->api_token}}">Show Api Token</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    @include('partials.FlashMessage')
    <form  action="{{route('editUser')}}" method="POST">
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
                        <input type="hidden" name = "userID" >  
                        <input name ="name" class="form-control" type="text" placeholder="Nombre Empleado.." >
                        <br>              
                        <input name ="email" class="form-control " type="email" placeholder="Email .." >                       
                        <br>
                        <select class="form-control" name="rol" id="rol">
                            <option value="Administrador">Administrador</option>
                            <option value="Empleado">Empleado</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form  action="{{route('deleteUser')}}" method="POST">
    @csrf
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Eliminar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <p>Realmente desea Eliminar al usuario seleccionado ?</p>
                        <input type="hidden" name = "userID" >  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

@endsection

@include('partials.Scripts')
 <script>
$(document).ready(function() {
    $('#example').DataTable();
} );

$(function () {
  $('[data-toggle="popover"]').popover()
})

$(document).ready(function(){
  $(".edit").click(function(){
    var value = $(this).val();
    $('input[name=userID]').val(value);
  });
});


$(document).ready(function(){
  $(".delete").click(function(){
    var value = $(this).val();
    $('input[name=userID]').val(value);
  });
});


</script>