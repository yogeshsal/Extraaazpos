<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use App\Models\Category;
use App\Models\Location;
use App\Models\item;
use App\Models\Taxitem;
use App\Models\User;

use Auth;

class TaxController extends Controller
{
    
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 
        
        $data = Tax::select('taxes.*', 'users.name as user_name')
        ->join('users', 'taxes.user_id', '=', 'users.id')
        ->where('taxes.restaurant_id',$restaurant_id)
        ->get();
        return view('catalogue.taxes.index', compact('data', 'restaurant_id'));       
        
    }
    
    public function store(Request $request)
    {       
            
            $currentUserId = Auth::user()->id;
            $data1 = User::where('id', $currentUserId)->get()->toArray();
            $restaurant_id = $data1[0]['restaurant_id']; 
            
            $data = new Tax;        
            $data->tax_type = $request->tax_type;
            $data->tax_code = $request->tax_code;
            $data->name = $request->name;
            $data->description = $request->description;
            $data->applicable_on = $request->applicable_on;
            $data->tax_percentage = $request->tax_percentage;
            $data->applicable_modes = $request->applicable_modes;  
            $data->user_id= Auth::user()->id;
            $data->restaurant_id = $restaurant_id;          
            $data->save();            
            return redirect('taxes')
            ->with('success', 'Taxes added successfully.');        
    }

    public function edit($id)
    {        
        $currentUserId = Auth::user()->id;
        $tax = Tax::find($id);
      
       
        $item_ids = Taxitem::where('tax_id', $id)->pluck('item_id')->flatten()->toArray();

        $items = Item::leftJoin('categories', 'items.item_category_id', '=', 'categories.id')
        ->whereIn('items.id', $item_ids)->get();
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];    
        return view('catalogue.taxes.edit', compact('tax','items','restaurant_id'));       
        
    }


    public function update(Request $request, $id)
    {
         $request->validate([
             'name' => 'required',
             'tax_percentage' =>'required',
            ]);
      
        $tax = Tax::find($id);
      
        if (!$tax) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required',
             'tax_percentage' =>'required',
        ]);
        // dd($validatedData) ;
        // Update the customer's data
        $tax->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('taxes')->with('success', 'tax updated successfully');
    }


    public function select_items($id)
    {
        $items = Item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->where('items.user_id', Auth::user()->id)
        ->get();
        
        $ids =[];
        $selectedItemIds = Taxitem::where('tax_id', $id)->pluck('item_id')->all();
        if (!empty($selectedItemIds) && isset($selectedItemIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedItemIds[0];
        }
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];    
        return view('catalogue.taxes.select_items',compact('items','ids','restaurant_id'));       
        
    }


    public function taxItems(Request $request, $id)
    {
    
    $selectedItemsIds = $request->input('selected_items');

    $user_id = Auth::user()->id;

   $existingTaxitem = Taxitem::where('tax_id', $id)
        ->where('user_id', $user_id)
        ->first();

    if ($existingTaxitem) {
        // If a record already exists, update the item_id
        $existingTaxitem->update(['item_id' => $selectedItemsIds]);
    } else {
        // If no record exists, create a new Taxitem record
        $newTaxitem = new Taxitem;
        $newTaxitem->tax_id = $id;
        $newTaxitem->user_id = $user_id;
        $newTaxitem->item_id = $selectedItemsIds; // Assuming item_id is an array field
        $newTaxitem->save();
    }
    
    return redirect('taxes');

    }



}



     