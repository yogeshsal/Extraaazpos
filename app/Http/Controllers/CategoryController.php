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
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
        
        $data = Category ::where('restaurant_id',$restaurant_id )
        ->with('items')
        ->paginate(2);

        $location =Location::where('user_id',Auth::user()->id)->get();

        $timing = CategoryTiming::where('user_id',Auth::user()->id)->get();

        
        
        return view('catalogue.categories.index',['categories'=>$data,'location'=>$location,'timing'=>$timing, 'restaurant_id'=>$restaurant_id]);
    }

    public function store(Request $request)
    {        
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
        
        $data = new Category;
        $data->cat_name= $request->cat_name;
        $data->cat_short_name= $request->cat_short_name;
        $data->cat_handle = $request->cat_handle;
        // $data->cat_sort_category = $request->cat_sort_category;
        $data->cat_timing_group	= $request->cat_timing_group;
        $data->cat_desc= $request->cat_desc;
        $data->user_id= Auth::user()->id;
        $data->restaurant_id = $restaurant_id;       

        //dd($data);
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
    
    
    $items = Item::all();
    
    // join('categories', 'items.item_category_id', '=', 'categories.id')
    // ->select('items.*', 'categories.cat_name')
    // ->get();
    
   
    $currentUserId = Auth::user()->id;
    $data1 = User::where('id', $currentUserId)->get()->toArray();
    $restaurant_id = $data1[0]['restaurant_id'];

    $selectedItemIds = Item::where('item_category_id', $id)->pluck('id')->flatten()->toArray();
    $ids= $selectedItemIds;


    return view('catalogue.categories.select-items', compact('items','restaurant_id','ids'));
}


    public function updateItems(Request $request, $categoryid)
    {
        //dd($id);
        //dd($categoryid);
        $selectedCategoryIds = $request->input('selected_categories');
        //dd($selectedCategoryIds);
        
        
       
        if (!empty($selectedCategoryIds)) {
        Item::whereIn('id', $selectedCategoryIds)
        ->update(['item_category_id' => $categoryid]);
        }
        
        // DB::table('items')
        // ->where('id', $id)        
        // ->update([
        //     'item_category_id' => $categoryid, 
        // ]);   

         return redirect('categories');
     }

}