@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
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
        
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5; /* Light grey border between rows */
    }
    table tr:hover {
    background-color: #b8b8b8; 
}
    .btn.btn-outline-secondary {
        border-color: #6c757d; /* Set the default border color */
    }

    .btn.btn-outline-secondary:hover {
        border-color: orange; /* Change the border color to orange on hover */
        background-color: transparent;
        color:orange;
    }
    .form-row {
        margin-bottom: 20px; /* Add space below each row */
    }
    .red-asterisk {
    color: red;
}



</style>
<style>
    .table-image {
        width: 100px; /* Set the desired width */
        height: auto; /* Auto-adjust the height to maintain the aspect ratio */
    }
</style>
<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
    <div>
            <h3>Taxes</h3>
            <p>Taxes paid on purchase of raw materials.</p>
        </div>
        
        
        <div class="d-flex align-items-center">
            
            <div class="input-group mr-2">
            
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-secondary m-1"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filters</button>           
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal">+ New Tax Rate</a>
            </div>        
        </div>       
    </div> 

    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">ITEMS</th>
           
            <th class="grey-background">LOCATION</th>
            <th class="grey-background">UPDATED</th>
            
        </tr>
    </thead>
    <tbody>
    
            <tr>           
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        
    </tbody>
</table>
</div>



<div class="modal fade modal-lg" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create New Item</h4>                
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action=" " method="POST">
                    

                  


                    <div class="row form-row">                        
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="category">Type<span class="red-asterisk">*</span></label>
                                <select name="item_category_id" id="category" class="form-control">
                                        <option value=" ">GST</option>
                                        <option value=" ">Custom</option>
                                        <option value=" ">Purchase Receive</option>

                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="handle">Tax Code</label>
                                <select name="tax_code" id="taxcode" class="form-control">
                                        <option value=" ">IGST</option>
                                        <option value=" ">SGST</option>
                                        <option value=" ">CGST</option>

                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name<span class="red-asterisk">*</span></label>
                                <input type="text" name="item_name" class="form-control" required>
                            </div>
                        </div><br>
                        
                      <div class="row form-row mt-3">
                        <div class="form-group">
                            <label for="description">Description<span class="red-asterisk"></span></label>
                            <textarea name="address" class="form-control mt-2" id="addressTextarea1" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row form-row">
    <div class="col-md-6 ">
        <div class="form-group mt-3">
            <label for="applicable">Applicable On<span class="red-asterisk">*</span></label>
            <div class="input-group mt-3">
                <div class="form-group input-group-prepend">
                <input type="text"class="form-control" placeholder="Item Price" readonly>

                </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="form-group mt-3">
            <label for="tax">Tax Percentage<span class="red-asterisk">*</span></label>
            <div class="input-group mt-3">
  <span class="input-group-text" id="basic-addon1">%</span>
  <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
</div>
            </div>
        </div>
    </div>
</div>

                    
                    <div class="modal-footer">
    <div class="ml-auto"> <!-- Use 'ml-auto' class to push the button to the left -->
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

        <button type="submit" class="btn btn-orange">Create Location</button>

    </div>
</div>


                </form>
            </div>
        </div>        
    </div>
</div>
    </div>
</div>
   
</div>




@endsection