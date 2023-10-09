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
        width: 100%;
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
        <h3>Print Template</h3>  
        <p>List of all print configurations</p>
</div>      
        <div class="d-flex align-items-center">
            <div class="input-group mr-2">
                
                
                
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal">+New Template</a>
            </div>        
        </div>       
    </div> 

    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background"></th>
            <th class="grey-background"></th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">ASSOCIATED LOCATIONS</th>
            <th class="grey-background">TYPE</th>
            <th class="grey-background">UPDATED</th>
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
               <td></td>
                <td></td>
            </tr>
       
    </tbody>
</table>
</div>





<div class="modal fade modal-lg" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 >Print Template</h4>
                
        <div class="modal-body"> 
            <div class="container">                
                <form action=" " method="POST">
                    

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Template Name<span class="red-asterisk">*</span></label>
                                <input type="text" name="item_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Template Type<span class="red-asterisk">*</span></label>
                                <select name="template" id="template" class="form-control">
                                    <option value="" disabled selected>In-Store Invoice</option>
                                        <option value=" ">In-Store KOT</option>
                                        <option value=" ">Purchase Order</option>
                                        <option value=" ">Online Invoice</option>
                                        <option value=" ">Online KOT</option>




                                    
                                </select>
                            </div>
                        </div>
                    </div>


                    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Create</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>



@endsection