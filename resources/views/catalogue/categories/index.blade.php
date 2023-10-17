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

.page-content {
    height: 100vh;
}
</style>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="main-content">
    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Catagories</h3>
                </div>
                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i
                                class="bi bi-question-circle"></i> Help</button>
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>&nbsp;&nbsp;
                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i>
                            Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal"
                            data-bs-target="#add_category">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> Add Category</button>
                    </div>
                </div>
            </div>
            <table id="dataTable">
                <thead>
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <div class="card">
                        @foreach($categories as $category)
                        <tr>
                            <td class="left-align">
                                <div style="display: flex; align-items: center;">
                                    <!-- Use flexbox to align image and text -->
                                    @if ($category->cat_image)
                                    <img src="{{ asset('storage/'.$category->cat_image) }}" alt="Image"
                                        class="table-image" style="height:100px; width:100px;">
                                    @else
                                    <img src="{{ asset('storage/item_images/placeholder.png') }}"
                                        alt="Placeholder Image" class="table-image" style="height:100px; width:100px;">
                                    @endif
                                    <div style="margin-left: 10px;">
                                        <!-- Add margin for spacing between image and text -->
                                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}">
                                            {{$category->cat_name}}
                                        </a><br>
                                        <p>Handle: {{$category->cat_handle}}</p>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $category->items->count() }} items
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
<div class="noresult" style="display: none">
    <div class="text-center">
        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
        <h5 class="mt-2">Sorry! No Result Found</h5>
        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
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

<div class="modal fade modal-lg" id="add_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Category</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" name="cat_name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mobile">Short Name:</label>
                                                    <input type="text" name="cat_short_name" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category">Handle</label>
                                                    <input type="text" name="cat_handle" class="form-control" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">Sort Category</label>
                                                    <input type="text" name="cat_sort_category" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="external_id">External ID</label>
                                                    <input type="text" name="cat_external_id" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timing_group">Timing Group</label><br>
                                                    <select name="timing_group" class="form-select mb-3">
                                                        @foreach ($timing as $time)
                                                        <option value="{{$time->id}}">{{$time->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-row">
                                            <div class="form-group">
                                                <label for="cat_desc">Description</label>
                                                <textarea name="cat_desc" class="form-control mt-3"
                                                    id="exampleFormControlTextarea1" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-orange">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
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







<script>
$(document).ready(function() {
    $('tr[data-toggle="modal"]').click(function() {
        var name = $(this).data('name');
        $('#modalTitle').text(name); // Update the modal title
    });
});
</script>







<!-- Modal -->
<div class="modal fade modal-fullscreen" id="add_item_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create New Category</h4>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('items.store') }}" method="POST">
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

                                        <option value=" "></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">POS Code</label>
                                    <select name="item_pos_code" id="pos_code" class="form-control">
                                        <option value="" disabled selected>Select POS</option>
                                        <option value=""></option>

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

                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_recommended">Is Recommended</label><br>
                                    <input type="checkbox" id="item_is_recommended" name="item_is_recommended"
                                        data-toggle="switch" data-on-text="Yes" data-off-text="No">
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_package_good">Is Package Good</label><br>
                                    <input type="checkbox" id="item_is_package_good" name="item_is_package_good"
                                        data-toggle="switch" data-on-text="Yes" data-off-text="No">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="is_recommended">Sell by Weight</label><br>
                                    <input type="checkbox" id="item_sell_by_weight" name="item_sell_by_weight"
                                        data-toggle="switch" data-on-text="Yes" data-off-text="No">
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
                                <textarea name="item_description" class="form-control mt-3"
                                    id="exampleFormControlTextarea1" rows="4"></textarea>
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