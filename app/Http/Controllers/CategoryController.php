<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use App\Models\Item;
use App\Models\CategoryTiming;
use App\models\User;
use Auth;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category ::where('user_id', Auth::user()->id)
        ->with('items')
        ->paginate(20);

        $location =Location::where('user_id',Auth::user()->id)->get();

        $timing = CategoryTiming::where('user_id',Auth::user()->id)->get();

        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
        
        return view('catalogue.categories.index',['categories'=>$data,'location'=>$location,'timing'=>$timing, 'restaurant_id'=>$restaurant_id]);
    }

    public function store(Request $request)
    {        
        $data = new Category;
        $data->cat_name= $request->cat_name;
        $data->cat_short_name= $request->cat_short_name;
        $data->cat_handle = $request->cat_handle;
        // $data->cat_sort_category = $request->cat_sort_category;
        $data->cat_timing_group	= $request->cat_timing_group;
        $data->cat_desc= $request->cat_desc;
        $data->user_id= Auth::user()->id;
       
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
        
        $items = Item::join('categories', 'items.item_category_id', '=', 'categories.id')
        ->select('items.*', 'categories.cat_name')
        ->where('categories.id', $id)
        ->paginate(2); 
        $itemCount = $items->total();   
        
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
        return view('catalogue.categories.edit', compact('category','categories', 'category_desc','timing','items','itemCount','restaurant_id'));
    }

    public function catupdate(Request $request, $id)
    {        
        //dd("hello");
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
 




public function showitems($id){  
    
      
    $items = Item::join('categories', 'items.item_category_id', '=', 'categories.id')
    ->select('items.*', 'categories.cat_name')
    ->get();
   
    $currentUserId = Auth::user()->id;
    $data1 = User::where('id', $currentUserId)->get()->toArray();
    $restaurant_id = $data1[0]['restaurant_id'];

    $selectedItemIds = Item::where('item_category_id', $id)->pluck('id')->flatten()->toArray();
    $ids= $selectedItemIds;


    return view('catalogue.categories.select-items', compact('items','restaurant_id','ids'));
}


    public function updateItems(Request $request, $categoryid)
    {
        $selectedCategoryIds = $request->input('selected_categories');
        $itemId = Item::where('item_category_id', $categoryid)->pluck('id')->toArray();
    
        $commonValues = array_intersect($itemId, $selectedCategoryIds);
        $notInCommonValues = array_diff($itemId, $selectedCategoryIds);
    
        if (!empty($commonValues)) {
            Item::whereIn('id', $commonValues)->update(['item_category_id' => $categoryid]);
        }
    
        if (!empty($notInCommonValues)) {
            Item::whereIn('id', $notInCommonValues)->update(['item_category_id' => null]);
        }
    
        return redirect('categories');


        
        
        // if (empty($selectedCategoryIds)) {
        //     // If $selectedCategoryIds is empty, set the column to null for all relevant records.
        //     Item::query()->update(['item_category_id' => null]);
        // } else {
        //     // If $selectedCategoryIds is not empty, update the records with the specified IDs.
            // Item::whereIn('id', $selectedCategoryIds)
            //     ->update(['item_category_id' => $categoryid]);
        // }
        

         return redirect('categories');
     }

}