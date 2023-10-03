<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Modifiergroup;
use Auth;

class ModifierGroupsController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;        
        //$data = Item::where('user_id', $currentUserId)->get(); // Fetch all posts 
        return view('catalogue.modifier-group.index',);
    }


    public function store(Request $request)
    {
        
            $currentUserId = Auth::user()->id;
            $data = new Modifiergroup;
            $data->user_id = $currentUserId;        
            $data->modifier_group_type = $request->modifier_group_type;  
            $data->modifier_group_name = $request->modifier_group_name; 
            $data->modifier_group_short_name = $request->modifier_group_short_name;
            $data->modifier_group_handle = $request->modifier_group_handle;
            $data->modifier_group_desc = $request->modifier_group_desc;
            
            dd($data);
            $data->save();            
            return redirect('modifiergroups')
            ->with('success', 'Modifier Group added successfully.');        
    }
}
