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
                                            <form  action="{{route('deleteUser',$v ->id)}}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"onclick="return confirm('Esta seguro que desea eliminar a {{$v ->name}} ?');" > Eliminar</button> 
                                            </form>  
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
    @include('partials.FlashMessage')

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
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


</script>