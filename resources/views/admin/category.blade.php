<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.min.js" integrity="sha512-w4LAuDSf1hC+8OvGX+CKTcXpW4rQdfmdD8prHuprvKv3MPhXH9LonXX9N2y1WEl2u3ZuUSumlNYHOlxkS/XEHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
      input[type='text']
      {
          width: 400px;
          height: 40px;
      }
      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
      }
      .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid yellow;
        margin-top: 40px;
        width: 500px;
      }
      th{
        background-color: black;
        border: 2px solid rgb(55, 0, 255);
        padding: 15px;
        font-size: 20px;
        font-weight: 20px;
        color: white;
      }
      td{
        color: white;
        padding: 10px;
        border: 2px solid rgb(55, 0, 255);
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

            {{-- @include('admin.body') --}}
            <h1 style="color: white">Add Category</h1>
            <div>
              <form action="add_category" method="post">
                @csrf
              <div class="div_deg">
                <input type="text" name="category">
                <input class="btn btn-primary " type="submit" value="Add Category">
              </div>
            </form>
            </div>
            
            {{-- Category Show from category table --}}
            <div>
              <table class="table_deg">
                <tr>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach ($data as $data )
                     <tr> 
                      <td>{{$data->category_name}}</td>
                      <td>
                        <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                      </td>
                      <td>
                        <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
                      </td>
                    </tr>
                    
                @endforeach
               
              </table>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    {{-- Cdn link file for sweet message --}}
    <script type="text/javascript">

      function confirmation(ev)
      {
        ev.preventDefault();//jokhon delete button a click kora hova thokon ati reloading or refresshing off rakva
        var urlToRedirect = ev.currentTarget.getAttribute('href');//href link ta nawar jonno
        //console.log(urlToRedirect);//Console a print korar jonno

        swal.fire({  //sweet alert built in function
          title: "Are You Sure to Delete This?",
          text: "This delete will be parmanent",
          icon: "warning",
          showCancelButton: true,
          dangerMode:true,
          position: "center"
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, keep it',
          
        }).then((result)=>{
          if(result.isConfirmed){
            window.location.href=urlToRedirect;//Cancel button a click korla delte hova na and aghar window ta thakva
          }
        });
        }

    </script>
    

    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>