<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ModifierGroup;
use App\models\Modifier_group_type;
use App\models\User;
use Auth;

class ModifierGroupsController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;        
        $data = Modifiergroup::where('user_id', $currentUserId)->get(); // Fetch all posts 

        if (count($data) > 0) {
            $userid = $data[0]['user_id'];
            $user_name = User::where('id', $userid)->first();   
            $user_name = $user_name['name'];
            // Now you can safely access $userid
        } else {
            $user_name = '';
        }

        $modifiergrouptype = Modifier_group_type::pluck('type', 'id');  
        return view('catalogue.modifier-group.index',compact('data', 'user_name','modifiergrouptype'));
    }


    public function store(Request $request)
    {
        
            $currentUserId = Auth::user()->id;
            $data = new ModifierGroup;
            $data->user_id = $currentUserId;        
            $data->modifier_group_type = $request->modifier_group_type;  
            $data->modifier_group_name = $request->modifier_group_name; 
            $data->modifier_group_short_name = $request->modifier_group_short_name;
            $data->modifier_group_handle = $request->modifier_group_handle;
            $data->modifier_group_desc = $request->modifier_group_desc;
            
            
            $data->save();            
            return redirect('modifiergroups')
            ->with('success', 'Modifier Group added successfully.');        
    }


    public function edit($id)    {    
        
        $currentUserId = Auth::user()->id;
        $modifiergroup = ModifierGroup::find($id);
        $modifiergrouptype = Modifier_group_type::pluck('type', 'id');  
        // $categories = Category::all();
        // $category_desc = $category['cat_desc'];
        // $categories = Category::pluck('item_name', 'id');
        // $locations = Location::where('user_id', $currentUserId)->pluck('item_name', 'id'); 
        return view('catalogue.modifier-group.edit', compact('modifiergroup','modifiergrouptype'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'modifier_group_type' => 'required|string|max:255',
            'modifier_group_name' => 'required|string|max:255',
             'modifier_group_short_name' => 'required|string|max:255',
            'modifier_group_handle' => 'required|string|max:255', 
            'modifier_group_desc' => 'required|string|max:255',    

            
        ]);
        $modifiergroup = ModifierGroup::find($id);
        if (!$modifiergroup) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }        
        
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            'modifier_group_type' => 'required|string|max:255',
            'modifier_group_name' => 'required|string|max:255',
            'modifier_group_short_name' => 'required|string|max:255',  
            'modifier_group_handle' => 'required|string|max:255',  
            'modifier_group_desc' => 'required|string|max:255',    
        ]);
            
        // Update the modifier group data
        //dd($validatedData);
        $modifiergroup->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('modifiergroups')->with('success', 'Modifier Group updated successfully');
    }
}
