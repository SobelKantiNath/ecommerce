<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        // $category = new Category;
        // $category->category_name=$request->category;
        // $category->save();

        //From ChatGpt
        // Validate the request to ensure 'category' field is present
        // $request->validate([
        //     'category' => 'required|string|max:255',
        // ]);

        // Create a new Category instance
        $category = new Category;
        
        // Set the category_name property
        $category->category_name = $request->category;
        
        // Save the Category instance to the database
        $category->save();

        toastr()->timeout(3000)->closeButton()->addSuccess('Category added successfully');
            
        //redirect the user back to the previous page after adding a category
        return redirect('/view_category');
        // Optionally, you can return a response or redirect the user
        // return response()->json(['message' => 'Category added successfully'], 201);
    }

    // Work for delete category

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeout(3000)->closeButton()->addSuccess('Category deleted successfully');
        return redirect('/view_category');
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category (Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name= $request->category;
        $data->save();
        toastr()->timeout(3000)->closeButton()->addSuccess('Category updated successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }

    public function upload_product(Request $request )
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);//Public folder ar vitor a products name a akta folder create korva dan otar vitor store korva
            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeout(3000)->closeButton()->addSuccess('Product Uploaded successfully');
        return redirect('/add_product');
    }

    public function view_product()
    {
        $product = Product::paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);   
        }

        $data->delete();
        return redirect('/view_product');
    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product',compact('data','category'));
        
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeout(3000)->closeButton()->addSuccess('Category updated successfully');
        return redirect('/view_product');
    }

    public function search_product(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','Like','%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('product'));
    }
}