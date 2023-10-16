<?php

namespace App\Http\Controllers;
use App\models\Discount;
use App\models\User;
use Auth;

use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $data = Discount::all(); 
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 

        
             
        return view('catalogue.discounts.index',['data'=>$data, 'restaurant_id'=>$restaurant_id]);        
    }

    public function add_discount(Request $request)
    {

        $data = new Discount;
        $data->discount_name = $request->discount_name;
        $data->applicable_on = $request->applicable_on;
        $data->discount_type = $request->discount_type;
        $data->discount_value = $request->discount_value;
        $data->desc = $request->desc;
        $data->max_discount_value = $request->max_discount_value;
        $data->min_total_amount = $request->min_total_amount;
        $data->auto_apply_billing_type = $request->auto_apply_billing_type;
        $data->user_role = $request->user_role; 
        $data->restaurant_id = $request->restaurant_id;             
       
        $data->save();
        return redirect('discounts');

    }
    public function edit($id)
    {
        // Find the discount record by ID
        $discount = Discount::find($id);
    
        // Check if the discount record exists
        if (!$discount) {
            // You can customize this logic for handling a non-existent discount
            return redirect()->route('discounts.index')->with('error', 'Discount not found.');
        }

        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
    
        // Load the edit view and pass the discount data to it
        return view('catalogue.discounts.edit', compact('discount','restaurant_id'));
    }
    
    public function update(Request $request, $id)
    {
        // Find the discount record by ID
        $discount = Discount::find($id);

        // Check if the discount record exists
        if (!$discount) {
            return redirect()->route('discounts.index')->with('error', 'Discount not found.');
        }

        // Update the discount record with the new values from the form
        $discount->discount_name = $request->input('discount_name');
        $discount->applicable_on = $request->input('applicable_on');
        $discount->discount_type = $request->input('discount_type');
        $discount->discount_value = $request->input('discount_value');
        $discount->desc = $request->input('desc');
        $discount->max_discount_value = $request->input('max_discount_value');
        $discount->min_total_amount = $request->input('min_total_amount');
        $discount->auto_apply_billing_type = $request->input('auto_apply_billing_type');
        $discount->user_role = $request->input('user_role');

        // Save the updated discount record
        $discount->save();

        // Redirect back to the discounts index page with a success message
        //return redirect()->route('catalogue.discounts.index')->with('success', 'Discount updated successfully.');
        return redirect('discounts')->with('success', 'Image updated successfully');
    }

    
}