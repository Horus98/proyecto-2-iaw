@extends('navAdministrador')
@section('atras')
<li class="nav-item">
    <a class="nav-link" href="{{ route('Autos')}}"><b> Atras</b></a>
</li>
@endsection
@section('content')
<br>
<br>
<div class="container-xl">
    <div class="row">
        <div class="col-12">
            <form enctype="multipart/form-data" method="POST" action="{{route('saveCar')}}" class="needs-validation"
                novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom01">Nombre de la Marca</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Marca" name="marca"
                            required>
                        <div class="valid-feedback">
                            Bien Hecho!
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom02">Nombre del Modelo</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Modelo"
                            name="modelo" required>
                        <div class="valid-feedback">
                            Bien Hecho!
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="validationCustom06">Seleccione una Imagen</label>
                        <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" name="imagen"
                                id="validationCustom06" aria-describedby="myInput" required>
                            <label class="custom-file-label" for="myInput">Choose file</label>
                            <div class="valid-feedback"> Bien Hecho! </div>
                            <div class="invalid-feedback"> Por favor seleccione una imagen.</div>
                            @if ($errors->has('imagen'))
                            <div class="alert alert-danger" role="alert">La imagen no puede ser mayor a 2.5MB 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Año</label>
                        <input type="number" min="1935" max="2021" class="form-control" id="validationCustom03"
                            placeholder="Año" name="anio" required>
                        <div class="invalid-feedback">
                            Por favor ingrese un año comprendido entre 1935 y 2021.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Kilometros</label>
                        <input type="number" min="0" max="9990000" class="form-control" id="validationCustom04"
                            placeholder="Kilometros" name="km" required>
                        <div class="invalid-feedback">
                            Por favor ingrese una cantidad de kilometros entre 0 y 9.990.000 .
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Descripción</label>
                        <input type="text" class="form-control" id="validationCustom05" placeholder="Descripción"
                            name="descripcion" required>
                        <div class="invalid-feedback">
                            Por favor complete el campo.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Precio</label>
                        <input type="number" min="0" max="10000000" class="form-control" id="validationCustom05"
                            placeholder="Precio" name="price" required>
                        <div class="invalid-feedback">
                            Ingrese un precio valido.
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button class="btn btn-dark btn-lg btn-block" onclick=capitalizeBrandAndModel();
                            type="submit">Guardar vehículo</button>
                    </div>
                </div>
            </form>
            @include('partials.FlashMessage')
        </div>
    </div>
</div>

@include('partials.Scripts')
<script type="text/javascript" src="/js/agregarAuto.min.js"></script>
<script type="text/javascript" src="/js/agregarAutoScript.min.js"></script>
@endsection
