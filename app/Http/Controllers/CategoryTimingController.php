<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTiming;
use App\Models\Category;
use App\Models\Location;
use App\Models\Item;
use App\models\User;
use Auth;
use DB;

class CategoryTimingController extends Controller
{
    public function index()
    {
        $data = CategoryTiming ::leftJoin('users','users.id','=','category_timings.user_id')
        ->select('users.name as username','category_timings.*')
        ->where('category_timings.user_id',Auth::user()->id)
        ->paginate(20);

        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
        return view('catalogue.categoryTiming.index',['time'=>$data, 'restaurant_id'=>$restaurant_id]);
    }

    function addCategoryTiming(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'handle' => 'string',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'days' => 'required|array', // Validate 'days' as an array
        ]);

        // Get the currently authenticated user's ID
        $userId = Auth::id();
        $daysJson = json_encode($validatedData['days']);

        // Create a new CategoryTiming instance and save it
        $categoryTiming = CategoryTiming::create([
            'name' => $validatedData['name'],
            'handle' => $validatedData['handle'],
            'description' => $validatedData['description'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'days' => $daysJson,
            'user_id' => $userId,
        ]);

        return redirect('category-timing');
    }


    public function edit($id)
    {       
       
        $currentUserId = Auth::user()->id;
        $timing = CategoryTiming::find($id);  
       // dd($timing);      
        $locations = Location::where('user_id', $currentUserId)->pluck('name', 'id'); 

        $categories = Category::where('cat_timing_group', $id)->get();
        
        
        $categories1 = Category::where('id', $id)->get()->toArray();
        // $cat_parent_cat = $categories1[0]['cat_parent_category'];
        
        if (!empty($categories1) && isset($categories1[0]['cat_parent_category'])) {
            $cat_parent_cat = $categories1[0]['cat_parent_category'];
        }




        // Initialize an array to store category names
        $categoryNames = [];
        
        if (!empty($cat_parent_cat)) {
            $categories2 = Category::where('id', $cat_parent_cat)->get()->toArray();
            if (!empty($categories2)) {
                // Loop through the result and collect category names
                foreach ($categories2 as $category) {
                    $categoryNames[] = $category['cat_name'];
                }
            }
        }
        
        // Now, $categoryNames contains the names of rows
        

        //dd($categoryNames); 
        $itemCounts = [];
        
        foreach ($categories as $category) {
            $cat_id = $category->id; // Get the category ID
            $item_count = Item::where('user_id', Auth::user()->id)
                              ->where('item_category_id', $cat_id)
                              ->count();
       
            $itemCounts[$cat_id] = $item_count;
        }

        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];

        return view('catalogue.categoryTiming.edit', compact('timing','categories','locations','itemCounts' ,'restaurant_id'),['categoryNames' => $categoryNames]);
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
             'handle' => 'required|string|max:255',                  
             'description' => 'required',
             'start_time' =>'required',
             'end_time' => 'required',
             'days'=>'required'
           
        ]);
      
        $timing = CategoryTiming::find($id);
      
        if (!$timing) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
             'handle' => 'required|string|max:255',            
             'description' => 'required',       
             'start_time' => 'required',
             'end_time' =>'required',
             'days'=>'required'
           
            
        ]);
        // dd($validatedData) ;
        // Update the customer's data
        $timing->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('category-timing')->with('success', 'category timing updated successfully');
    }


    public function select_category($id)
    {
        
        $categories = Category::leftjoin('category_timings','category_timings.id','=','categories.cat_timing_group')
        ->select('categories.*','category_timings.name')
        ->where('categories.user_id', Auth::user()->id)
        ->get();

        // $categories = Category::where('categories.user_id', Auth::user()->id)
        // ->get();

        $itemCounts = [];
        
        foreach ($categories as $category) {
            $cat_id = $category->id; // Get the category ID
            $item_count = Item::where('user_id', Auth::user()->id)
                              ->where('item_category_id', $cat_id)
                              ->count();
       
            $itemCounts[$cat_id] = $item_count;
        }
        //dd($itemCounts);
        
       return view('catalogue.categoryTiming.select_category', compact('categories', 'itemCounts'));
    }

    public function associateCategories(Request $request,$id)
    {
       
       //dd($id);
       
        // dd($selectedCategoryIds);
        // Get the selected category IDs from the request
        $selectedCategoryIds = $request->input('selected_categories');
   
        if (!empty($selectedCategoryIds)) {
            Category::whereIn('id', $selectedCategoryIds)
                ->update(['cat_timing_group' => $id]); // Update the 'associated' column to true
        }

        // Redirect back or return a response as needed
        
        return redirect('category-timing')->with('success', 'Categories associated successfully');
    }













}