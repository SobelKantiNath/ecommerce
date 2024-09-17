<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      .div_deg{
        display: flex;
        justify-content: center;
        align-items: center;

      }
      label{
        display: inline-block;
        width: 200px;
        padding: 20px;
      }
      input{
        width: 300px;
        height: 30px;
      }
      textarea{
        width: 300px;
        height: 30px;
      }
      #category{
        width: 300px;
        height: 30px;
      }
      #submit{
        width: 150px;
        height: 40px;
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

            <h2>Update Product</h2>
            <div class="div_deg">

              <form action="{{url('update_product', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div>
                  <label for="">Title</label>
                  <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                  <label for="">Description</label>
                  <textarea name="description" id="" cols="30" rows="5" value="">{{$data->description}}</textarea>
                </div>

                <div>
                  <label for="">Price</label>
                  <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div>
                  <label for="">Quantity</label>
                  <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>

                <div>
                  <label for="">Category</label>
                  <select name="category" id="category">
                    <option value="{{$data->category}}">{{$data->category}}</option>

                    @foreach ($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                    @endforeach

                  </select>
                </div>

                <div>
                  <label for="">Current Image</label>
                  <img src="/products/{{$data->image}}" height="100px" width="100px" alt="">
                </div>

                <div>
                  <label for="">New Image</label>
                  <input type="file" name="image">
                </div>

                <div>
                  <input class="btn btn-success" type="submit" value="Update Product" id="submit">
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