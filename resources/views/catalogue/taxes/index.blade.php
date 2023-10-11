@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->

<!-- Include jQuery (required for Bootstrap Switch) -->

<!-- Include Bootstrap Switch JS -->
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
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tax Rates</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> -->
                                <li class="breadcrumb-item active">Tax Rates</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                        </div> -->
                        <!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <!-- <div class="col-sm-auto">
                                        <div>
                                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        </div>
                                    </div> -->
                                    <div class="col-sm">

                                        <div class="d-flex justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-secondary">Help</button>&nbsp;&nbsp;
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-outline-secondary ml-1">Filter</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-orange  add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i>+New Tax Rate</button>

                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap data-table" id="data-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="grey-background"></th>
                                                <th class="grey-background"></th>
                                                <th class="grey-background sort " data-sort="customer_name">NAME</th>
                                                <th class="grey-background sort " data-sort="item">ITEMS</th>
                                                <th class="grey-background sort " data-sort="location">LOCATIONS</th>
                                                <th class="grey-background sort " data-sort="update">UPDATED</th>

                                                <!-- <th class="sort" data-sort="customer_name">Customer</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="phone">Phone</th>
                                                <th class="sort" data-sort="date">Joining Date</th>
                                                <th class="sort" data-sort="status">Delivery Status</th>
                                                <th class="sort" data-sort="action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach ($data as $data)
            <tr>                
                <td><a href="{{ route('taxes.edit', ['id' => $data->id]) }}">{{ $data->name }}</a>
                <br>
                {{$data->tax_percentage}} % on {{ $data->applicable_on }}
                </td>
                <td></td>
                <td></td>
                <td>{{ $data->updated_at ->format('d M, Y - h:i A') }}
                <br>
                By {{$data->user_name}}

                </td>
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