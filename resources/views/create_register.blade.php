
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- <p>Welcome, {{ auth()->user()->name }}</p> -->
<br>
<div class="row">
    <h2>Opening register for {{ auth()->user()->name }} at $location</h2>
    <div class="card" style="width: 100%;">
        <div class="row">
        <form action ="" method="post">
          @csrf
              <div class="row p-4">
                <div class="col">
                  <input name="opening_cash" type="text" class="form-control" placeholder="Opening Cash Amount">
                </div>
                <div class="col">
                  <input name="opening_card" type="text" class="form-control" placeholder="Opening Card Amount">
                </div>
              </div>
              <div class="row p-4">
                <div class="col">
                  <input name="opening_credit" type="text" class="form-control" placeholder="Opening Credit Amount">
                </div>
                <div class="col">
                  <input name="opening_upi" type="text" class="form-control" placeholder="Opening UPI Amount">
                </div>
                
              </div>
              <div class="p-4">

              <button type="submit" class="btn btn-primary">Open Register</button>
              <button class="btn btn-info m-3">Choose Another Register</button>
              </div>
         </form>
        </div>
    </div>
</div>


@endsection