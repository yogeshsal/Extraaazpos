<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\item;
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
        
      
        
        return view('orders.index',['categoryCounts' => $categoryCounts]);
    }


        //public function getitems(Request $request, $categoryId){
        
        
        // $items = Item::where('category', $categoryId)->get()->toArray();        
        // return view('orders.index', ['items' => $items]);
        // $items = Item::where('category', $categoryId)->get()->toArray(); // Remove ->toArray()
        // dd($items);
        // return view('orders.index', compact('items'));
        //$items = Item::where('item_category_id', $categoryId)->get()->toarray();
        
//         return response()->json(['items' => $items]);
// //return view('orders.index', ['a' => $a]);

//     }
public function getitems(Request $request, $categoryId) {
    $items = Item::where('item_category_id', $categoryId)->get();

    return response()->json(['items' => $items]);
}
}
