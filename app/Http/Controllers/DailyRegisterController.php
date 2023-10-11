<?php

namespace App\Http\Controllers;

use App\Models\Daily_register;
use App\Models\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        //dd($currentUserId);
        $lastInsertedUserId = DB::table('daily_registers')
            ->where('user_id', $currentUserId)
            ->where('status', 1)
            ->latest('id')
            ->value('id');

          //dd($lastInsertedUserId);

            $lastInsertedUser = Daily_register::where('id', $lastInsertedUserId)->first();

        //   dd($lastInsertedUser['opening_cash']);
          $id = $lastInsertedUser['id']?? '';
          $status = $lastInsertedUser['status']?? '';
          $opening_cash = $lastInsertedUser['opening_cash']?? '';
          $opening_card = $lastInsertedUser['opening_card']?? '';
          $opening_credit = $lastInsertedUser['opening_credit']?? '';
          $opening_upi = $lastInsertedUser['opening_upi']?? '';
          $opened_at = $lastInsertedUser['created_at']?? '';
          $closed_at = $lastInsertedUser['updated_at']?? '';
        
          //dd( $lastInsertedUser );
        //  $lastInsertedUser->created_at = ($lastInsertedUser->created_at->addHours(24));


        if ($lastInsertedUser !== null) {
            
            $lastInsertedUser->created_at = $lastInsertedUser->created_at->addHours(24);
            $current_date = date('Y-m-d H:i:s');
            //dd($status);
            if( $status == 0 || ($current_date >= $lastInsertedUser->created_at))
            {
                
                $loc = [];
              return view('dailyregister', compact('status', 'loc'));
            }
            else{
               
              return view('close_register', compact('id','status','opening_cash','opening_card','opening_credit','opening_upi', 'opened_at', 'closed_at'));
            }
        } else {
            $location = Location::where('user_id', $currentUserId)->get()->toArray();
            //dd($location);
            return view('dailyregister', ['loc'=>$location]);
        }

        
    }



    function checkRegister()
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
          $id = $lastInsertedUser['id']?? '';
          $status = $lastInsertedUser['status']?? '';
          $opening_cash = $lastInsertedUser['opening_cash']?? '';
          $opening_card = $lastInsertedUser['opening_card']?? '';
          $opening_credit = $lastInsertedUser['opening_credit']?? '';
          $opening_upi = $lastInsertedUser['opening_upi']?? '';
          $opened_at = $lastInsertedUser['created_at']?? '';
          $closed_at = $lastInsertedUser['updated_at']?? '';
        
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
              
              return view('closeregister', compact('id','status','opening_cash','opening_card','opening_credit','opening_upi', 'opened_at', 'closed_at'));
            }
        } else {
            $location = Location::where('user_id', $currentUserId)->get()->toArray();
           // dd($location);
            return view('dailyregister', ['loc'=>$location]);
        }

        
    }

    public function closeregister(Request $request)
    {
        //dd("in");
        $data = new Daily_register;
        $closing_cash = $request->closingcash1;
        $closing_card = $request->closingcard1;   
        $closing_credit = $request->closingcredit1;   
        $closing_upi = $request->closingupi1; 
        
        //dd($closing_cash);        
        
        $currentUserId = Auth::user()->id; 
        $currentTimestamp = Carbon::now();

        DB::table('daily_registers')
        ->where('user_id', $currentUserId)
        ->where('status', 1)
        ->update([
            'status' => '0',
            'closing_cash' => $closing_cash,
            'closing_card' => $closing_card,
            'closing_credit' => $closing_credit,
            'closing_upi' => $closing_upi,
            'updated_at' => $currentTimestamp,
        ]);

        return redirect('dailyregister');

        
    }  
    
    
    public function passlocation(Request $request) 
    {     
        $currentUserId = Auth::user()->id;    
        $locationname = $request->location_name;  
        $id = DB::table('locations')
        ->where('name', $locationname)
        ->where('user_id', $currentUserId)
        ->value('id');         
        return view('/create_register', ['locationname'=>$locationname, 'loc_id'=>$id]);
       
        }

        public function storeRegister(Request $request) 
        {             
            $data = new Daily_register;        
            $data->loc_id = $request->loc_id;
            $data->location = $request->locationname;
            $data->opening_cash = $request->opening_cash ?? 0.00;
            $data->opening_card = $request->opening_card ?? 0.00;
            $data->opening_credit = $request->opening_credit ?? 0.00;
            $data->opening_upi = $request->opening_upi ?? 0.00;
            $data->opening_upi = $request->opening_upi ?? 0.00;
            $data->opening_upi = $request->opening_upi ?? 0.00;
            $data->user_id = Auth::user()->id;            
            $data->save();            
            return redirect('/billing');
        }


}
