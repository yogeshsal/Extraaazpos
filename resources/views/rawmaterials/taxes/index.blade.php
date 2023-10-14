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
    .asterisk{
        color:red;
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
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#taxModal">
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
<div class="modal fade modal-lg" id="taxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('catalogue.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Type<span class="asterisk">*</span></label>
                                    <select class="form-select" name="type" aria-label="Default select example">

                                    <option value="1">GST</option>
                                    <option value="2">Custom</option>
                                    <option value="2">PurchaseReceive</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tax Code</label>
                                    <select class="form-select" name="tax_code" aria-label="Default select example">

                                        <option value="1">IGST</option>
                                        <option value="2">SGST</option>
                                        <option value="3">CGST</option>



                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description	">Name<span class="asterisk">*</span></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mt-3">
                            <label for="description	">Description:</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Applicable On<span class="asterisk">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="applicable_on">

                                        <option value="Item Price">Item Price</option>
                                        <option value="Charge">Charge</option>
                                       

                                    </select>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <label for="mobile">Tax Percentage<span class="asterisk">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">%</span>
                                    </div>
                                    <input type="text" class="form-control" name="amount_per_quantity">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Applicable modes<span class="asterisk">*</span></label>
                                    <select class="form-select" name="applicable_modes">

                                        <option value="1">Online</option>
                                        <option value="2">In store</option>


                                    </select>
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

<

<script>
    $(document).ready(function () {
        $('#is_recommended').bootstrapSwitch();
        $('#is_package_good').bootstrapSwitch();
        $('#sell_by_weight').bootstrapSwitch();
    });
</script>

@endsection