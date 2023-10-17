<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_register;
use App\Models\Location;
use App\Models\User;
use Auth;


class RegisterSessionController extends Controller
{
    public function index(Request $request)
    {
        $locationId = $request->input('loc_id');        
        
        $dataQuery = Daily_register::leftJoin('users', 'users.id', '=', 'daily_registers.user_id')
    ->leftJoin('locations', 'locations.id', '=', 'daily_registers.loc_id')
    ->select('daily_registers.id as session_id', 'users.name as username', 'daily_registers.*', 'locations.name as location_name', 'locations.city as locationcity');
            
        if ($locationId) {
            $dataQuery->where('daily_registers.loc_id', $locationId);
        }
        $data = $dataQuery->paginate(20);        
        
        //this location is for search match
        $location= Location::where('user_id', Auth::user()->id)->get();   
        
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 

        $loc = Location::leftJoin('daily_registers','daily_registers.loc_id','=','locations.id')
        ->where('locations.user_id', $currentUserId)
        ->where('daily_registers.status',1)
        ->get()->toArray();
        // dd($loc);
         $locationname = $loc[0]['name'] ?? ""; 


        return view('register_session',compact('locationname'),['sessions' => $data,'location'=>$location, 'restaurant_id'=>$restaurant_id]);
    }















}