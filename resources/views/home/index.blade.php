<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  {{-- Start of hero_area --}}
  <div class="hero_area">

    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->

    <!-- slider section -->
      @include('home.slider')
    <!-- end slider section -->

  </div>
  <!-- end hero area -->

  <!-- Start of shop section -->
    @include('home.product')
  <!-- end shop section -->

  <!-- contact section -->
    @include('home.contact')
  <!-- end contact section -->

  <!-- Start of footer section -->
    @include('home.footer')
  <!-- End of footer section -->
  
</body>

</html>