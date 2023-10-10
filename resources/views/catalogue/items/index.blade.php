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

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5;
        /* Light grey border between rows */
    }

    table tr:hover {
        background-color: #b8b8b8;
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

    .form-row {
        margin-bottom: 20px;
        /* Add space below each row */
    }
</style>
<style>
    .table-image {
        width: 100px;
        /* Set the desired width */
        height: auto;
        /* Auto-adjust the height to maintain the aspect ratio */
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        /* Adjust the margin as needed */
    }
</style>
<br>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Items</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> -->
                                <li class="breadcrumb-item active">Items</li>
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
                                    <div class="col-sm-auto">
                                        <div>
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table id="data-table">
                                        <thead>
                                            <tr>
                                                <th class="grey-background"></th>
                                                <th class="grey-background"></th>
                                                <th class="grey-background">NAME</th>
                                                <th class="grey-background">ASSOCIATED LOCATIONS</th>
                                                <th class="grey-background">CATEGORY</th>
                                                <th class="grey-background">SALES PRICE (INR)</th>
                                                <th class="grey-background">UPDATED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>
                                                    @if ($item->item_image)
                                                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="Image" class="table-image" width="20" height="20">
                                                    @else
                                                    <img src="{{ asset('storage/item_images/placeholder.png') }}" alt="Placeholder Image" class="table-image">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->item_food_type === 'Vegetarian')
                                                    <img src="{{ asset('storage/veg.png') }}" alt="Vegetarian Logo">
                                                    @elseif ($item->item_food_type === 'Non Vegetarian')
                                                    <img src="{{ asset('storage/nonveg.png') }}" alt="Non-Vegetarian Logo">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('items.edit', ['id' => $item->id]) }}">{{ $item->item_name }}</a>
                                                </td>
                                                <td>{{$item->item_pos_code}}</td>
                                                <td>{{ optional($item->category)->cat_name }}</td>
                                                <td>{{$item->item_default_sell_price}} <br> <del>{{$item->item_markup_price}}</del></td>
                                                <td>{{ $item->updated_at ->format('d M, Y - h:i A') }} <br>By {{$user_name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->


            <!-- end row -->

            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form class="tablelist-form">
                            <div class="modal-body">

                                <div class="mb-3" id="modal-id" style="display: none;">
                                    <label for="id-field" class="form-label">ID</label>
                                    <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                                </div>

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Customer Name</label>
                                    <input type="text" id="customername-field" class="form-control" placeholder="Enter Name" required />
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" id="email-field" class="form-control" placeholder="Enter Email" required />
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Phone</label>
                                    <input type="text" id="phone-field" class="form-control" placeholder="Enter Phone no." required />
                                </div>

                                <div class="mb-3">
                                    <label for="date-field" class="form-label">Joining Date</label>
                                    <input type="text" id="date-field" class="form-control" placeholder="Select Date" required />
                                </div>

                                <div>
                                    <label for="status-field" class="form-label">Status</label>
                                    <select class="form-control" data-trigger name="status-field" id="status-field">
                                        <option value="">Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Block">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you Sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hybrix.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Items</h3>
        <div class="d-flex align-items-center">
            <div class="input-group mr-2">
                <button type="button" class="btn btn-outline-secondary m-1">
                    <i class="fa fa-question-circle" aria-hidden="true"></i> Help
                </button>
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-secondary m-1"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filters</button>
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal">+ Add Item</a>
            </div>
        </div>
    </div>

    <table id="data-table">
        <thead>
            <tr>
                <th class="grey-background"></th>
                <th class="grey-background"></th>
                <th class="grey-background">NAME</th>
                <th class="grey-background">ASSOCIATED LOCATIONS</th>
                <th class="grey-background">CATEGORY</th>
                <th class="grey-background">SALES PRICE (INR)</th>
                <th class="grey-background">UPDATED</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>
                    @if ($item->item_image)
                    <img src="{{ asset('storage/' . $item->item_image) }}" alt="Image" class="table-image" width="20" height="20">
                    @else
                    <img src="{{ asset('storage/item_images/placeholder.png') }}" alt="Placeholder Image" class="table-image">
                    @endif
                </td>
                <td>
                    @if ($item->item_food_type === 'Vegetarian')
                    <img src="{{ asset('storage/veg.png') }}" alt="Vegetarian Logo">
                    @elseif ($item->item_food_type === 'Non Vegetarian')
                    <img src="{{ asset('storage/nonveg.png') }}" alt="Non-Vegetarian Logo">
                    @endif
                </td>
                <td>
                    <a href="{{ route('items.edit', ['id' => $item->id]) }}">{{ $item->item_name }}</a>
                </td>
                <td>{{$item->item_pos_code}}</td>
                <td>{{ optional($item->category)->cat_name }}</td>
                <td>{{$item->item_default_sell_price}} <br> <del>{{$item->item_markup_price}}</del></td>
                <td>{{ $item->updated_at ->format('d M, Y - h:i A') }} <br>By {{$user_name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $data->links() }}
    </div>


</div>






<script>
    $(document).ready(function() {
        $('tr[data-toggle="modal"]').click(function() {
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
                <h4 class="modal-title" id="exampleModalLabel">Create New Item</h4>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="item_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">Short Name:</label>
                                    <input type="text" name="item_short_name" class="form-control" required>
                                </div>
                            </div>
                        </div>


                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="item_category_id" id="category" class="form-control">
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach ($categories as $categoryId => $categoryName)
                                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">POS Code</label>
                                    <select name="item_pos_code" id="pos_code" class="form-control">
                                        <option value="" disabled selected>Select POS</option>
                                        @foreach ($locations as $locationId => $locationName)
                                        <option value="{{ $locationId }}">{{ $locationName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="food_type">Food Type</label>
                                    <select name="item_food_type" id="food_type" class="form-control">
                                        <option value="" disabled selected>Select Food Type</option>
                                        @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                        <option value="{{ $foodtypeId }}">{{ $foodtypeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_recommended">Is Recommended</label><br>
                                    <input type="checkbox" id="item_is_recommended" name="item_is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_package_good">Is Package Good</label><br>
                                    <input type="checkbox" id="item_is_package_good" name="item_is_package_good" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_recommended">Sell by Weight</label><br>
                                    <input type="checkbox" id="item_sell_by_weight" name="item_sell_by_weight" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Default Sales Price:</label>
                                    <input type="text" name="item_default_sell_price" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="name">Markup Price (Optional):</label>
                                        <input type="text" name="item_markup_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="form-group">
                                <label for="item_description">Description</label>
                                <textarea name="item_description" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4"></textarea>
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


    <!-- edit modal -->


    <!-- edit modal -->

    <script>
        $(document).ready(function() {
            $('#item_is_recommended').bootstrapSwitch();
            $('#item_is_package_good').bootstrapSwitch();
            $('#item_sell_by_weight').bootstrapSwitch();
        });
    </script>


    <script>
        // Function to filter the table based on user input
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("data-table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Change the index to match the column you want to search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        // Add an event listener to the search input
        document.getElementById("searchInput").addEventListener("keyup", filterTable);
    </script>

    @endsection