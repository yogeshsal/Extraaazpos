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
    <h3>Edit Charge</h3>
    <form action="{{ route('catalogue.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Charge Type:</label>
                                <select class="form-select" name="charge_type" aria-label="Default select example">
                                    
                                    <option value="1">Packaging Charge</option>
                                    <option value="2">Delivery Charge</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="description	">Description:</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    
                    <div class="row mt-3">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Applicable On:</label>
                                <select class="form-select" aria-label="Default select example"name="applicable_on">
                                   
                                    <option value="Order Sub Total(%)">Order Sub Total(%)</option>
                                    <option value="Order Sub Total(Fixed)">Order Sub Total(Fixed)</option>
                                    <option value="Item Quantity">Item Quantity</option>
                                    
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                        <label for="mobile">Amount per Quantity:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="">LKR</span>
                                </div>
                                <input type="text" class="form-control" name="amount_per_quantity">
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Applicable modes:</label>
                                <select class="form-select" name="applicable_modes">
                                   
                                    <option value="1">Online</option>
                                    <option value="2">In store</option>
                                   
                                    
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Auto Apply Billing Type:</label>
                                <select class="form-select" name="auto_apply_billing_types">
                                   
                                    <option value="1">AC Table</option>
                                    <option value="2">Inside Section</option>
                                    <option value="2">Pool Section</option>
                                    <option value="2">Dine In</option>
                                   
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Save</button>
                    </div>
                </form>
  
</div>
</div>
@endsection