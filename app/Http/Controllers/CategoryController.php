<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\CategoryTiming;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category ::where('user_id',Auth::user()->id)->get();
        

        $location =Location::where('user_id',Auth::user()->id)->get();

        $timing = CategoryTiming::where('user_id',Auth::user()->id)->get();
        
        return view('catalogue.categories.index',['category'=>$data,'location'=>$location,'timing'=>$timing]);
    }

    public function store(Request $request)
    {
        $data = new Category;
        $data->cat_name= $request->cat_name;
        $data->cat_short_name= $request->cat_short_name;
        $data->cat_handle = $request->cat_handle;
        $data->cat_timing_group	= $request->cat_timing_group;
        $data->cat_desc= $request->cat_desc;
        $data->user_id= auth::user()->id;
       
        // if (is_array($request->loc_id)) {
        //     $data->loc_id = implode(',', $request->loc_id); // Convert array to comma-separated string
        // } else {
        //     $data->loc_id = $request->loc_id; // Use the value as-is if it's not an array
        // }

        $data->save();
        return redirect('categories');
    }

    public function edit($id)    {    
        
        $currentUserId = Auth::user()->id;
        $category = Category::find($id);
        $categories = Category::all();
        $timing = CategoryTiming::where('user_id',Auth::user()->id)->get();;
        $category_desc = $category['cat_desc'];
        // $categories = Category::pluck('item_name', 'id');
        // $locations = Location::where('user_id', $currentUserId)->pluck('item_name', 'id'); 
        return view('catalogue.categories.edit', compact('category','categories', 'category_desc','timing'));
    }

    public function catupdate(Request $request, $id)
    {        
        
        $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_short_name' => 'required|string|max:255',
            'cat_handle' => 'required|string|max:255',            
            'cat_timing_group' => 'required|string|max:255',
            'cat_parent_category' =>'string|max:255',
            'cat_kot_type' => 'string|max:255',
            'cat_desc' => 'string|max:255',
        ]);
        $category = Category::find($id);

        if (!$category) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'cat_name' => 'required|string|max:255',
            'cat_short_name' => 'required|string|max:255',            
            'cat_handle' => 'required|string|max:255',       
            'cat_timing_group' => 'required|string|max:255',
            'cat_parent_category' =>'string|max:255',
            'cat_kot_type' => 'string|max:255',
            'cat_desc' => 'string|max:255',
        ]);
         //dd($validatedData) ;
        // Update the customer's data
        $category->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('categories')->with('success', 'category updated successfully');
    }


    public function updateImage(Request $request, $id)
{       
    $request->validate([
        'cat_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define validation rules for the image file.
    ]);

    $category = Category::find($id);

    if (!$category) {
        abort(404); // Handle the case when the category with the given ID is not found.
    }

    // Handle image upload and update
    if ($request->hasFile('cat_image')) {
        $image = $request->file('cat_image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/cat_images', $imageName); // Store the image in a directory, e.g., 'public/storage/cat_images'

        // Update the category's image field in the database with the new image path
        $category->update(['cat_image' => 'cat_images/'.$imageName]);
    }

    return redirect()->route('categories.edit', $id)->with('success', 'Image updated successfully');
}
 







}
