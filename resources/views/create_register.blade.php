@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- <p>Welcome, {{ auth()->user()->name }}</p> -->
<div class="main-content">

    <div class="page-content">
    <div class="card shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
        <div>
        <h3 class="p-0">Opening register for {{ auth()->user()->name }} at {{isset($locationname)? $locationname : ''}}
            </h3>

    </div>
    </div> <div class="container"> @csrf <form action="{{ route('storeRegister') }}" method="post">
    <div class="row"> <div class="card"> <div class="card-body"> <div class="row form-row"> <div class="col-md-6">
        <div class="form-group">
        <label for="name">Opening Cash Amount</label>
        <input name="opening_cash" type="text" class="form-control" placeholder="Opening Cash Amount" value="0">
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile">Opening Card Amount</label>
            <input name="opening_card" type="text" class="form-control" placeholder="Opening Card Amount" value="0">
        </div>
    </div>
</div>


<div class="row form-row mt-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Opening Credit Amount</label>
            <input name="opening_credit" type="text" class="form-control" placeholder="Opening Credit Amount" value="0">


        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="mobile">Opening UPI Amount</label>
            <input name="opening_upi" type="text" class="form-control" placeholder="Opening UPI Amount" value="0">
        </div>
        <input name="loc_id" type="text" class="form-control" hidden value="{{ isset($loc_id) ? $loc_id : '' }}">
        <input name="locationname" type="text" class="form-control" hidden
            value="{{isset($locationname)? $locationname : ''}}">
    </div>
</div>
</div>

<div class="p-4">

    <button type="submit" class="btn btn-orange">View Register</button>
    <button type="button" class="btn btn-outline-primary ml-2">Choose Another Register</button>

</div>
</form>
</div>
</div>
</div>
</div>






@endsection