@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<style>
     .text-danger {
        color: red;
    }
</style>
<br>
<div class="container">
<div class="card card shadow p-3">
    <h3>Edit Customer</h3>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $customer->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobile">Mobile<span class="text-danger">*</span></label>
                    <input type="text" id="mobile" name="mobile" class="form-control" value="{{ $customer->mobile }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_of_birth">Date of birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $customer->date_of_birth }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tax_number">Tax Number</label>
                    <input type="text" id="tax_number" name="tax_number" class="form-control" value="{{ $customer->tax_number }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="credit_limit">Credit Limit</label>
                    <input type="text" id="credit_limit" name="credit_limit" class="form-control" value="{{ $customer->credit_limit }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="note">Note</label>
            <textarea id="note" name="note" class="form-control">{{ $customer->note }}</textarea>
        </div>

        <!-- Add more form fields for editing other customer data -->

        <div class="form-group">
        <a href="/customers" class="btn btn-secondary m-2">Back</a>
            <button type="submit" class="btn btn-orange m-2">Update</button>
        </div>
    </form>
</div>
</div>
@endsection