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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'handle' => 'string',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'days' => 'required|array', // Validate 'days' as an array
        ]);

        // Get the currently authenticated user's ID
        $userId = Auth::id();
        $daysJson = json_encode($validatedData['days']);

        // Create a new CategoryTiming instance and save it
        $categoryTiming = CategoryTiming::create([
            'name' => $validatedData['name'],
            'handle' => $validatedData['handle'],
            'description' => $validatedData['description'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'days' => $daysJson,
            'user_id' => $userId,
        ]);

        return redirect('category-timing');
    }













}

