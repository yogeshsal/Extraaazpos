<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_register;
use App\Models\Add_floor;
use App\Models\Customer;
use Auth;
use DB;


class FloorSettingController extends Controller
{
    public function index()
    {

        $currentUserId = Auth::user()->id;
        $lastInsertedUserId = DB::table('daily_registers')
            ->where('user_id', $currentUserId)
            ->where('status', 1)
            ->latest('id')
            ->value('id');

         
            $lastInsertedUser = Daily_register::where('id', $lastInsertedUserId)->first();

           // dd($lastInsertedUser);
         
           $loc_id = $lastInsertedUser['loc_id']?? '';

        return view('add_floor',compact('loc_id'));

    }

    public function add_floor(Request $request)
    {
        $data = new Add_floor;
        $data->user_id =  Auth::user()->id;
        $data->loc_id = $request->loc_id;
        $data->balcony = $request->balcony;
        $data->table = $request->table;
        $data->save();
        return redirect('billing');

    }

    public function show_table()
    {
        $data = Add_floor::where('user_id',Auth::user()->id)->first();

        if (isset($data['balcony'])) {
            $bal = $data['balcony'];
            // Now you can safely use $bal
        } else {
            // Handle the case where 'balcony' key is not set
            $bal = null; // or provide a default value
        }
        
        if (isset($data['table'])) {
            $table = $data['table'];
            // Now you can safely use $bal
        } else {
            // Handle the case where 'balcony' key is not set
            $table = null; // or provide a default value
        }
        
        //dd($bal);

        $customer = Customer::all();

        return view('billing',compact('bal','table'),['customer'=>$customer]);

    }

}
