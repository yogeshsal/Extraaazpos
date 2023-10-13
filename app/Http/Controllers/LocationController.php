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
        return view('company-admin.locations', compact('restaurant_id'));
    }
    
    
    
    
    
    public function store(Request $request) {
    $data = new Location;
    $data->name = $request->name; 
    $data->city = $request->city;    
    $data->user_id = Auth::user()->id;    
    $data->save();
    return redirect('/location')->with('status', 'Location has been added');
    }
}