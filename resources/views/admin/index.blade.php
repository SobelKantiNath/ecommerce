<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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

            @include('admin.body')

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>