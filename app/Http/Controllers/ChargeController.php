<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use Auth;
class ChargeController extends Controller
{
    public function index()
    {
        $data = Charge::all(); 
        return view('catalogue.charges.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Charge;
        $data->name = $request->name;
        $data->charge_type = $request->charge_type;
        $data->description = $request->description;
        $data->applicable_on = $request->applicable_on;
        $data->amount_per_quantity = $request->amount_per_quantity;
        $data->applicable_modes = $request->applicable_modes;
        $data->auto_apply_billing_types = $request->auto_apply_billing_types;
        $data->user_id= Auth::user()->id;
        $data->save();
        return redirect('/charges');

    }

    public function edit($id)
    {
        $Charge = Charge::find($id);        
        if (!$Charge) {
            // Handle the case when the customer with the given ID is not found
            abort(404); // You can customize the error response as needed
        }
        return view('catalogue.charges.edit', compact('Charge'));
    }








}
