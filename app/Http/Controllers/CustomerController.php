<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Customer;
use Auth;

class CustomerController extends Controller
{
    
    public function index()
    {
        $data = Customer::all(); // Fetch all posts
        return view('customers.index', compact('data'));        
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
            
            // Add validation rules for other fields here
        ]);

        // Update the customer's data
        $customer->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('customers')->with('success', 'Customer updated successfully');
    }

}
