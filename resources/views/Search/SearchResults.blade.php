<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Search</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="Search/resultsearch.css">

</head>
<body>



        <section class="ser">
        <form method="POST" action="SecondSearch" name="SecondSearchForm" id="SecondForm">
            @csrf
        <input type="search" class="input1" placeholder="city or region" name="SearchQuery" required id="">
        <select class="serves" id="" name="PropertyStatus">
            <option value="" disabled hidden selected>Property Status</option>
            <option value="Buy" >for sale</option>
            <option value="Rent">for rent</option>
        </select>
        <select name="PropertyType" class="serves">
            <option value="" disabled hidden selected>property type</option>
            @foreach ($PropertyType as $type)
            <option value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
            @endforeach
        </select>
        <select name="Bedrooms" class="serves">
            <option value="" disabled hidden selected>bedrooms</option>
            <option value="1">1 bedroom</option>
            <option value="2">2 bedroom</option>
            <option value="3">3 bedroom</option>
            <option value="4">4 bedroom</option>
            <option value="5">5 bedroom</option>
            <option value="6">6 bedroom</option>
            <option value="7">7 bedroom</option>
            <option value="8">8 bedroom</option>

        </select>
        <select name="Bathrooms" class="serves">
            <option value="" disabled hidden selected>bathrooms</option>
            <option value="1">1 bathroom</option>
            <option value="2">2 bathroom</option>
            <option value="3">3 bedroom</option>
            <option value="4">4 bathroom</option>
            <option value="5">5 bathroom</option>


        </select>
        <select name="PriceRange" class="serves">
            <option value="" disabled hidden selected>price</option>
            <option value="100000-200000">100,000$ to 200,000$</option>
            <option value="200000-300000">200,000$ to 300,000$</option>
            <option value="300000-400000">300,000$ to 400,000$</option>
            <option value="400000-500000">400,000$ to 500,000$</option>
            <option value="500000-600000">500,000$ to 600,000$</option>
            <option value="600000-700000">600,000$ to 700,000$</option>
            <option value="700000-800000">700,000$ to 800,000$</option>
            <option value="800000-900000">800,000$ to 900,000$</option>
            <option value="900000-1000000">900,000$ to 1000,000$</option>
            <option value="+">1000,000+$</option>



        </select>

                <button type="submit" value="search property" class="btn" id="btnn">search property</button>


        </form>

        </section>


        <section class="filterb">
            <div class="filter" >
                <h5 class="label">{{$ItemsNumber}} Results </h5>

                <p class="pfilter"> {{$ItemsNumber}} results</p>


            </div>
            </section>
    <section class="featured" id="featured">


        <div class="box-container">

            @foreach ($FoundedProperties as $Property)
            <div class="box">
                <div class="image-container">
                   <a href="ViewProperty/{{$Property->id}}"><img src="{{asset('Properties/'.$Property->Property_Image)}}" alt="No Photo"></a>
                    <div class="info">
                        <h3>{{$Property->created_at->DiffForHumans(now())}}</h3>
                        <h3>for {{$Property->PropertyStatus}}</h3>
                    </div>
                    <div class="icons">
                        <a href="#" class="fas fa-film"><h3>1</h3></a>
                        <a href="#" class="fas fa-camera"><h3>4</h3></a>
                    </div>
                </div>
                <div class="content">
                    <div class="price">
                        <h3>{{$Property->Price}}@if($Property->PropertyStatus == 'Rent')/mo @else $ @endif</h3>
                        <form @if(session('UserId')) action="AddtoFavs" @endif>
                            <input type="hidden" name="PropertyID"value="{{$Property->id}}">
                        <a href="#" class="fas fa-heart"></a>
                        </form>
                        <a href="#" class="fas fa-envelope"></a>
                        <a href="#" class="fas fa-phone"></a>
                    </div>
                    <div class="location">
                        <h3>{{$Property->PropertyType->Type_name}}</h3>
                        <p>{{$Property->Location}} - {{$Property->Description}}</p>
                    </div>
                    <div class="details">
                        <h3> <i class="fas fa-expand"></i> {{$Property->Area}}  sqft </h3>
                        <h3> <i class="fas fa-bed"></i>{{$Property->Bedrooms}} beds </h3>
                        <h3> <i class="fas fa-bath"></i> {{$Property->Bathrooms}} baths </h3>
                    </div>
                    <div class="buttons">
                        @if(!IsPurshased($Property->id))<a @if(session('UserId') && session('UserId') != $Property->Publisher_id ) href="Pay/{{$Property->id}}" @endif class="btn">Purshase</a>
                        @else <b style="background-color: red">Sold Out</b>

                        @endif
                        <a href="ViewProperty/{{$Property->id}}" class="btn">view details</a>

                    </div>
                </div>
            </div>

            @endforeach



    </section>

</body>
</html>
