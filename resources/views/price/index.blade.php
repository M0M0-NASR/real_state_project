<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search of Real Estate</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Search/search.css">

</head>

<body>

<div class="bot">
        <a href="" class="top-btn">Flat</a>

        <a href="" class="top-btn">House</a>

        <a href="" class="top-btn">Shop</a>

        <a href="" class="top-btn">warehouse</a>

        <a href="" class="top-btn">Land</a>

        <a href="" class="top-btn">villa</a>

        <a href="" class="top-btn">restaurant</a>
</div>
@isset($response)
    {{$response->price}}
@endisset
<section class="home" id="home">
    <form action="{{route('predict')}}" method="GET" >
        <h3>Predict Price with AI</h3>
        <div class="inputBox">

            <input type="number" name="housing_median_age" placeholder="House Age" id="">
            <input type="number" name="total_rooms" placeholder="number of rooms" id="">
            <input type="number" name="total_bedrooms" placeholder="number of bedrooms" id="">
            <input type="number" name="area" placeholder="Area" id="">

            <select>
                <option value="">Finished apartment</option>
                <option value="">half Finished apartment</option>
            </select>

            <input value="@isset($response->price){{$response->price}}@endisset$"
         type="text" name="area" placeholder="Predicted Price" id="" readonly>

        </div>
        <button type="submit" value="search property" class="btn">search property</button> 
    </form>
</section>

@include('PartialViews.footer')

<script src="Search/serchjs.js"></script>

</body>