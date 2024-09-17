<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      
      .div_deg{
        display: flex;
        justify-content: center;
        align-content: center;
        margin-top: 60px;
      }
      .table_deg{
        border: 2px solid greenyellow;
      }
      th{
        background-color: rgb(26, 102, 32);
        justify-content: center;
        align-content: center;
        color: white;
        font-size: 15px;
        font-weight: bold;
        padding: 10px;
        border: 2px solid greenyellow;
      }
      td{
        border: 1px solid greenyellow;
        background-color: black;
        text-align: center;
        color: white;
        padding: 10px;
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
            <div class="div_deg">
              <table class="table_deg">
                <tr>
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>  
                  <th>Edit</th> 
                  <th>Delete</th>       
                </tr>
                {{-- //Pagination ar jonno variables duita different vava likah --}}
                @foreach ($product as $products)
                  <tr>
                    <td>{{$products->title}}</td>
                    <td>{!!Str::limit($products->description,100)!!}</td>
                    {{-- koto toko description show korva ta limit korar jonno ai code --}}
                    <td>{{$products->category}}</td>
                    <td>{{$products->price}}</td>
                    <td>{{$products->quantity}}</td>
                    <td>
                      <img height="100px" width="150px" src="products/{{$products->image}}" alt="">
                    </td>
                    <td>
                      <a class="btn btn-success" href="{{url('edit_product',$products->id)}}">Edit</a>
                    </td>
                    <td>
                      <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </table>
            
            </div>
            <div class="div_deg">
               {{-- {{$product->links()}}  sokol page show korta caila ai code--}}
               {{-- sokol page show korta na caila nichar code --}}
               {{$product->onEachSide(1)->links()}}

            </div>
           
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
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
    @include('admin.js')
  </body>
</html>