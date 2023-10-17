
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="row card shadow p-3">
<h3>Associate Locations</h3>
<div class="row">
    <div class="col-lg-5">
        <input type="text" class="form-control">
    </div>
   
    <div class="col-lg-7">
    <form method="POST" action="{{ route('modifiergroup.items', ['id' => Route::current()->parameter('id')]) }}">  
            @csrf
    <!-- Your checkboxes and table here -->

    <button class="btn btn-orange m-1" type="submit">Save</button>

    </div>
    <br><br>
    <table class="table table-hover">
            <thead>
              <tr>
              <th></th>
                <th scope="col">Modifier Group</th>
              
              </tr>
            </thead>
            <tbody>
                     @foreach($modifierGroup as $m )
                        <tr>
                        <td><input value="{{$m->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$m->id}}" @if(in_array($m->id, $ids)) checked @endif></td>        

                        <td>{{$m->modifier_group_name}}</td>
                            
                        </tr>
                     @endforeach
              </tbody>
            </table>
            </form>  
            </div>



@endsection
