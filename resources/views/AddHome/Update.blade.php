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
        @foreach ($Property as $P)
        <form action="UpdateProperty/{{$P->id}}" method="post" class="add-form" enctype="multipart/form-data">
         @csrf

         <h3 class="heading">Add Home To &nbsp; <span>Sell &nbsp;</span> or  &nbsp; <span>Rent</span></h3>



            <div class="inputBox">
                <select name="Status" id="">
                    <option value="" disabled hidden selected>Sell or Rent
                    </option>
                    <option value="Rent" @if ($P->PropertyStatus =='Rent') selected

                        @endif >For Rent</option>
                     <option value="Buy" @if ($P->PropertyStatus =='Buy') selected

                        @endif >For Sell</option>
                </select>

        <select name="PType" id="type">
         <option value="" disabled hidden selected>Type
                    </option>
            @foreach ($PropertyType as $type)
            <option name ="Type" value="{{$type->Type_ID}}" @if ($type->Type_ID == $P->TypeID)
                selected @endif>{{$type->Type_name}}</option>
        @endforeach
        </select>
                <input min="1" type="number" name="price" placeholder="Price" id="" value="{{$P->Price}}">
                <input min="1" type="number" name="bedrooms" placeholder="Bedrooms"  value="{{$P->Bedrooms}}">

                <input min="1" type="number" name="bathrooms" placeholder="Bathrooms"  value="{{$P->Bathrooms}}">
                <input min="1" type="number" name="size" placeholder="size" value="{{$P->Area}}">
                <input  type="text" name="location" placeholder="Location" value="{{$P->Location}}">

                <select name="PublisherType" id="">
                    <option value="Owner" @if($P->PublisherType =='Owner')  selected

                        @endif >Owner</option>
                    <option value="Mediator" @if ($P->PublisherType =='Mediator') selected

                        @endif>Mediator</option>

                </select>
                <input min="0" type="number" name="mobile" placeholder="Mobile"  value="{{$P->Phone}}">
                <input  type="text" name="description" placeholder="Description"  value="{{$P->Description}}">
   <input type="file" name="imageFileInput" id="AddHomeImage" class="choose-img" onchange="getImagePreview(event)"required >


            <input type="submit" value="Update" class="btnn">
            </div>

            @error('bedrooms')

            <strong>{{ $message }}</strong>

        @enderror
        @error('bathrooms')
        <strong>{{ $message }}</strong>

        @enderror
        @error('imageFileInput')
        <strong>{{ $message }}</strong>
        @enderror
        </form>
        <div id="Preview"><img src="{{asset('Properties/'.$P->Property_Image)}}" alt="Comfortable Apartment" class="w-100" width="300" height="300"></div>
    </section>

    @endforeach



<script>function getImagePreview(event) {
            var image = URL.createObjectURL(event.target.files[0]);
            var imageDiv = document.getElementById('Preview');
            var NewImage = document.createElement('img');
            imageDiv.innerHTML = '';
            NewImage.src = image;
            NewImage.width = 300;
            NewImage.Height = 300;
            imageDiv.appendChild(NewImage);
             };</script>



@include('PartialViews.footer');
</body>

</html>
