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
</style>
<br>
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Taxes</h3>
        <div>
            <button type="button" class="btn btn-outline-secondary">Filters</button>
            <a href="" class="btn btn-orange" data-toggle="modal" data-target="#add_item_modal">+ New tax Rate</a>            
        </div>
    </div>
    
    <table id="data-table">
    <thead>
        <tr >
            <th class="grey-background">NAME</th>
            <th class="grey-background">ITEMS</th>
            <th class="grey-background">LOCATIONS</th>            
            <th class="grey-background">UPDATED</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($data as $data)
            <tr>                
                <td>{{ $data->name }}</td>
                <td></td>
                <td></td>
                <td>{{ $data->updated_at ->format('d M, Y - h:i A') }}</td>
            </tr>
        @endforeach
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
<div class="modal fade modal-lg" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Tax Rate</h4>                
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action="{{ route('taxes.store') }}" method="POST">
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


@endsection