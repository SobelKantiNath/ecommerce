<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style type="text/css">

    .div_center
    {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .details_box
    {
      padding: 15px;
    }
  </style>
</head>

<body>
  {{-- Start of hero_area --}}
  <div class="hero_area">

    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->

    <!-- slider section -->
      {{-- @include('home.slider') --}}
    <!-- end slider section -->

  </div>
  
{{-- Product Details start--}}

<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row"> 
        <div class="col-md-12">
          <div class="box">
            
              <div class="div_center">
                <img width="300px" src="/products/{{$data->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>Title : {{$data->title}}</h6>
                <h6>Price : 
                  <span>{{$data->price}}</span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category : {{$data->category}}</h6>
                <h6>Available Quantity :
                  <span>{{$data->quantity}}</span>
                </h6>
              </div>

              <div class="detail-box">
                  <p>{{$data->description}}</p>
                </h6>
              </div>

           </div>
          </div>
        </div>
      </div>
    </div>
  </section>
{{-- Product Details end--}}

  <!-- Start of footer section -->
    @include('home.footer')
  <!-- End of footer section -->
  
</body>

</html>