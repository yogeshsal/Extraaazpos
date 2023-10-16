<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\models\User;
use Auth;

class LocationController extends Controller
{
    
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $data = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data[0]['restaurant_id'];
    
        // Retrieve the Point Of Sale locations here
        $locations = Location::where('type', 'Point Of Sale')->get();
    
        return view('company-admin.locations', compact('restaurant_id', 'locations', 'currentUserId'));
    }
    
    
    
    
    public function store(Request $request)
    {
        // Validate the form data
        $currentUserId = Auth::user()->id;
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:Online,Inventory,Point Of Sale',
            'handle' => 'nullable|string',
            'tax_number' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'nullable|string',
            'fssai_id' => 'nullable|string',
            'address' => 'required|string',
            'stock_location' => 'nullable|string',
            'brand' => 'nullable|string',
            'max_slot_number' => 'nullable|integer',
            'user_id' =>'required',
            'restaurant_id' => 'required',
            // Add more validation rules for other fields
        ]);
    
        // Create a new Location instance and fill it with the validated data
        $location = new Location();
        
       // dd($validatedData);
        $location->fill($validatedData);
    
        // Save the location to the database
        $location->save();
    
        // Optionally, you can redirect the user back with a success message
        return redirect()->back()->with('success', 'Location created successfully');
    }
    public function posTab()
{
    $locations = Location::where('type', 'Point Of Sale')->get();
    return view('company-admin.locations', compact('locations'));
}
    
}