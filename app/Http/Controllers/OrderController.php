<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Auth;
use DB;

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


   // $items = Item::where('item_category_id', $categoryId)->get();

   $data = DB::table('items AS i')
        ->leftJoin('taxitems AS t', function ($join) {
            $join->on(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(t.item_id, \'$[0]\'))'), '=', 'i.id')
                ->orWhere(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(t.item_id, \'$[1]\'))'), '=', 'i.id');
        })
        ->leftJoin('taxes AS tx', 't.tax_id', '=', 'tx.id')
        ->select('i.id AS item_id', 'i.item_name', 't.tax_id', 't.status AS tax_status','tx.name AS tax_name')
        ->get();

    if ($data->isEmpty()) {
        return response()->json(["message" => "No items with associated taxes found."]);
    }

    return response()->json($data, 200, [], JSON_PRETTY_PRINT);
   // return response()->json(['items' => $items]);
}






















}

