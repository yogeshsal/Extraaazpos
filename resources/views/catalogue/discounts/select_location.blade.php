@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<div class="main-content">
  <div class="page-content">
    <form method="POST" action="{{ route('loction.items', ['id' => Route::current()->parameter('id')]) }}">
      @csrf
      <div class="row card shadow p-3">
        <h3>Associate Locations</h3>
        <div class="row">
          <div class="col-lg-5">
            <input type="text" class="form-control">
          </div>

          <div class="col-lg-7">
            <!-- Your checkboxes and table here -->

            <button class="btn btn-orange m-1" type="submit">Save</button>

          </div>
        </div>
        <br><br>
        <div class="container-fluid">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th></th>
                <th scope="col">Name</th>
                <th scope="col">city</th>
              </tr>
            </thead>
            <tbody>
              @foreach($location as $loc)
              <tr>
                <td><input value="{{$loc->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$loc->id}}" @if(in_array($loc->id, $ids)) checked @endif></td>
                <td>{{$loc->name}}</td>
                <td>{{$loc->city}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </form>
  </div>
</div>



@endsection