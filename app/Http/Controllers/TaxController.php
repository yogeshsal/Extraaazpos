<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tax;
use App\models\Category;
use App\models\Location;
use App\models\item;
use Auth;

class TaxController extends Controller
{
    
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // $data = Tax::all(); // Fetch all posts           
        $data = Tax::select('taxes.*', 'users.name as user_name')
        ->join('users', 'taxes.user_id', '=', 'users.id')
        ->get();       
        return view('catalogue.taxes.index', compact('data',));       
        
    }
    
    public function store(Request $request)
    {       
             
            $data = new Tax;        
            $data->tax_type = $request->tax_type;
            $data->tax_code = $request->tax_code;
            $data->name = $request->name;
            $data->description = $request->description;
            $data->applicable_on = $request->applicable_on;
            $data->tax_percentage = $request->tax_percentage;
            $data->applicable_modes = $request->applicable_modes;  
            $data->user_id = Auth::user()->id;           
            $data->save();            
            return redirect('taxes')
            ->with('success', 'Taxes added successfully.');        
    }

    public function edit($id)
    {        
        $currentUserId = Auth::user()->id;
        $tax = Tax::find($id);
         $items = Item::leftJoin('categories', 'items.item_category_id', '=', 'categories.id')
        ->select('items.*', 'categories.cat_name')
        ->whereJsonContains('items.tax_status', $id)
        ->get();
         return view('catalogue.taxes.edit', compact('tax','items'));
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
        
        $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->where('items.user_id', Auth::user()->id)
        ->get();

        
       return view('catalogue.taxes.select_items',compact('items'));
    }



    public function taxItems(Request $request, $id)
    {
        $selectedItemsIds = $request->input('selected_items');

        if (!empty($selectedItemsIds)) {
            // Retrieve the current tax_status values for the selected items
            $currentTaxStatus = Item::whereIn('id', $selectedItemsIds)->pluck('tax_status')->toArray();

            // Add null as the first element if it's not already present
            if (!in_array(null, $currentTaxStatus)) {
                array_unshift($currentTaxStatus, null);
            }

            // Merge the new $id into the current values and encode it as JSON
            $newTaxStatus = json_encode(array_merge($currentTaxStatus, [$id]));

            // Update the tax_status column with the new JSON array value
            Item::whereIn('id', $selectedItemsIds)->update(['tax_status' => $newTaxStatus]);
        }

        // Redirect back or return a response as needed
        return redirect('taxes');
    }

}



     