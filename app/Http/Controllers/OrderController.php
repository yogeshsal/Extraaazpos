<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\item;
use Auth;
use PDF;

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
       
    public function getitems(Request $request, $categoryId) {
    $items = Item::where('item_category_id', $categoryId)->get();

    return response()->json(['items' => $items]);
}

    public function printContent(Request $request)
    {
        $data = [
            "kot"=> rand(1000,9999),
            "location"=> "Mumbai",
            "table name"=>"23",
            "phone"=>"998877XXXX",
         ];
        //  $pdf = PDF::loadView('Sample_pdf',$data);
        $pdf = Pdf::loadView('orders.print_kot');
        // return $pdf->download('kot.pdf');
        return $pdf->stream('kot.pdf');

       // return view('orders.print_kot',compact('content'));
    }


    public function placeOrder(Request $request)
{

  
    // Retrieve the data from the request
    $orderData = $request->json()->all();

   // dd($orderData);
    // Process the order data
    // You can access $orderData['items'] and $orderData['totalAmount']

    // Example: Save the order data to the database
//   Order::create([
//         'items' => json_encode($orderData['items']),
//         'total_amount' => $orderData['totalAmount'], 
//         // Other order details
//     ]);

        $data = 
        [
            "kot"=> rand(1000,9999),
            'items' => json_encode($orderData['items']),
            'total_amount' => $orderData['totalAmount'], 
        ];
        // dd($data);

    // You can return a response if needed
    $pdf = Pdf::loadView('orders.print_kot',$data);
    return $pdf->stream('kot.pdf');

}












}