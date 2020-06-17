
@extends('navAdministrador')
@section('atras')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Autos')}}"><b> Atras</b></a>
    </li>
@endsection
@section('content')

    <div class="container">
        <form method = "GET" action = "{{route('getCarsInfoDelete')}}"  >
            @csrf
            <h4 class="text-center">Search car..</h4>
            <br>
            <div class="form-row">
                <div class="col-3">
                    <select class="form-control" name = "brandCar" id="brandCar"  >
                        <option selected value = "*">Brand Car</option>
                        @foreach($cars ?? '' as $car)
                        <option value = "{{$car}}">{{ $car }}</option>
                        @endforeach
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
                <button class="btn btn-dark btn-lg btn-block" id = "searchButton"  >Search</button>
            </div>
          </div>
          </form>
          <br>
         
    </div>
  

    @endsection
    