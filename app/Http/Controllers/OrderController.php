<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Auth;

class OrderController extends Controller
{
    public function index1()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $categoryName = $category->id; // Assuming 'name' is the column that stores category names
            $itemCount = Item::where('item_category_id', $category->id)->count();
            $categoryCounts[$categoryName] = $itemCount;
        }
        
      
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 
        
        return view('orders.index',['categoryCounts' => $categoryCounts, 'restaurant_id'=>$restaurant_id]);
    }
       
    public function getitems(Request $request, $categoryId) {
    $items = Item::where('item_category_id', $categoryId)->get();

    return response()->json(['items' => $items]);
}
}