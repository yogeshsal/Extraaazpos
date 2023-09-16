@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<br>
<h1>location</h1>
<div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Add Location
    </div>
    <div class="card-body">
      <form name="add_location" id="add_location" method="post" action="{{url('store-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>        
        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </form>
    </div>
  </div>
</div>  

@endsection