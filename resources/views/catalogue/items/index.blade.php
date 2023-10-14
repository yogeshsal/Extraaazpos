@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

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
        font-weight: 950;
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

    .page-content {
        height: 100vh;
    }
</style>

<div class="main-content">

    <div class="page-content">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">ITEMS</h3>
                    <p class="text-muted">Central repository for all your menu items</p>
                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i class="bi bi-question-circle"></i> Help</button>
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>&nbsp;&nbsp;
                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i>
                            Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#itemModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Item</button>
                    </div>

                </div>
            </div>

            <!-- end page title -->



            <table id="data-table">
                <thead>
                    <tr>
                        <th>
                        <th>
                        <th class="grey-background sort " data-sort="customer_name">NAME</th>
                        <th>ASSOCIATED LOCATIONS</th>
                        <th>CATEGORY</th>
                        <th>SALES PRICE ($) </th>
                        <th>UPDATED</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $item)
                    <tr>
                        <td>
                            @if (isset($item->item_image))
                            <img src="{{ asset('storage/' . $item->item_image) }}" alt="Image" class="table-image" width="100px" height="100px">
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
                        <td class="customer_name">
                            <a href="{{ route('items.edit', ['id' => $item->id]) }}">{{ $item->item_name }}</a>
                        </td>
                        <td class="location">{{$item->item_pos_code}}</td>
                        <td class="category">{{ optional($item->category)->cat_name }}</td>
                        <td class="salesprice">{{$item->item_default_sell_price}} <br>
                            <del>{{$item->item_markup_price}}</del>
                        </td>
                        <td class="update">{{ $item->updated_at ->format('d M, Y - h:i A') }} <br>By {{$user_name}}</td>
                    </tr>
                    @endforeach


                </tbody>
            </table><br>
            <div style="display: flex; justify-content: center;">
                {{ $data->links() }}
            </div>

            <div class="noresult" style="display: none">
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you
                        search.</p>
                </div>
            </div>
        </div>

        <!-- <div class="d-flex justify-content-end">
            <div class="pagination-wrap hstack gap-2">
                <a class="page-item pagination-prev disabled" href="#">
                    Previous
                </a>
                <ul class="pagination listjs-pagination mb-0"></ul>
                <a class="page-item pagination-next" href="#">
                    Next
                </a>
            </div>
        </div> -->
    </div>
</div><!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end col -->
</div>
<!-- end row -->


<!-- end row -->
<div class="modal fade modal-lg" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Charge</h4>

                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="card">
                                <!-- <div class="card-header">
                                            <h4 class="card-title mb-0">Form Grid</h4>
                                        </div> -->
                                <!-- end card header -->

                                <div class="card-body">


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
                                                <select name="item_category_id" id="category" class="form-select mb-3">
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
                                                <select name="item_pos_code" id="pos_code" class="form-select mb-3">
                                                    <option value="" disabled selected>Select POS</option>
                                                    @foreach ($locations as $locationId => $locationName)
                                                    <option value="{{ $locationId }}">{{ $locationName }}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <select name="item_pos_code" id="pos_code" class="form-control">
                                                            <option value="" disabled selected>Select POS</option>
                                                            @foreach ($locations as $locationId => $locationName)
                                                            <option value="{{ $locationId }}">{{ $locationName }}</option>
                                                            @endforeach
                                                        </select> -->
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="food_type">Food Type</label>
                                                <select name="item_food_type" id="food_type" class="form-select mb-3">
                                                    <option value="" disabled selected>Select Food Type</option>
                                                    @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                                    <option value="{{ $foodtypeId }}">{{ $foodtypeName }}</option>
                                                    @endforeach
                                                </select>
                                                <!-- <select name="item_food_type" id="food_type" class="form-control">
                                                            <option value="" disabled selected>Select Food Type</option>
                                                            @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                                            <option value="{{ $foodtypeId }}">{{ $foodtypeName }}</option>
                                                            @endforeach
                                                        </select> -->
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-orange">Create</button>
                                    </div>
                                    <!--end row-->

                                </div>

                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>

        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"> Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form action="{{ route('items.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <!-- <div class="card-header">
                                            <h4 class="card-title mb-0">Form Grid</h4>
                                        </div> -->
                                    <!-- end card header -->

                                    <div class="card-body">


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
                                                    <select name="item_category_id" id="category" class="form-select mb-3">
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
                                                    <select name="item_pos_code" id="pos_code" class="form-select mb-3">
                                                        <option value="" disabled selected>Select POS</option>
                                                        @foreach ($locations as $locationId => $locationName)
                                                        <option value="{{ $locationId }}">{{ $locationName }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <select name="item_pos_code" id="pos_code" class="form-control">
                                                            <option value="" disabled selected>Select POS</option>
                                                            @foreach ($locations as $locationId => $locationName)
                                                            <option value="{{ $locationId }}">{{ $locationName }}</option>
                                                            @endforeach
                                                        </select> -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="food_type">Food Type</label>
                                                    <select name="item_food_type" id="food_type" class="form-select mb-3">
                                                        <option value="" disabled selected>Select Food Type</option>
                                                        @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                                        <option value="{{ $foodtypeId }}">{{ $foodtypeName }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- <select name="item_food_type" id="food_type" class="form-control">
                                                            <option value="" disabled selected>Select Food Type</option>
                                                            @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                                            <option value="{{ $foodtypeId }}">{{ $foodtypeName }}</option>
                                                            @endforeach
                                                        </select> -->
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
                                        <!--end row-->

                                    </div>

                                </div>
                            </div> <!-- end col -->


                        </div>


                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->

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
            console.log("hitting!!!");
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