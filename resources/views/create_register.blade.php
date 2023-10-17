@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- <p>Welcome, {{ auth()->user()->name }}</p> -->
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <h2>Opening register for {{ auth()->user()->name }} at {{isset($locationname)? $locationname : ''}}</h2>
            <div class="card shadow" style="width: 100%;">
                <div class="row">
                    <form action="{{ route('storeRegister') }}" method="post">
                        @csrf
                        <div class="row p-4">
                            <div class="col">
                                <span>Opening Cash Amount</span>
                                <input name="opening_cash" type="text" class="form-control"
                                    placeholder="Opening Cash Amount" value="0">
                            </div>
                            <div class="col">
                                <span>Opening Card Amount</span>
                                <input name="opening_card" type="text" class="form-control"
                                    placeholder="Opening Card Amount" value="0">
                            </div>
                        </div>
                        <div class="row p-4">
                            <div class="col">
                                <span>Opening Credit Amount</span>
                                <input name="opening_credit" type="text" class="form-control"
                                    placeholder="Opening Credit Amount" value="0">
                            </div>
                            <div class="col">
                                <span>Opening UPI Amount</span>
                                <input name="opening_upi" type="text" class="form-control"
                                    placeholder="Opening UPI Amount" value="0">
                            </div>
                            <input name="loc_id" type="text" class="form-control" hidden
                                value="{{ isset($loc_id) ? $loc_id : '' }}">
                            <input name="locationname" type="text" class="form-control" hidden
                                value="{{isset($locationname)? $locationname : ''}}">
                        </div>
                        <div class="p-4">

                            <button type="submit" class="btn btn-orange">View Register</button>
                            <button type="button" class="btn btn-outline-primary ml-2">Choose Another Register</button>
                            <!-- <button class="btn btn-info m-3">Choose Another Register</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection