
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

    <section class="home" id="home">

        <form action="SearchInProperties" method="Post">
            @csrf
            <h3>find your perfect home</h3>



             <div class="inputBox">
                <input type="search" name="" placeholder="neighborhood" id="">
                <input type="search" name="Location" placeholder="city" id="">
                <select name="MinPrice" id="">
                    <option value="" disabled hidden selected>minimum price</option>
                    <option value="1000">$1000</option>
                    <option value="5000">$5000</option>
                    <option value="10000">$10000</option>
                    <option value="15000">$15000</option>
                    <option value="20000">$20000</option>
                    <option value="25000">$25000</option>

                </select>
                <select name="MaxPrice" id="">
                    <option value="" disabled hidden selected>maximum price</option>
                    <option value="30000">$30000</option>
                    <option value="35000">$35000</option>
                    <option value="40000">$40000</option>
                    <option value="45000">$45000</option>
                    <option value="50000">$50000</option>
                    <option value="100000">$100000</option>
                    <option value=200000>$200000</option>
                    <option value="300000">$300000</option>
                    <option value="400000">$400000</option>
                    <option value="500000">$500000</option>
                    <option value="500000">$1000000</option>
                </select>
                <select name="PropertyStatus" id="" required>
                    <option value="" disabled hidden selected >property status</option>
                    <option value="Rent">Rent</option>
                    <option value="Buy">Buy</option>
                </select>
                <select name="PropertyType" id="">
                    <option value="">All</option>
                    @foreach ($PropertyType as $type)
                    <option value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
                    @endforeach
                </select>
                <select name="" id="">
                    <option value="" disabled hidden selected>BHK</option>
                    <option value="1 BHK">1 BHK</option>
                    <option value="2 BHK">2 BHK</option>
                    <option value="3 BHK">3 BHK</option>
                    <option value="4 BHK">4 BHK</option>
                    <option value="5 BHK">5 BHK</option>
                </select>
                <select name="" id="">
                    <option value="" disabled hidden selected>aminities</option>
                    <option value="parking space">parking space</option>
                    <option value="swimming pool">swimming pool</option>
                    <option value="playground">playground</option>
                    <option value="security">security</option>
                    <option value="all">all</option>
                </select>
                <select name="Bedrooms" id="">
                    <option value="" name ="" disabled hidden selected>bedrooms</option>
                    <option value="1">1 bedroom</option>
                    <option value="2">2 bedroom</option>
                    <option value="3">3 bedroom</option>
                    <option value="4">4 bedroom</option>
                    <option value="5">5 bedroom</option>
                    <option value="6">6 bedroom</option>
                    <option value="7">7 bedroom</option>
                    <option value="8">8 bedroom</option>
                    <option value="9">9 bedroom</option>
                </select>
                <select name="Bathrooms" id="">
                    <option value="" name = ""disabled hidden selected>bathrooms</option>
                    <option value="1">1 bathroom</option>
                    <option value="2">2 bathroom</option>
                    <option value="3">3 bedroom</option>
                    <option value="4">4 bathroom</option>
                    <option value="5">5 bathroom</option>
                    <option value="6">6 bathroom</option>
                    <option value="7">7 bathroom</option>
                    <option value="8">8 bathroom</option>
                    <option value="9">9 bathroom</option>
                </select>
            </div>

            <button type="submit" value="search property" class="btn">search property</button>

        </form>

    </section>
    @include('PartialViews.footer')

    <script src="Search/serchjs.js"></script>

</body>
</html>
