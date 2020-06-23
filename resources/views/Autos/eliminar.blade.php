
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
                @include('partials.CarFilter')
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
    