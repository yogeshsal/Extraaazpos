<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Item;
use App\models\Category;
use App\models\Location;
use Auth;

class ItemController extends Controller
{
    
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $data = Item::all(); // Fetch all posts 
        $category_id = $data[0]['category'];
        $category_name = Category::where('id', $category_id)->first();   
        
        $locid = $category_name['loc_id'];        
        $loc_name = Location::where('id', $locid)->first(); 
        
        $category_name= $category_name['name'];
        $location_name = $loc_name['name'];

        $categories = Category::pluck('name', 'id'); // Assuming 'name' is the column for category names and 'id' is the column for category IDs
        $locations = Location::where('user_id', $currentUserId)
        ->pluck('name', 'id'); // Assuming 'name' is the column for location names and 'id' is the column for location IDs
           
        return view('items.index', compact('data', 'category_name', 'locid','location_name', 'categories', 'locations'));       
        
    }
    
    public function store(Request $request)
    {
        
            $data = new Item;        
            $data->title = $request->title;
            $data->short_name = $request->short_name;
            $data->handle = $request->handle;
            $data->category = $request->category;
            $data->pos_code = $request->pos_code;
            $data->food_type = $request->food_type;
            $data->sort_order = $request->sort_order;
            $data->is_recommended = $request->is_recommended;   
            
            $data->is_packaged_good = $request->is_packaged_good;   
            $data->sell_by_weight = $request->sell_by_weight;   
            $data->default_sales_price = $request->default_sales_price;   
            $data->markup_price = $request->markup_price; 
            
            $data->aggregator_price = $request->aggregator_price; 
            $data->external_id = $request->external_id; 
            $data->description = $request->description; 
            $data->save();            
            return redirect('items')
            ->with('success', 'Item added successfully.');        
    }

    public function edit($id)
    {        
        $currentUserId = Auth::user()->id;
        $item = Item::find($id);
        $categories = Category::pluck('name', 'id');
        $locations = Location::where('user_id', $currentUserId)->pluck('name', 'id'); 
        return view('items.edit', compact('item','categories','locations'));
    }


    public function update(Request $request, $id)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            // Assuming a 10-digit mobile number
            // Add more validation rules as needed for other fields
        ]);
        $item = Item::find($id);

        if (!$item) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }

        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_name' => 'required|string|max:255',
            'handle' => 'required|string|max:255',
            'category' => 'required|string|max:255',

            // Add validation rules for other fields here
        ]);

        // Update the customer's data
        $item->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('items')->with('success', 'Item updated successfully');
    }
}



     