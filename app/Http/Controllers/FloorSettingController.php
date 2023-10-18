<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_register;
use App\Models\Add_floor;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Charge;
use App\Models\User;
use App\Models\Location;
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

            $currentUserId = Auth::user()->id;
            $data1 = User::where('id', $currentUserId)->get()->toArray();
            $restaurant_id = $data1[0]['restaurant_id']; 

        return view('add_floor',compact('loc_id','restaurant_id'));

    }

    // public function add_floor(Request $request)
    // {
    //     $data = new Add_floor;
    //     $data->user_id =  Auth::user()->id;
    //     $data->loc_id = $request->loc_id;
    //     $data->balcony = $request->balcony;
    //     $data->table = $request->table;
    //     $data->save();
    //     return redirect('billing');

    // }

    public function add_floor(Request $request)
{
    // Check if an existing record exists
    $existingRecord = Add_floor::where('user_id', Auth::user()->id)
        ->where('loc_id', $request->loc_id)
        ->first();

    if ($existingRecord) {
        // Update the existing record
        $existingRecord->update([
            'balcony' => $request->balcony,
            'table' => $request->table,
            // Add more fields to update as needed
        ]);
    } else {
        // Create a new record
        $data = new Add_floor;
        $data->user_id = Auth::user()->id;
        $data->loc_id = $request->loc_id;
        $data->balcony = $request->balcony;
        $data->table = $request->table;
        $data->save();
    }

    return redirect('billing');
}


    public function show_table(Request $request)
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

        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 

        // $data = User::where('id', $currentUserId)->pluck('restaurant_id');
        // dd($data[0]);
        $discounts = Discount::where('restaurant_id',$restaurant_id)->get();
        $charges = Charge::where('restaurant_id',$restaurant_id)->get();
        //dd($discounts);
        
         
        $loc = Location::leftJoin('daily_registers','daily_registers.loc_id','=','locations.id')
        ->where('locations.user_id', $currentUserId)
        ->where('daily_registers.status',1)
        ->get()->toArray();
        // dd($loc);
         $locationname = $loc[0]['name'] ??''; 
        

        return view('billing',compact('bal','table'),['customer'=>$customer, 'restaurant_id'=>$restaurant_id, 'discounts'=>$discounts,'locationname'=>$locationname,'charges'=>$charges]);

    }

}