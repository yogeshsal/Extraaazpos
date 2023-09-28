<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTiming;
use Auth;
use DB;

class CategoryTimingController extends Controller
{
    public function index()
    {
        $data = CategoryTiming ::leftJoin('users','users.id','=','category_timings.user_id')
        ->select('users.name as username','category_timings.*')
        ->where('category_timings.user_id',Auth::user()->id)
        ->paginate(20);
        return view('category_timing',['time'=>$data]);
    }

    function addCategoryTiming(Request $request)
    {
        $data = new CategoryTiming;
        $data->name = $request->name;
        $data->handle = $request->handle;
        $data->description = $request->description;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('category-timing');
    }













}

