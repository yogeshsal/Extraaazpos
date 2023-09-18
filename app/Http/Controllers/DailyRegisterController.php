<?php

namespace App\Http\Controllers;

use App\Models\Daily_register;
use Illuminate\Http\Request;
use Auth;
use DB;

class DailyRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $data = new Daily_register;
       $data->opening_cash = $request->opening_cash;
       $data->opening_card = $request->opening_card;
       $data->opening_credit = $request->opening_credit;
       $data->opening_upi = $request->opening_upi;
       $data->user_id = Auth::user()->id;
       
       $data->save();
       
       return redirect('/billing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daily_register  $daily_register
     * @return \Illuminate\Http\Response
     */
    public function show(Daily_register $daily_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daily_register  $daily_register
     * @return \Illuminate\Http\Response
     */
    public function edit(Daily_register $daily_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daily_register  $daily_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daily_register $daily_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daily_register  $daily_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daily_register $daily_register)
    {
        //
    }

    // function checkRegisterOpen()
    // {
    //     $lastInsertedUserId = DB::table('daily_registers')
    //         ->where('status', 1)
    //         ->latest('id')
    //         ->value('user_id');

    // }

    function checkRegisterOpen()
    {
        $currentUserId = Auth::user()->id;
        $lastInsertedUserId = DB::table('daily_registers')
            ->where('user_id', $currentUserId)
            ->where('status', 1)
            ->latest('id')
            ->value('id');

        //  dd($lastInsertedUserId);

            $lastInsertedUser = Daily_register::where('id', $lastInsertedUserId)->first();

        //   dd($lastInsertedUser['opening_cash']);
          $status = $lastInsertedUser['status']?? '';
          $opening_cash = $lastInsertedUser['opening_cash']?? '';
          $opening_card = $lastInsertedUser['opening_card']?? '';
          $opening_credit = $lastInsertedUser['opening_credit']?? '';
          $opening_upi = $lastInsertedUser['opening_upi']?? '';
        
        //   dd( $lastInsertedUser );
        //  $lastInsertedUser->created_at = ($lastInsertedUser->created_at->addHours(24));


        if ($lastInsertedUser !== null) {
            $lastInsertedUser->created_at = $lastInsertedUser->created_at->addHours(24);
            $current_date = date('Y-m-d H:i:s');

            if( $status == 0 || ($current_date >= $lastInsertedUser->created_at))
            {
              return view('dailyregister', compact('status'));
            }
            else{
              
              return view('close_register', compact('status','opening_cash','opening_card','opening_credit','opening_upi'));
            }
        } else {
            return view('dailyregister');
        }

        
    }


}
