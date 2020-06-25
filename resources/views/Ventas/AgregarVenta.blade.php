@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Ventas')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')
<div class="container">
        <form method = "GET" action = "{{route('AgregarVentaListaAutos')}}"  >
            @csrf
            <h4 class="text-center">Search car to sell..</h4>
            <br>
            <div class="form-row">
                <div class="col-3">
                    <select class="form-control" name = "brandCar" id="brandCar"  >
                        <option selected value = "*">Brand Car</option>
                    </select>
                </div>
                @include('partials.CarFilter')
            </div>
            
          <br>
          <div class = "row">
            <div class = "col-4"></div>
            <div class = "col-4 text-center ">
                <button class="btn btn-dark btn-lg btn-block" id = "searchButton" type="submit" >Search</button>
            </div>
          </div>
          </form>
          <br>
         
    </div>
    @include('partials.FlashMessage')




@include('partials.Scripts')
<script type="text/javascript" src="/js/app.min.js"></script>
<script>
$.get( "{{route('getBrands')}}", function( data ) {
    $.each(JSON.parse(data), function(i, item) {
        $('select[name="brandCar"]').append('<option value="'+item.marca+'">'+item.marca+'</option>');   
});
});
</script>

@endsection