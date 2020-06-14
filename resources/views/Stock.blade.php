<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Empleado</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">Empleado</span>
        <span class="navbar-brand mb-0 h1"><a href="/">Exit</a></span>
    </nav>
    <br>
 
    <div class="container">
        <form method = "GET" action = "{{route('getCarsInfo')}}"  >
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    <script type="text/javascript" src="{!! asset('js/app.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>