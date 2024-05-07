@foreach ($Property as $P)


<div class="property-card" >

  <figure class="card-banner">

    <a href="#">
      <img src="{{asset('Properties/'.$P->Property_Image)}}" alt="Comfortable Apartment" class="w-100">
    </a>


    <div class="card-badge green">For Rent</div>


    <div class="banner-actions">

      <button class="banner-actions-btn">
        <ion-icon name="location"></ion-icon>

        <address>{{$P->Location}}</address>
      </button>

      <button class="banner-actions-btn">
        <ion-icon name="camera"></ion-icon>

        <span>4</span>
      </button>

      <button class="banner-actions-btn">
        <ion-icon name="film"></ion-icon>

        <span>2</span>
      </button>

    </div>

  </figure>

  <div class="card-content">

    <div class="card-price">
      <strong>{{$P->Price}} $</strong>/Month
    </div>

    <h3 class="h3 card-title">
      <a href="#">{{$P->PropertyType->Type_name}}</a>
    </h3>

    <p class="card-text">
      Beautiful Huge 1 Family House In Heart Of Westbury.
    </p>

    <ul class="card-list">

      <li class="card-item">
        <strong>{{$P->Bedrooms}}</strong>

        <ion-icon name="bed-outline"></ion-icon>

        <span>Bedrooms</span>
      </li>

      <li class="card-item">
        <strong>{{$P->Bathrooms}}</strong>

        <ion-icon name="man-outline"></ion-icon>

        <span>Bathrooms</span>
      </li>

      <li class="card-item">
        <strong>{{$P->Area}}</strong>

        <ion-icon name="square-outline"></ion-icon>

        <span>Square Ft</span>
      </li>

    </ul>

  </div>

  <div class="card-footer">

    <div class="card-author">

      <figure class="author-avatar">
        <img src="./assets/images/author.jpg" alt="William Seklo" class="w-100">
      </figure>

      <div>
        <p class="author-name">
          <a href="#">{{$P->PropertyPublisher->User_Name}}</a>
        </p>

        <p class="author-title">{{$P->PublisherType}}</p>
      </div>

    </div>

    <div class="card-footer-actions">

      <button class="card-footer-actions-btn">
        <ion-icon name="resize-outline"></ion-icon>
      </button>

      <button class="card-footer-actions-btn">
        <ion-icon name="heart-outline"></ion-icon>
      </button>

      <button class="card-footer-actions-btn">
        <ion-icon name="add-circle-outline"></ion-icon>
      </button>

    </div>

  </div>

</div>
</li>
<li>
@endforeach
