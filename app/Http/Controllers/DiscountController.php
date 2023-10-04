<?php

namespace App\Http\Controllers;
use App\models\Discount;


use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $data = Discount::all(); 
        return view('catalogue.discounts.index',['data'=>$data]);        
    }

    public function add_discount(Request $request)
    {

        $data = new Discount;
        $data->discount_name = $request->discount_name;
        $data->applicable_on = $request->applicable_on;
        $data->discount_type = $request->discount_type;
        $data->discount_value = $request->discount_value;
        $data->desc = $request->desc;
        $data->max_discount_value = $request->max_discount_value;
        $data->min_total_amount = $request->min_total_amount;
        $data->auto_apply_billing_type = $request->auto_apply_billing_type;
        $data->user_role = $request->user_role;
        $data->save();
        return redirect('discounts');

    }
}
