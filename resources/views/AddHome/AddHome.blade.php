@include('PartialViews.Navbar');
  <!--
        - #Add Home
      -->
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Add Home To Sell or Rent</title>

          <!-- font awesome cdn link  -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

          <!-- custom css file link  -->
          <link rel="stylesheet" href="Properties/addhome.css">

      </head>
      <section class="home" id="home">

        <form action="StoreProperty" method="post" class="add-form" enctype="multipart/form-data">
         @csrf
         <h3 class="heading">Add Home To &nbsp; <span>Sell &nbsp;</span> or  &nbsp; <span>Rent</span></h3>



            <div class="inputBox">
                <select name="Status" id="" required>
                    <option value="" disabled hidden selected >Sell or Rent
                    </option>
                    <option value="Rent" >For Rent</option>
                     <option value="Buy" >For Sell</option>
                </select>

        <select name="PType" id="type" required>
         <option value="" disabled hidden selected>Type
                    </option>
            @foreach ($PropertyType as $type)
            <option name ="Type" value="{{$type->Type_ID}}">{{$type->Type_name}}</option>
        @endforeach
        </select>
                <input min="1" type="number" name="price" placeholder="Price" id="">

                <input min="1" type="number" name="bedrooms" placeholder="Bedrooms" id="">


                <input min="1" type="number" name="bathrooms" placeholder="Bathrooms" id="">

                <input min="1" type="number" name="size" placeholder="size" id="">

                <input  type="text" name="location" placeholder="Location" id="">

                <select name="PublisherType" id="">
                    <option value="Owner" >Owner</option>
                    <option value="Mediator">Mediator</option>

                </select>
                <input min="0" type="number" name="mobile" placeholder="Mobile">
                <input  type="text" name="description" placeholder="Description" id="">
   <input type="file" name="imageFileInput" id="AddHomeImage" class="choose-img" onchange="getImagePreview(event)" >

            <input type="submit" value="add home" class="btnn">
            </div>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('bedrooms')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('bathrooms')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
    </span>
    @enderror
        @error('size')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('imageFileInput')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
        @enderror

            <div id="Preview"></div>

        </form>

    </section>






<script>function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imageDiv = document.getElementById('Preview');
            var NewImage = document.createElement('img');
            imageDiv.innerHTML = '';
            NewImage.src = image;
            NewImage.width = 200;
            NewImage.Height = 200;
            imageDiv.appendChild(NewImage);
             };</script>




@include('PartialViews.footer');
</body>

</html>
