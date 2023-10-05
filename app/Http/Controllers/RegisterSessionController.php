<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_register;
use App\Models\Location;
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
        
        $location= Location::where('user_id', Auth::user()->id)->get();     

        return view('register_session',['sessions' => $data,'location'=>$location]);
    }















}
