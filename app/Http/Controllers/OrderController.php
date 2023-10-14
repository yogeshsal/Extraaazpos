<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\item;
use Auth;
use DB;

class OrderController extends Controller
{
    public function index1()
    {
        //dd('test');
        $categories = Category::where('user_id', Auth::user()->id)->get();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $categoryName = $category->id; // Assuming 'name' is the column that stores category names
            $itemCount = Item::where('item_category_id', $category->id)->count();
            $categoryCounts[$categoryName] = $itemCount;
        }
        
      
        
        return view('orders.index',['categoryCounts' => $categoryCounts]);
    }
       
    public function getitems(Request $request, $categoryId) 
    {
        
        $data = DB::table('items AS i')
        ->leftJoin('taxitems AS t', function ($join) {
            $join->on(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(t.item_id, \'$[0]\'))'), '=', 'i.id')
                ->orWhere(DB::raw('JSON_UNQUOTE(JSON_EXTRACT(t.item_id, \'$[1]\'))'), '=', 'i.id');
        })
        ->leftJoin('taxes AS tx', 't.tax_id', '=', 'tx.id')
        ->select('i.item_default_sell_price','i.item_image','i.item_name', 't.tax_id', 't.status AS tax_status','tx.name AS tax_name')
        ->get();

        if ($data->isEmpty()) {
            return response()->json(["message" => "No items with associated taxes found."]);
        }

        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
   
    }






















}

