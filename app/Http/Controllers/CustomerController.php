<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;
use App\models\User;
use Auth;

class CustomerController extends Controller
{
    
    public function index()    {
        $data = Customer::all(); // Fetch all posts
        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id']; 
        return view('customers.index', compact('data', 'restaurant_id'));        
    }
    
    
    public function store(Request $request)
    {
        
            $data = new Customer;        
            $data->name = $request->name;
            $data->mobile = $request->mobile;
            $data->email = $request->email;
            $data->date_of_birth = $request->date_of_birth;
            $data->address = $request->address;
            $data->tax_number = $request->tax_number;
            $data->credit_limit = $request->credit_limit;
            $data->note = $request->note;                        
            $data->save();            
            return redirect('customers')
            ->with('success', 'Customer created successfully.');        
        
    }

    public function edit($id)
    {
        $customer = Customer::find($id);        
        if (!$customer) {
            // Handle the case when the customer with the given ID is not found
            abort(404); // You can customize the error response as needed
        }
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10', // Assuming a 10-digit mobile number
            'email' => 'required|email',
            'date_of_birth' => 'required|date|before_or_equal:today|after_or_equal:1900-01-01',
            'address' => 'required|string|max:255',
            'tax_number' => ['required','string','regex:/^[A-Z0-9]{10}$/i',], // Adjust the regex pattern to match your tax number format.
            'credit_limit' => 'required|numeric|min:0|max:1000000',
            'note' => 'nullable|string|max:500', // Adjust the max value as needed

            // Add more validation rules as needed for other fields
        ]);
        $customer = Customer::find($id);

        if (!$customer) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }

        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10', 
            'email' => 'required|email',
            'date_of_birth' => 'required|date|before_or_equal:today|after_or_equal:1900-01-01',
            'address' => 'required|string|max:255',
            'tax_number' => ['required','string','regex:/^[A-Z0-9]{10}$/i',],
            'credit_limit' => 'required|numeric|min:0|max:1000000',
            'note' => 'nullable|string|max:500', // Adjust the max value as needed

            // Add validation rules for other fields here
        ]);

        // Update the customer's data
        $customer->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('customers')->with('success', 'Customer updated successfully');
    }

}