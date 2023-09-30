<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Tax;
use App\models\Category;
use App\models\Location;
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
        // $categories = Category::pluck('name', 'id');
        // $locations = Location::where('user_id', $currentUserId)->pluck('name', 'id'); 
        return view('catalogue.taxes.edit', compact('tax'));
    }


    public function update(Request $request, $id)
    {
       
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'short_name'=> 'required|string|max:255',
        //     // Assuming a 10-digit mobile number
        //     // Add more validation rules as needed for other fields
        // ]);
        // $item = Item::find($id);

        // if (!$item) {
        //     // Handle the case when the customer with the given ID is not found
        //     abort(404);
        // }

        // // Validate the form data (customize validation rules as needed)
        // $validatedData = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'short_name' => 'required|string|max:255',
        //     'handle' => 'required|string|max:255',
        //     'category' => 'required|string|max:255',
        //     'pos_code' => 'required|string|max:255',
        //     'food_type' => 'required|string|max:255',

        //     // Add validation rules for other fields here
        // ]);

        // // Update the customer's data
        // $item->update($validatedData);

        // // Redirect to a success page or back to the edit form with a success message
        // return redirect('items')->with('success', 'Item updated successfully');
    }
}



     