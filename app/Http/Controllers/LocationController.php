<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Auth;

class LocationController extends Controller
{
    public function store(Request $request) {


    $data = new Location;
    $data->name = $request->name;    
    $data->user_id = Auth::user()->id;    
    $data->save();
    return redirect('/location')->with('status', 'Location has been added');
    }
}
