<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Auth;

class MaterialController extends Controller
{
     public function index()
    {        
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];  
        return View('rawmaterials.materials.index', compact('restaurant_id'));
    }
}