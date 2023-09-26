<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;
use Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category ::where('user_id',Auth::user()->id)->get();

        $location =Location::where('user_id',Auth::user()->id)->get();
        
        return view('categories',['category'=>$data,'location'=>$location]);
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->name= $request->name;
        $data->short_name= $request->short_name;
        $data->handle= $request->handle;
        $data->sort_order= $request->sort_order;
        $data->external_id= $request->external_id;
        $data->timing_group_id	= 2;
        $data->description= $request->description;
        $data->user_id= auth::user()->id;
       
        if (is_array($request->loc_id)) {
            $data->loc_id = implode(',', $request->loc_id); // Convert array to comma-separated string
        } else {
            $data->loc_id = $request->loc_id; // Use the value as-is if it's not an array
        }

        $data->save();
        return redirect('categories');
    }

 







}
