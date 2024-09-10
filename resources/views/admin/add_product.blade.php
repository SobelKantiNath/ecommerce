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

      input{
        widows: 200px;
        height: 30px;
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
              <form action="">
                <div>
                  <label>Product Title</label>
                  <input type="text" name="title" required>
                </div>
                <div>
                  <label >Description</label>
                  <textarea name="description" required></textarea>
                </div>
                <div>
                  <label>Price</label>
                  <input type="number" name="price" id="">
                </div>
                <div>
                  <label >Quantity</label>
                  <input type="number" name="quantity" id="">
                </div>
                <div>
                  <label >Product Category</label>
                  <select name="" id="">
                    <option value="">abc</option>
                  </select>
                </div>
                <div>
                  <label >Product Image</label>
                  <input type="file" name="image" id="">
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