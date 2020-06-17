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
                <div class="col">
                    <select class="form-control" id="modelCar" name = "modelCar" >
                        <option selected value = "*">Model Car</option>
                    </select>
                </div>
                
                <div class="col-3">
                    <select class="form-control" id="minPrice" name="minPrice" onchange = "showSelectedMinPrice();" >
                        <option selected value = "0">Min Price</option>
                    </select>
                </div>
                
                <div class="col-3">
                    <select class="form-control" id="maxPrice" name = "maxPrice" >
                        <option selected value = "10000000">Max Price</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <select class="form-control" id="minYear" name = "minYear" onchange = "showSelectedMinYear();" >
                        <option selected value = "1935">Min Year</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="maxYear" name = "maxYear" >
                        <option selected value= "2021">Max Year</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="minKm" name = "minKm" onchange = "showSelectedMinKm();">
                        <option selected value = "0">Min Km</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" id="maxKm" name ="maxKm" >
                        <option selected value = "10000000">Max Km</option>
                    </select>
                </div>
                
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
@endsection

<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
<script>
$.get( "{{route('getBrands')}}", function( data ) {
    $.each(JSON.parse(data), function(i, item) {
        $('select[name="brandCar"]').append('<option value="'+item.marca+'">'+item.marca+'</option>');   
});
});


</script>