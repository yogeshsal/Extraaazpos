@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<style>
    .grey-background {
        background-color: grey;
    }
    .circle {
        width: 30px;
        height: 30px;
        background-color: grey;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5; /* Light grey border between rows */
    }
    .btn.btn-outline-secondary {
        border-color: #6c757d; /* Set the default border color */
    }

    .btn.btn-outline-secondary:hover {
        border-color: orange; /* Change the border color to orange on hover */
        background-color: transparent;
        color:orange;
    }
</style>

<br>
<div class="card shadow">
<div class="card-body d-flex justify-content-between align-items-center">
    <h3>Charges</h3>
   
    <div class="d-flex align-items-center">
        <div class="input-group mr-2">
            <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
            <!-- <button type="button" class="btn btn-outline-primary m-1">Search</button> -->
            <button type="button" class="btn btn-outline-secondary m-1">Filters</button>
        <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#exampleModal">+ New Charge</a>
        </div>
        
    </div>
</div>

   
    <table id="dataTable">
    <thead>
        <tr >
            <th class="grey-background">NAME</th>
            <th class="grey-background">ITEMS</th>
            <th class="grey-background">LOCATIONS</th>
            <th class="grey-background">UPDATED</th>
          
            <th class="grey-background">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $c)
       <tr>
       <td>{{ $c->name }}
        <br>
        LKR {{$c->amount_per_quantity}} on {{$c->applicable_on}}
       </td>
       <td>items</td>
       <td>location</td>
       <td>{{ $c->updated_at }}</td>
       <td><a href="/catalogue/{{ $c->id }}/edit"><button type="button" class="btn btn-outline-secondary">Edit Charge</button></a>
       

       </tr>
          @endforeach
    </tbody>
</table>
</div>



<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Charge</h4>
                
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
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
    </div>
</div>

@endsection