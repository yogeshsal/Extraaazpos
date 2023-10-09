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
            <h3>Brands</h3>
            <p>Manage all your cloud kitchen brands from here.</p>
        </div>
        
        
        <div class="d-flex align-items-center">
            
            <div class="input-group mr-2">
                
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-secondary m-1"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filters</button>           
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal">+ Add Brands</a>
            </div>        
        </div>       
    </div> 

    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">LOCATIONS</th>
            <th class="grey-background">Updated</th>
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            
        </tr>
    </thead>
    <tbody>
    
            <tr>           
                <td>
                
                </td> 
                <td>              
                
                </td>
                <td>                              
                </td>
               <td></td>                   
               <td></td>   
               <td></del></td>
                <td></td>
            </tr>
        
    </tbody>
</table>
</div>
<div class="modal fade modal-md" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Brand</h4>    
                
                <hr>            
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action=" " method="POST">
                    

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name<span class="red-asterisk">*</span></span></label>
                                <input type="text" name="item_name" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mt-3">
    <label for="logo">Logo:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="logo" accept=".jpg, .png, .jpeg" required>
           
        </div>
        
    </div>
    <small class="text-muted">Default value: max 2MB</small>
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