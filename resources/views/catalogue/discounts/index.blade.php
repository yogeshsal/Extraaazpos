@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
    <h3>Customers</h3>
    <div class="d-flex align-items-center">
        <div class="input-group mr-2">
            <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
            <!-- <button type="button" class="btn btn-outline-primary m-1">Search</button> -->
            <button type="button" class="btn btn-outline-secondary m-1">Filters</button>
        <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#exampleModal">+ New Discount</a>
        </div>
        
    </div>
</div>

   
    <table id="dataTable">
    <thead>
        <tr>
           
            <th class="grey-background">NAME</th>
            <th class="grey-background">ITEMS</th>
            <th class="grey-background">LOCATIONS</th>
            <th class="grey-background">UPDATED</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{$d->discount_name}}
                <br>
                {{$d->discount_type}} Amount of ₹ {{$d->discount_value}} on item
            </td>
            <td>item</td>
            <td>location</td>
            <td>{{$d->updated_at}}</td>

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
                <h4 class="modal-title" id="exampleModalLabel">New Discount</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action="" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Disount Name</label>
                                <input type="text" name="discount_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">Applicable On:</label>
                            <select name="applicable_on" class="form-select" aria-label="Default select example" id="selectOption">
                                <option selected></option>
                                <option value="1">Bill Sub Total Amount</option>
                                <option value="2">Specific Items</option>
                                
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Discount Type</label>
                            <select name="discount_type" class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="Fixed">Fixed</option>
                                <option value="Percentage">Percentage</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="basic-url">Discount Value</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >₹</span>
                            </div>
                            <input name="discount_value"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Discription:</label>
                        <textarea name="desc" class="form-control" rows="3"></textarea>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                        <label for="basic-url">Maximum Discount Value</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">₹</span>
                            </div>
                            <input name="max_discount_value" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <label for="basic-url"id="dynamicLabel">Minimum Bill Sub Total Amount</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">₹</span>
                            </div>
                            <input name="min_total_amount" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                        <input type="checkbox" checked data-toggle="toggle" id="toggleButton">
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" id="textboxContainer">
                            <label for="name">Auto Apply Billing Type</label>
                            <select name="auto_apply_billing_type" class="form-select" aria-label="Default select example" id="textBox">
                                <option selected></option>
                                <option value="1">Ac Table</option>
                                <option value="2">Inside Section</option>
                                <option value="3">Pool Section</option>
                                <option value="4">Token</option>
                                <option value="5">Dine In</option>
                               
                                
                                </select>
                            </div>
                        </div>
                    </div>

        
                    <div class="col-md-6">
                         <div class="form-group" >
                            <label for="name">Authorised User Roles</label>
                            <select name="user_role" class="form-select" aria-label="Default select example" >
                                <option selected></option>
                                <option value="Fixed">All</option>
                                <option value="Fixed">Administrator</option>
                                <option value="Percentage">Cashier</option>
                                <option value="Percentage">Manager</option>
                                <option value="Percentage">Online Order Supervisor</option>
                                <option value="Percentage">Satellite -Tracker</option>
                                <option value="Percentage">Online order Processor</option>
                                <option value="Percentage">Billing User</option>
                                <option value="Percentage">Captain</option>
                                
                                </select>
                            </div>
                        </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Create</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>
<!-- edit modal -->
<script>
        $(document).ready(function () {
            // Initialize the toggle button
            $('#toggleButton').bootstrapToggle();

            // Function to handle toggle change event
            $('#toggleButton').change(function () {
                var isChecked = $(this).prop('checked');
                $('#textboxContainer').toggle(isChecked);
            });
        });



        $(document).ready(function () {
            $("#selectOption").change(function () {
                var selectedValue = $(this).val();
                var label = "";
                
                if (selectedValue === "1") {
                    label = "Minimum Bill Sub Total Amount";
                } else if (selectedValue === "2") {
                    label = "Minimum Item Total Amount";
                }

                // Update the label text
                $("#dynamicLabel").text(label);
            });
        });
    </script>


@endsection