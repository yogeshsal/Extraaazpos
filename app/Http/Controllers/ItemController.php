<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Item;
use App\models\Category;
use App\models\Location;
use App\models\User;
use App\models\Foodtype;
use App\models\Locationitem;

use Auth;

class ItemController extends Controller
{

    public function index()
    {
        $currentUserId = Auth::user()->id;
        $data = Item::where('user_id', $currentUserId)->with('category')->paginate(3);

        $resultArray = $data->toArray();
        //dd($resultArray);
        if (count($data) > 0) {
            $userid = $data[0]['user_id'];
            $user_name = User::where('id', $userid)->first();
            $user_name = $user_name['name'];
        } else {
            $user_name = '';
        }

        $categories = Category::pluck('cat_name', 'id');
        $locations = Location::where('user_id', $currentUserId)
            ->pluck('name', 'id');

        $foodtype = Foodtype::pluck('name', 'id');

        return view('catalogue.items.index', compact('data', 'categories', 'locations', 'foodtype', 'user_name'));
    }

    public function store(Request $request)
    {
        $currentUserId = Auth::user()->id;
        $data = new Item;
        $data->user_id = $currentUserId;
        $data->item_name = $request->item_name;
        $data->description = $request->item_description;
        $data->item_category_id = $request->item_category_id;
        $data->item_short_name = $request->item_short_name;
        $data->item_pos_code = $request->item_pos_code;
        $data->item_food_type = $request->item_food_type;
        $data->item_is_recommended = $request->item_is_recommended;
        $data->item_is_package_good = $request->item_is_package_good;
        $data->item_sell_by_weight = $request->item_sell_by_weight;
        $data->item_default_sell_price = $request->item_default_sell_price;
        $data->item_markup_price = $request->item_markup_price;
        $data->item_aggregator_price = $request->item_aggregator_price;
        $data->item_external_id = $request->item_external_id;

        $data->save();
        return redirect('items')
            ->with('success', 'Item added successfully.');
    }

    public function edit($id)
    {
        
        $currentUserId = Auth::user()->id;
        $item = Item::find($id);
        $categories = Category::pluck('cat_name', 'id');
        $foodtype = Foodtype::pluck('name', 'id');

        $locations_id = Locationitem::where('item_id', $id)->pluck('location_id')->flatten()->toArray();

        $locations = Location::whereIn('id', $locations_id)->get();

        $locationCount = $locations->count();
        

        

        return view('catalogue.items.edit', compact('item', 'categories', 'locations', 'foodtype', 'locationCount'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_short_name' => 'required|string|max:255',
            'item_category_id' => 'required|string|max:255',
            'item_pos_code' => 'required|string|max:255',
            'item_food_type' => 'required|string|max:255',
            'item_sell_by_weight' => 'string|max:255',
            'item_default_sell_price' => 'required|string|max:255',
            'item_markup_price' => 'required|string|max:255',
        ]);
        $item = Item::find($id);

        if (!$item) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }

        $item->item_is_recommended = $request->has('item_is_recommended') ? 1 : 0;
        $item->item_is_package_good = $request->has('item_is_package_good') ? 1 : 0;
        $item->item_sell_by_weight = $request->has('item_sell_by_weight') ? 1 : 0;


        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'item_short_name' => 'required|string|max:255',
            'item_category_id' => 'required|string|max:255',
            'item_pos_code' => 'required|string|max:255',
            'item_food_type' => 'required|string|max:255',
            'item_default_sell_price' => 'required|string|max:255',
            'item_markup_price' => 'required|string|max:255',


        ]);

        // Update the customer's data
        $item->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('items')->with('success', 'Item updated successfully');
    }




    public function updateImage(Request $request, $id)
    {

        $request->validate([
            'item_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define validation rules for the image file.
        ]);

        $item = Item::find($id);

        if (!$item) {
            abort(404); // Handle the case when the item with the given ID is not found.
        }

        // Handle image upload and update
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/item_images', $imageName); // Store the image in a directory, e.g., 'public/storage/item_images'

            // Update the item's image field in the database with the new image path
            $item->update(['item_image' => 'item_images/' . $imageName]);
        }

        return redirect()->route('items.edit', $id)->with('success', 'Image updated successfully');
    }


    public function select_location($id)
    {

        // $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        // ->select('items.*','categories.cat_name')
        // ->where('items.user_id', Auth::user()->id)
        // ->get();

        $location = Location::all();

        $selectedLocationIds = Locationitem::where('item_id', $id)->pluck('location_id')->all();

        $ids = [];

        if (!empty($selectedLocationIds) && isset($selectedLocationIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedLocationIds[0];
        }


        return view('catalogue.items.select_location', compact('location', 'ids'));
    }


    public function restrictItems(Request $request, $id)
    {

        $selectedItemsIds = $request->input('selected_items');

        //dd($selectedItemsIds);

        $user_id = Auth::user()->id;

        $existingTaxitem = Locationitem::where('item_id', $id)
            ->where('user_id', $user_id)
            ->first();

        if ($existingTaxitem) {
            // If a record already exists, update the item_id
            $existingTaxitem->update(['location_id' => $selectedItemsIds]);
        } else {
            // If no record exists, create a new Taxitem record
            $newLocationItem = new Locationitem;
            $newLocationItem->item_id = $id;
            $newLocationItem->user_id = $user_id;
            $newLocationItem->location_id = $selectedItemsIds; // Assuming item_id is an array field
            $newLocationItem->save();
        }

        return redirect('items');
    }
}
