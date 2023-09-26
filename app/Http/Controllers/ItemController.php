<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Item;
use App\models\Category;
use App\models\Location;

class ItemController extends Controller
{
    
    public function index()
    {
        $data = Item::all(); // Fetch all posts 
        $category_id = $data[0]['category'];
        $category_name = Category::where('id', $category_id)->first();   
        
        $locid = $category_name['loc_id'];
        $loc_name = Location::where('id', $locid)->first(); 
        
        $category_name= $category_name['name'];
        $location_name = $loc_name['name'];
        return view('items.index', compact('data', 'category_name', 'location_name'));       
        
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
}



     