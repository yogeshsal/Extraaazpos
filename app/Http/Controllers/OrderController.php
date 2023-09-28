<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\item;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $categoryName = $category->name; // Assuming 'name' is the column that stores category names
            $itemCount = Item::where('category', $category->id)->count();
            $categoryCounts[$categoryName] = $itemCount;
        }
        
      
        
        return view('orders.index',['categoryCounts' => $categoryCounts]);
    }
}
