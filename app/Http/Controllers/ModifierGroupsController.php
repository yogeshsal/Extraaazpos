<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ModifierGroup;
use App\models\Modifier_group_type;
use App\models\User;
use App\models\Modifieritem;
use App\models\item;
use App\models\Foodtype;
use App\models\Modifier;


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
        //dd($modifiergrouptype);

        $currentUserId = Auth::user()->id;
        $data1 = User::where('id', $currentUserId)->get()->toArray();
        $restaurant_id = $data1[0]['restaurant_id'];           
        return view('catalogue.modifier-group.index',compact('data', 'user_name','modifiergrouptype', 'restaurant_id'));
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
            $data->modifier_sort_order	 = $request->modifier_sort_order;
            $data->modifier_external_id = $request->modifier_external_id; 
            $data->save();            
            return redirect('modifiergroups')
            ->with('success', 'Modifier Group added successfully.');        
    }


    public function edit($id)    {    
        
        $currentUserId = Auth::user()->id;
        $modifiergroup = ModifierGroup::find($id);
        $modifiergrouptype = Modifier_group_type::pluck('type', 'id');  

        $modifier_ids = Modifieritem::where('modifier_id', $id)->pluck('item_id')->flatten()->toArray();

        $items = Item::leftJoin('categories', 'items.item_category_id', '=', 'categories.id')
        ->whereIn('items.id', $modifier_ids)->get(); 

        $modifier = Modifier::where('modifier_group_id',$id)->get();

      // dd($modifier);

        return view('catalogue.modifier-group.edit', compact('modifiergroup','modifiergrouptype','items','modifier'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'modifier_group_type' => 'required|string|max:255',
            'modifier_group_name' => 'required|string|max:255',
             'modifier_group_short_name' => 'required|string|max:255',
            'modifier_group_handle' => 'required|string|max:255', 
            'modifier_group_desc' => 'required|string|max:255',
            'modifier_external_id' => 'string|max:255', 
            'modifier_sort_order' => 'required|string|max:255',    

            
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
            'modifier_external_id' => 'string|max:255', 
            'modifier_sort_order' => 'required|string|max:255',    
        ]);
            
        // Update the modifier group data
        //dd($validatedData);
        $modifiergroup->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('modifiergroups')->with('success', 'Modifier Group updated successfully');
    }

    public function select_items($id)
    {
        
        $items = item::leftjoin('categories','items.item_category_id','=','categories.id')
        ->select('items.*','categories.cat_name')
        ->where('items.user_id', Auth::user()->id)
        ->get();

        $selectedItemIds = Modifieritem::where('modifier_id', $id)->pluck('item_id')->all();

       // dd($selectedItemIds);

        $ids= [];
        
        if (!empty($selectedItemIds) && isset($selectedItemIds[0])) {
            // Access $selectedItemIds[0] here
            $ids = $selectedItemIds[0];
        }
       
        
       return view('catalogue.modifier-group.select_items',compact('items','ids'));
    }

    public function restrictItems(Request $request,$id)
    {
       
        $selectedItemsIds = $request->input('selected_items');

        $user_id = Auth::user()->id;
    
       $existingTaxitem = Modifieritem::where('modifier_id', $id)
            ->where('user_id', $user_id)
            ->first();
    
        if ($existingTaxitem) {
            // If a record already exists, update the item_id
            $existingTaxitem->update(['item_id' => $selectedItemsIds]);
        } else {
            // If no record exists, create a new Taxitem record
            $newTaxitem = new Modifieritem;
            $newTaxitem->modifier_id = $id;
            $newTaxitem->user_id = $user_id;
            $newTaxitem->item_id = $selectedItemsIds; // Assuming item_id is an array field
            $newTaxitem->save();
        }
        
        return redirect('modifiergroups');
    }

    public function listModifier($id)
    {
        $foodtype = Foodtype::all();
        
        return view('catalogue.modifier-group.create_modifier',compact('foodtype'));
    }

    public function createModifier(Request $request, $id)
    {
        $data = new Modifier;
        $data->modifier_group_id = $id;
        $data->user_id = Auth::user()->id;
        $data->title = $request->title;
        $data->short_name = $request->short_name;
        $data->default_sale_price = $request->default_sale_price;
        $data->aggregator_sales_price = $request->aggregator_sales_price;
        $data->food_type = $request->food_type;
        $data->sort_order = $request->sort_order;
        $data->save();

        return redirect('modifiergroups');
    
    }

    public function editModifier($id)
    {
        $modifier = Modifier::find($id);
        
        $foodtype = Foodtype::all();
        
        return view('catalogue.modifier-group.edit_modifier',compact('modifier','foodtype'));
    }


    public function update_modifier(Request $request, $id)
    {
        
        $request->validate([
           
           'title' => 'required|string|max:255',
            'default_sale_price' => 'required',
            'food_type' => 'required',
            
        ]);
        $modifier = Modifier::find($id);
        if (!$modifier) {
            // Handle the case when the customer with the given ID is not found
            abort(404);
        }        
        
        
        // Validate the form data (customize validation rules as needed)
        $validatedData = $request->validate([
            
           'title' => 'required|string|max:255',
            'default_sale_price' => 'required',
            'food_type' => 'required',
        ]);
            
        // Update the modifier group data
       // dd($validatedData);
        $modifier->update($validatedData);

        // Redirect to a success page or back to the edit form with a success message
        return redirect('modifiergroups')->with('success', 'Modifier updated successfully');
    }








}