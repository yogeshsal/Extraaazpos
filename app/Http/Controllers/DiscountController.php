<?php

namespace App\Http\Controllers;
use App\models\Discount;
use App\models\Item;
use App\models\Taxitem;
use App\models\Discountitem;
use App\models\Location_discount;
use App\models\User;
use App\models\Location;
 
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

        $item_ids = Discountitem::where('discount_id', $id)->pluck('item_id')->flatten()->toArray();

        $items = Item::leftJoin('categories', 'items.item_category_id', '=', 'categories.id')
        ->whereIn('items.id', $item_ids)->get();

        $locations_id = Location_discount ::where('discount_id', $id)->pluck('location_id')->flatten()->toArray();

        $locations = Location::whereIn('id', $locations_id)->get();

        $locationCount = $locations->count();

        $tax = Taxitem::leftJoin('taxes', 'taxitems.tax_id', '=', 'taxes.id')
            ->whereJsonContains('item_id', $id)->get();


        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];
    
        // Load the edit view and pass the discount data to it
        return view('catalogue.discounts.edit', compact('discount','items','restaurant_id','locationCount','locations'));
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


    public function select_items($id)
    {
        
        $items = Item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->where('items.user_id', Auth::user()->id)
        ->get();
        
        $ids =[];
        $selectedItemIds = Discountitem::where('discount_id', $id)->pluck('item_id')->all();
        if (!empty($selectedItemIds) && isset($selectedItemIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedItemIds[0];
        }
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];    
        return view('catalogue.discounts.select_items',compact('items','ids','restaurant_id'));       
        
    }

    public function discountItems(Request $request, $id)
    {
    
    $selectedItemsIds = $request->input('selected_items');

    $user_id = Auth::user()->id;

   $existingTaxitem = Discountitem::where('discount_id', $id)
        ->where('user_id', $user_id)
        ->first();

    if ($existingTaxitem) {
        // If a record already exists, update the item_id
        $existingTaxitem->update(['item_id' => $selectedItemsIds]);
    } else {
        // If no record exists, create a new Taxitem record
        $discount = new Discountitem;
        $discount->discount_id = $id;
        $discount->user_id = $user_id;
        $discount->item_id = $selectedItemsIds; // Assuming item_id is an array field
        $discount->save();
    }
    
    return redirect('discounts');

    }

    public function select_location($id)
    {

        // $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        // ->select('items.*','categories.cat_name')
        // ->where('items.user_id', Auth::user()->id)
        // ->get();

        $location = Location::all();

        $selectedLocationIds = Location_discount::where('discount_id', $id)->pluck('location_id')->all();

        $ids = [];

        if (!empty($selectedLocationIds) && isset($selectedLocationIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedLocationIds[0];
        }
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];    


        return view('catalogue.discounts.select_location', compact('location', 'ids','restaurant_id'));
    }

    public function restrictItems(Request $request, $id)
    {

        $selectedItemsIds = $request->input('selected_items');

        //dd($selectedItemsIds);

        $user_id = Auth::user()->id;

        $existingTaxitem = Location_discount::where('discount_id', $id)
            ->where('user_id', $user_id)
            ->first();

        if ($existingTaxitem) {
            // If a record already exists, update the item_id
            $existingTaxitem->update(['location_id' => $selectedItemsIds]);
        } else {
            // If no record exists, create a new Taxitem record
            $newLocationItem = new Location_discount;
            $newLocationItem->item_id = $id;
            $newLocationItem->user_id = $user_id;
            $newLocationItem->location_id = $selectedItemsIds; // Assuming item_id is an array field
            $newLocationItem->save();
        }

        return redirect('discounts');
    }



    
}