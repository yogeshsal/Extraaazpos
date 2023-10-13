@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->

<!-- Include jQuery (required for Bootstrap Switch) -->

<!-- Include Bootstrap Switch JS -->
<style>
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

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f5f5f5;
        color: #646464;
        font-weight: 900;
        font-size: small;
    }

    tr {
        border-bottom: 2px solid #F5F5F5;
        /* Light grey border between rows */
    }

    .btn.btn-outline-secondary {
        border-color: #6c757d;
        /* Set the default border color */
    }

    .btn.btn-outline-secondary:hover {
        border-color: orange;
        /* Change the border color to orange on hover */
        background-color: transparent;
        color: orange;
    }

    .page-content{
        height:100vh;
    }
</style>

<br>

<div class="main-content">

    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Taxes</h3>
                    <p class="text-muted">Taxes paid on purchase of raw materials.</p>
                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i class="bi bi-question-circle"></i> Help</button>
                        <div class="search-box ms-2">
                                                <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                                                <i class="ri-search-line search-icon "></i>
                                            </div>&nbsp;&nbsp;


                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i> Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#TaxModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Tax Rate</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th> </th>
                        <th>NAME</th>
                        <th>ITEMS</th>
                        <th>LOCATIONS</th>
                        <th>UPDATED</th>
                    </tr>
                </thead>
                <tbody>
                                    
            <tr>                
                <td>
                </td>
                <td></td>
                <td></td>
                <td>
                <br>
               

                </td>
            </tr>
        
    </tbody>
</table>

        
    
    
</div>






<script>
    $(document).ready(function () {
        $('tr[data-toggle="modal"]').click(function () {
            var name = $(this).data('name');
            $('#modalTitle').text(name); // Update the modal title
        });
    });
</script>







<!-- Modal -->
<div class="modal fade modal-lg" id=" " tabindex="-1" role="dialog" aria-labelledby="TaxModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Tax Rate</h4>

                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="container">            
                <form action=" " method="POST">
                    @csrf

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tax_type">Type</label>
                                <select name="tax_type" id="tax_type" class="form-control" required >
                                    <option value="" disabled selected>Select Tax Type</option>                                         
                                    <option value="gst">GST</option>
                                    <option value="custom">Customn</option>
                                    <option value="purchasereceive">PurchaseReceive</option>                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tax_code">Tax Code</label>
                                <select name="tax_code" id="tax_code" class="form-control">  
                                    <option value="" disabled selected>Select Tax Code</option>                                  
                                    <option value="igst">IGST</option>
                                    <option value="sgst">SGST</option>
                                    <option value="cgst">CGST</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>                        
                    </div>

                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="applicable_on">Applicable On</label>
                                <select name="applicable_on" id="applicable_on" class="form-control" required>
                                    <option value="" disabled selected>Select Applicable On</option>                                         
                                    <option value="item_price">Item Price</option>
                                    <option value="charge">Charge</option>                                                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="tax_percentage">Tax Percentage:</label>
                                <input type="text" name="tax_percentage" class="form-control" required>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="applicable_modes">Applicable Modes</label>
                                <select name="applicable_modes" id="applicable_modes" class="form-control" required>
                                    <option value="" disabled selected>Select Applicable Modes</option>                                         
                                    <option value="online">Online</option>
                                    <option value="in_store">In Store</option>                                                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Save</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>


<!-- edit modal -->


<!-- edit modal -->

<script>
    $(document).ready(function () {
        $('#is_recommended').bootstrapSwitch();
        $('#is_package_good').bootstrapSwitch();
        $('#sell_by_weight').bootstrapSwitch();
    });
</script>

@endsection