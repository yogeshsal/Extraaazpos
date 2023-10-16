<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
use App\models\User;

class SettingController extends Controller
{
   public function index()
    {
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];  
        return View('company-admin.settings', compact('restaurant_id')); // Assuming "settings.blade.php" is your view file.
    }
}