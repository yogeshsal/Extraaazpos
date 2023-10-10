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
            <h3>Raw Materials</h3>
            <p>Materials which are purchased and used for recipes.</p>
        </div>
        
        
        <div class="d-flex align-items-center">
            
            <div class="input-group mr-2">
            <button type="button" class="btn btn-outline-secondary m-1">
                <i class="fa fa-question-circle" aria-hidden="true"></i> Help
                </button>
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-secondary m-1"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filters</button>           
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal">+ New Material</a>
            </div>        
        </div>       
    </div> 

    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">CATEGORY</th>
           
            <th class="grey-background">STANDERED COST PRICE</th>
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
                <div>
                <h4 class="modal-title" id="exampleModalLabel">New Product</h4> 
                <p>Basic Information</p>
</div>               
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action=" " method="POST">
                    

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Product Name<span class="red-asterisk">*</span></label>
                                <input type="text" name="item_name" class="form-control" required>
                            </div>
                        </div><br>
                        


                    <div class="row form-row">                        
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="category">Brand<span class="red-asterisk"></span></label>
                                <input type="text" name="brand" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="handle">Category</label>
                                <input type="text" name="handle" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row form-row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tax_number">Supplier</label>
                            <input type="text" name="item_name" class="form-control" required>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body d-flex justify-content-between align-items-center">
            <div>
            <h5>Product Locations</h5>
            <p>Locations that the product is available at.The product can only be sold at these locations and inventory can also only be added at this location for the product.You can add/disable locations for a product as required.</p>
            <br>
            <p>Cant see a location?Please ask your administrator to ensure you have permission to create products for that location</p>
        </div>
        </div>
                  
                    
        <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">Applicable</th>
           
            
            
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
<div>
                <h5 class="modal-title" id="exampleModalLabel">Unit of Measurement</h5> <br>
                
                <p>1. Base Unit:The unit for tracking inventory. This is the minimum amount you can sell at.</p>
                <p>2. Default Unit: The default unit to be chosen to show inventory in, sell and receive with.</p>
</div>              
                    
                        
<table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">SCALE</th>
            <th class="grey-background">TYPE</th>


           
            
            
        </tr>
    </thead>
    <tbody>
    
            <tr>           
                <td> </td>
                <td> </td>
                <td> </td>
            </tr>
        
    </tbody>
</table>
                    
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