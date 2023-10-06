<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\Item;

use Auth;
class ChargeController extends Controller
{
    public function index()
    {
        $data = Charge::all(); 
        return view('catalogue.charges.index',compact('data'));
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
        
        $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->whereJsonContains('items.status', $id)
        ->get();
        
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

        
       return view('catalogue.charges.select_items',compact('items'));
    }

    public function restrictItems(Request $request,$id)
    {
       
        $selectedItemsIds = $request->input('selected_items');

        if (!empty($selectedItemsIds)) {
            // Retrieve the current tax_status values for the selected items
            $currentTaxStatus = Item::whereIn('id', $selectedItemsIds)->pluck('status')->toArray();

            // Add null as the first element if it's not already present
            if (!in_array(null, $currentTaxStatus)) {
                array_unshift($currentTaxStatus, null);
            }

            // Merge the new $id into the current values and encode it as JSON
            $newTaxStatus = json_encode(array_merge($currentTaxStatus, [$id]));

            // Update the tax_status column with the new JSON array value
            Item::whereIn('id', $selectedItemsIds)->update(['status' => $newTaxStatus]);
        }
        
        return redirect('charges');
    }



}
