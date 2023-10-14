<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Item;
use App\Models\User;
use App\Models\Chargesitem;
use Auth;

class ChargeController extends Controller
{
    public function index()
    {
        $data = Charge::all(); 
        
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];    
        return view('catalogue.charges.index',compact('data','restaurant_id'));
    }

    public function store(Request $request)
    {
        $data = new Charge;
        $data->name = $request->name;
        $data->charge_type = $request->charge_type;
        $data->description = $request->description;
        $data->applicable_on = $request->applicable_on;
        $data->amount_per_quantity = $request->amount_per_quantity;
        $data->applicable_modes = $request->applicable_modes;
        $data->auto_apply_billing_types = $request->auto_apply_billing_types;
        $data->user_id= Auth::user()->id;
        $data->save();
        return redirect('/charges');

    }

    public function edit($id)
    {
        $Charge = Charge::find($id); 
        
        // $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        // ->select('items.*','categories.cat_name')
        // ->whereJsonContains('items.status', $id)
        // ->get();

        $charge_ids = Chargesitem::where('charge_id', $id)->pluck('item_id')->flatten()->toArray();

        $items = Item::leftJoin('categories', 'items.item_category_id', '=', 'categories.id')
        ->whereIn('items.id', $charge_ids)->get();
        
        return view('catalogue.charges.edit', compact('Charge','items'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'applicable_on' =>'required',
             'amount_per_quantity' => 'required',
             'applicable_modes'=>'required',
            
             
           
        ]);
      
        $charge = Charge::find($id);
      
        if (!$timing) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required',
            'applicable_on' =>'required',
             'amount_per_quantity' => 'required',
             'applicable_modes'=>'required',
            
           
            
        ]);
        // dd($validatedData) ;
        // Update the customer's data
        $timing->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('charges')->with('success', 'Charges updated successfully');
    }

    public function select_items($id)
    {
        
        $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->where('items.user_id', Auth::user()->id)
        ->get();

        $selectedItemIds = Chargesitem::where('charge_id', $id)->pluck('item_id')->all();

        $ids= [];
        
        if (!empty($selectedItemIds) && isset($selectedItemIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedItemIds[0];
        }
       
        
       return view('catalogue.charges.select_items',compact('items','ids'));
    }

    public function restrictItems(Request $request,$id)
    {
       
        $selectedItemsIds = $request->input('selected_items');

        $user_id = Auth::user()->id;
    
       $existingTaxitem = Chargesitem::where('charge_id', $id)
            ->where('user_id', $user_id)
            ->first();
    
        if ($existingTaxitem) {
            // If a record already exists, update the item_id
            $existingTaxitem->update(['item_id' => $selectedItemsIds]);
        } else {
            // If no record exists, create a new Taxitem record
            $newTaxitem = new Chargesitem;
            $newTaxitem->charge_id = $id;
            $newTaxitem->user_id = $user_id;
            $newTaxitem->item_id = $selectedItemsIds; // Assuming item_id is an array field
            $newTaxitem->save();
        }
        
        return redirect('charges');
    }



}