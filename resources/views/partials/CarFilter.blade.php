
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
                        <option selected value = "100000000">Max Price</option>
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