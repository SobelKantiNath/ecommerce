<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      .div_deg
      {
        display:flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
      }

      input[type='text']
      {
        widows: 400px;
        height: 40px;
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

            <h1 style="color: white">Update Category</h1>
            <div class="div_deg">
               <form action="{{url('update_category', $data->id)}}" method="post">
                @csrf

              <input type="text" name="category" value="{{$data->category_name}}">
              <input class="btn btn-secondary" type="submit" value="Update Category">
            </form>
            </div>
           

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>