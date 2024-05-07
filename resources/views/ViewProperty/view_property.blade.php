<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>View Property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset('assets/css/PropertyViewCss.css')}}">

</head>
<body>



<!-- view property section starts  -->

<section class="view-property">

   <div class="details">
      <div class="thumb">
         <div class="big-image">
            <img src="{{asset('Properties/'.$Property->Property_Image)}}" alt="">
         </div>
         <div class="small-images">
            <img src="{{asset('Properties/'.$Property->Property_Image)}}" alt="">

         </div>
      </div>
      <h3 class="name">modern flats and appartments</h3>
      <p class="location"><i class="fas fa-map-marker-alt"></i><span>{{$Property->Location}}</span></p>
      <h3 class="prise">{{$Property->Price}}</h3>
      <div class="info">
         <p><i class="fas fa-tag"></i><span>15 st</span></p>
         <p><i class="fas fa-user"></i><span>{{$Property->PropertyPublisher->User_Name}}({{$Property->PublisherType}})</span></p>
         <p><i class="fas fa-phone"></i><a href="tel:1234567890">{{$Property->Phone}}</a></p>
         <p><i class="fas fa-building"></i><span>{{$Property->PropertyType->Type_name}}</span></p>
         <p><i class="fas fa-house"></i><span>{{$Property->PropertyStatus}}</span></p>
         <p><i class="fas fa-calendar"></i><span>{{$Property->created_at}}</span></p>
      </div>
      <h3 class="title">details</h3>
      <div class="flex">
         <div class="box">
            <p><i>rooms :</i><span>2 BHK</span></p>
            <p><i>status :</i><span>ready to move</span></p>
            <p><i>bedroom :</i><span>{{$Property->Bedrooms}}</span></p>

         </div>
         <div class="box">
            <p><i>area :</i><span>{{$Property->Area}}</span></p>
            <p><i>age :</i><span>3 years</span></p>
            <p><i>bathroom :</i><span>{{$Property->Bathrooms}}</span></p>
         </div>
      </div>


      <h3 class="title">description</h3>
      <p class="description">{{$Property->Description}}</p>

   </div>
   <div class="row">

      <div class="icons">
         <img src="ViewPropertyImages/icon-2.png" alt="">
         <h3>email address</h3>
         <div class="share">
             <a href="#" class="fab fa-facebook-f"></a>
             <a href="#" class="fab fa-twitter"></a>
             <a href="#" class="fab fa-instagram"></a>
             <a href="#" class="fas fa-envelope"></a>

     </div>
      </div>


      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55251.33563963231!2d31.2934839!3d30.0595581!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1680367197322!5m2!1sar!2seg" width="750" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

</section>

<!-- view property section ends -->












<!-- footer section starts  -->



<!-- custom js file link  -->
<script src="{{asset('assets/js/ViewPropertyScript.js')}}"></script>

</body>
</html>
