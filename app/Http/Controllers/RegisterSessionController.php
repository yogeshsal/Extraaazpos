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

        // dd($locationId);

        $dataQuery = Daily_register::leftjoin('users', 'users.id','=','daily_registers.user_id')
        ->select('daily_registers.id as session_id','users.name','daily_registers.*');
        // ->where('daily_registers.loc_id',$locationId)
        if ($locationId) {
            $dataQuery->where('daily_registers.loc_id', $locationId);
        }
        $data = $dataQuery->paginate(20);

        $location= Location::where('user_id', Auth::user()->id)->get();
        
        return view('register_session',['sessions' => $data,'location'=>$location]);
    }



//     public function fetchSessions(Request $request)
// {
//     $locationId = $request->input('loc_id');

//     // dd($locationId);

//     $dataQuery = Daily_register::leftjoin('users', 'users.id','=','daily_registers.user_id')
//     ->select('daily_registers.id as session_id','users.name','daily_registers.*');
//     // ->where('daily_registers.loc_id',$locationId)
//     if ($locationId) {
//         $dataQuery->where('daily_registers.loc_id', $locationId);
//     }
//     $data = $dataQuery->paginate(20);

//     $location= Location::where('user_id', Auth::user()->id)->get();

//     return view('register_session', ['sessions' => $data,'location'=>$location])->render();
// }

   













}
