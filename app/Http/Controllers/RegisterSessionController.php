<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_register;


class RegisterSessionController extends Controller
{
    public function index()
    {
        $data = Daily_register::leftjoin('users', 'users.id','=','daily_registers.user_id')
        ->select('daily_registers.id as session_id','users.name','daily_registers.*')
        ->paginate(20);

      



        return view('register_session',['session'=>$data]);
    }

   













}
