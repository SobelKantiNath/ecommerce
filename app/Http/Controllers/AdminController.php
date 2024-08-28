<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
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

        toastr()->timeout(3000)->closeButton()->addWarning('Category added successfully');
            
        //redirect the user back to the previous page after adding a category
        return redirect()->back();
        // Optionally, you can return a response or redirect the user
        // return response()->json(['message' => 'Category added successfully'], 201);
    }

    // Work for delete category

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeout(3000)->closeButton()->addSuccess('Category deleted successfully');
        return redirect()->back();
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
        return view('admin.add_product');
    }
}