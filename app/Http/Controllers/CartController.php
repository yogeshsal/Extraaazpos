<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\models\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
class CartController extends Controller
{
 
    public function saveToCart(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string',
            'unit_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'product_total' => 'required|numeric',
            'customer_id' => 'required|integer', // Add validation for customer_id
        ]);

        // Wrap the database operations in a transaction
        DB::beginTransaction();

        try {
            $user_id = Auth::user()->id; // Get the authenticated user's ID

            $user = User::find($user_id);
            $restaurant_id = $user->restaurant_id; // Get the restaurant ID from the user model

            // Create and save the cart item
            Cart::create([
                'user_id' => $user_id,
                'restaurant_id' => $restaurant_id,
                'customer_id' => $request->input('customer_id'),
                'product_name' => $request->input('product_name'),
                'unit_price' => $request->input('unit_price'),
                'quantity' => $request->input('quantity'),
                'product_total' => $request->input('product_total'),
            ]);

            // Commit the transaction
            DB::commit();

            // Log successful data storage
            Log::info('Item saved to cart successfully');

            return response()->json(['message' => 'Item saved to cart successfully']);
        } catch (\Exception $e) {
            // If an error occurs, rollback the transaction
            DB::rollBack();

            // Log the error
            Log::error('Error: ' . $e->getMessage());

            // Return a 500 Internal Server Error response
            return response()->json(['message' => 'Error while saving to cart'], 500);
        }
    }
    
    public function updateCartItem(Request $request)
{
    $user_id = Auth::user()->id; // Get the authenticated user's ID
    $user = User::find($user_id);
    $restaurant_id = $user->restaurant_id; // Get the restaurant ID from the user model

    // Update the cart item based on the provided data
    Cart::where('user_id', $user_id)
        ->where('restaurant_id', $restaurant_id)
        ->where('customer_id', $request->input('customer_id'))
        ->where('product_name', $request->input('product_name'))
        ->update([
            'unit_price' => $request->input('unit_price'),
            'quantity' => $request->input('quantity'),
            'product_total' => $request->input('product_total'),
        ]);

    return response()->json(['message' => 'Item updated in the cart successfully']);
}
public function getCartItems()
{
    $user_id = Auth::user()->id;
    $user = User::find($user_id);

    $cartItems = Cart::where('user_id', $user_id)
        ->where('restaurant_id', $user->restaurant_id)
        ->get();

    return response()->json(['cartItems' => $cartItems]);
    dd($cartItems);
}

// Add this method to your CartController
public function removeCartItem($product_name)
{
    try {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        Cart::where('user_id', $user_id)
            ->where('restaurant_id', $user->restaurant_id)
            ->where('product_name', $product_name)
            ->delete();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // Handle the error and return a response
        return response()->json(['success' => false, 'message' => 'Error while removing item from cart'], 500);
    }
}


}
