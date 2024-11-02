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
        background-color: skyblue;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        color: white;
        border: 2px solid greenyellow;
      }  

      td{
        color:white;
        padding: 10px;
        border: 1px solid greenyellow;
      }
      .table_center{
        display: flex;
        justify-content: center;
        align-items: center;
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

            <div class="table_center">
              <table>
                <tr>
                  <th>Customer Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Product Title</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Change Status</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->rec_address}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->product->title}}</td>
                  <td>{{$data->product->price}}</td>
                  <td>
                    <img width="150px" src="products/{{$data->product->image}}" alt="">
                  </td>
                  <td>{{$data->status}}</td>
                  <td>
                    <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                    <a class="btn btn-success" href="">Delevered</a>
                  </td>
                </tr>
                @endforeach
                
              </table>
            </div>
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>