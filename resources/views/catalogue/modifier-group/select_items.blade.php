
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="row card shadow p-3">
<h3>Select items</h3>
<div class="row">
    <div class="col-lg-5">
        <input type="text" class="form-control">
    </div>
   
    <div class="col-lg-7">
    <form  method="POST" action="{{ route('modifiergroups.items', ['id' => Route::current()->parameter('id')]) }}"> 
             @csrf
    <!-- Your checkboxes and table here -->

    <button class="btn btn-orange m-1" type="submit">Save</button>

    </div>
    <br><br>
    <table class="table table-hover">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Selling Price</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $i)
    <tr>
    <td><input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$i->id}}" @if(in_array($i->id, $ids)) checked @endif></td>        
    <td>{{$i->item_name}}</td>
    <td>{{$i->cat_name}}</td>
    <td>{{$i->item_default_sell_price}}</td>     
    </tr>
    @endforeach
  </tbody>
</table>
</form>  
</div>



@endsection
