@extends('navAdministrador')
@section('atras')
<li class="nav-item">
    <a class="nav-link" href="{{ route('Autos')}}"><b> Atras</b></a>
</li>
@endsection
@section('content')

<div class="container"><br>
    <form method="GET" action="{{route('getCarsInfoDelete')}}">
        @csrf
        <h4 class="text-center">Search car..</h4>
        <br>
        <div class="form-row">
            <div class="col-3">
                <select class="form-control" name="brandCar" id="brandCar">
                    <option selected value="*">Brand Car</option>
                    @foreach($cars ?? '' as $car)
                    <option value="{{$car}}">{{ $car }}</option>
                    @endforeach
                </select>
            </div>
            @include('partials.CarFilter')
        </div>

        <br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 text-center ">
                <button class="btn btn-dark btn-lg btn-block" id="searchButton">
                    <svg class="bi bi-search" width="0.9em" height="0.9em" viewBox="0 0 16 16" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                    Search
                </button>
            </div>
        </div>
    </form>
    <br>

</div>

@include('partials.Scripts')
<script type="text/javascript" src="/js/app.min.js"></script>
@endsection
