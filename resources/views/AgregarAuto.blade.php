
@extends('navAdministrador')
@section('content')
<br>
<br>
<div class = "container-lg">
    <div class = "row">
        <div class = "col-12">
            <form enctype="multipart/form-data" method = "POST" action = "{{route('saveCar')}}" class="needs-validation"   novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom01">Nombre de la Marca</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Marca"  name="marca" required>
                        <div class="valid-feedback">
                            Bien Hecho!
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom02">Nombre del Modelo</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Modelo" name="modelo" required>
                        <div class="valid-feedback">
                            Bien Hecho!
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom06">Seleccione una Imagen</label>
                        <div class="file-upload-wrapper">
                            <input accept="image/*" type="file" name="imagen"  >
                        </div>
                        <div class="valid-feedback">
                            Bien Hecho!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Año</label>
                        <input type="number" min = "1935" max = "2021" class="form-control" id="validationCustom03" placeholder="Año" name="anio" required>
                        <div class="invalid-feedback">
                            Por favor ingrese un año comprendido entre 1935 y 2021.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Kilometros</label>
                        <input type="number" min="0" max = "9990000" class="form-control" id="validationCustom04" placeholder="Kilometros" name="km"required>
                        <div class="invalid-feedback">
                            Por favor ingrese una cantidad de kilometros entre 0 y 9.990.000 .
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Descripción</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Descripción" name="descripcion" required>
                        <div class="invalid-feedback">
                            Por favor complete el campo.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Precio</label>
                        <input type="number" min="0" max = "10000000" class="form-control" id="validationCustom05" placeholder="Precio" name="price" required>
                        <div class="invalid-feedback">
                            Ingrese un precio valido.
                        </div>
                    </div>
                </div>
                <br>
                <div class = "form-row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Guardar vehículo</button>
                    </div>
                </div>
            </form>
                <div class = "row">
                    <div class = "col-4"></div>
                    <div class = "col-4">
                        <div class="flash-message">
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
    </div>
</div>
@endsection

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


</script>
