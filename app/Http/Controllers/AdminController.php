<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $data = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data[0]['restaurant_id'];
        return view('admin', compact('restaurant_id'));
    }
}