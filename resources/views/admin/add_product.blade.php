<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .div_deg
      {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
      }
      h1{
        color: white;
      }
      label{
        display: inline-block;
        width: 250px;
        font-size: 20px!important;
        color: white!important;
      }
      input[type='text']{
        widows: 200px;
        height: 30px;
      }
      textarea
      {
        width: 200px;
        height: 50px;
      }
      .input_deg
      {
        padding: 15px;
      }
    </style>
  </head>
  <body>
    
    {{-- Start of header work --}}
      @include('admin.header')
    {{-- End of header work --}}
      
    {{-- Start of Sidebar Navigation Work --}}
      @include('admin.sidebar')
    {{-- End of Sidebar Navigation Work --}}

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h1>Add Product</h1>
            <div class = div_deg>
              <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                  <label>Product Title</label>
                  <input type="text" name="title" required>
                </div>
                <div class="input_deg">
                  <label >Description</label>
                  <textarea name="description" required></textarea>
                </div>
                <div class="input_deg">
                  <label>Price</label>
                  <input type="number" name="price" id="">
                </div>
                <div class="input_deg">
                  <label >Quantity</label>
                  <input type="number" name="quantity" id="">
                </div>
                <div class="input_deg">
                  <label >Product Category</label>
                  <select name="category" required id="">

                    <option value="">Select a Option</option>
                    @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="input_deg">
                  <label >Product Image</label>
                  <input type="file" name="image" id="">
                </div>
                <div class="input_deg">
                  <input class="btn btn-success" type="submit" value="Add Product">
                </div>
              </form>
            </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>