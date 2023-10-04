
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="row card shadow p-3">
<h3>Select Category</h3>
<div class="row">
    <div class="col-lg-5">
        <input type="text" class="form-control">
    </div>
   
    <div class="col-lg-7">
    <form id="category-form" method="POST" action="{{ route('associate.categories', ['id' => Route::current()->parameter('id')]) }}">      @csrf
    <!-- Your checkboxes and table here -->

    <button class="btn btn-orange m-1" type="submit">Associate Categories</button>

    </div>
    <br><br>
    <table class="table table-hover">
  <thead>
    <tr>
      <th></th>
      <th scope="col">Name</th>
      <th scope="col">Timing Group</th>
      <th scope="col">Associated Items</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $i)
    <tr>
    <td><input value="{{$i->id}}" class="category-checkbox" type="checkbox" name="selected_categories[]" id="category-{{$i->id}}"></td>        <td>{{$i->cat_name}}</td>
        <td>{{$i->name}}</td>
        <td>{{ $itemCounts[$i->id] }}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>
</form>  
</div>



@endsection
