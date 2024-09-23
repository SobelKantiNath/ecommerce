<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_deg
    {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }

    table
    {
      border: 2px solid black;
      text-align: center;
      width: 800px;
    }
    th{
      border: 2px solid black;
      text-align: center;
      color: white;
      font: 20px;
      font-weight: bold;
      background-color:blue;
    }
    td
    {
      border: 1px solid skyblue;
    }
    .cart_value
    {
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }
    
    .order_deg
    {
      padding-right: 100px;
      margin-top: -200px;
    }

    label
    {
      display: inline-block;
      widows: 150px;
    }

    .div_gap
    {
      padding: 20px;
    }
  </style>
</head>

<body>
  {{-- Start of hero_area --}}
  <div class="hero_area">

    <!-- header section strats -->
      @include('home.header')
    <!-- end header section -->

    <div class = div_deg>

      <div class="order_deg">
        <form action="{{url('confirm_order')}}" method="post">
          @csfr
          <div class="div_gap">
            <label for="">Receiver Name :</label>
            <input type="text" name="name" id="" value="{{Auth::user()->name}}">
          </div>
          <div class="div_gap">
            <label for="">Receiver Address :</label>
            <textarea name="address" id="" cols="30" rows="5">{{Auth::user()->address}}</textarea>
          </div>
          <div class="div_gap">
            <label for="">Receiver Phone :</label>
            <input type="text" name="phone" id="" value="{{Auth::user()->phone}}">
          </div>
          <div class="div_gap">
            <input class="btn btn-primary" type="submit" value="Place Order">
          </div>
        </form>
      </div>

      <table>
        <tr>
          <th>Product Title</th>
          <th>Price</th>
          <th>Image</th>
        </tr>

        <?php
          $value = 0;
        ?>

        @foreach ($cart as $cart)
        <tr>
          <td>{{$cart->product->title}}</td>
          <td>{{$cart->product->price}}</td>
          <td>
            <img width="150px" height="150px" src="/products/{{$cart->product->image}}" alt="">
          </td>
        </tr>

          <?php
            $value = $value + $cart->product->price;
          ?>

        @endforeach
        
      </table>
    </div>

    <div class="cart_value">
      <h3>Total value of Cart is : ${{$value}}</h3>
    </div>
    {{-- @foreach ($cart as $cart)
          {{$cart->user_id}}
          <h1>{{$cart->product_id}}</h1>
          <h1>{{$cart->product->title}}</h1>
          <h1>{{$cart->user->name}}</h1>

    @endforeach --}}

  <!-- Start of footer section -->
    @include('home.footer')
  <!-- End of footer section -->
  
</body>

</html>