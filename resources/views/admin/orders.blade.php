<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    
    <style>
      table{
        border: 2px solid skyblue;
        text-align: center;
      }
      th{
        background-color: 
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

            <table>
              <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
              </tr>
              <tr>
                <td>Abc</td>
                <td>Abc</td>
                <td>Abc</td>
                <td>Abc</td>
                <td>Abc</td>
                <td>Abc</td>
              </tr>
            </table>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>