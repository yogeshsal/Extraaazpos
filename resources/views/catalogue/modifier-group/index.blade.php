@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->
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


<div class="main-content">

    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Modifier Groups</h3>
                    <p class="text-muted">Modifier Groups allow customers to customize items.</p>
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
                            data-bs-target="#chargesModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Modifier Group</button>
                    </div>

                </div>
            </div>


            <table id="dataTable">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>ASSOCIATED ITEMS</th>
                        <th>MODIFIERS</th>
                        <th>UPDATED</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                        <td><a
                                href="{{ route('modifiergroups.edit', ['id' => $data->id]) }}">{{$data->modifier_group_name}}</a><br>Handle
                            : {{$data->modifier_group_handle}}</td>
                        <td>{{$data->modifier_group_type}}</td>
                        <td> </td>
                        <td> </td>
                        <td>{{ $data->updated_at ->format('d M, Y - h:i A') }} <br>By {{$user_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
        <div class="modal fade modal-lg" id="chargesModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Create New Modifier Group</h4>

                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('modifiergroups.store') }}" method="POST">
                                @csrf

                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p>Select modifier group type</p>
                                            <p><b>Add-On:</b> More than one modifiers can be selected with the item (Eg:
                                                Pizza Toppings)</p>
                                            <p><b>Variant:</b> Only one modifier can be selected with the item (Eg: Size
                                                of Pizza)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="form-group">
                                            <label for="modifier_group_type">Modifier Group Type</label>
                                            <select name="modifier_group_type" id="modifier_group_type"
                                                class="form-control">
                                                <option value="" disabled selected>Select Type</option>
                                                @foreach ($modifiergrouptype as $modifiergroupId =>
                                                $modifiergrouptypeName)
                                                <option value="{{ $modifiergroupId }}">{{ $modifiergrouptypeName }}
                                                </option>
                                                @endforeach -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Min Selectable <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="item_default_sell_price"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Max Selectable <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="item_default_sell_price"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>


                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title<span class="text-danger">*</span></label>
                                            <input type="text" name="modifier_group_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Short Name</label>
                                            <input type="text" name="modifier_group_short_name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Handle</label>
                                            <input type="text" name="modifier_group_handle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Sort Order<span class="text-danger">*</span></label>
                                            <input type="text" name="modifier_sort_order" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">External Id</label>
                                            <input type="text" name="modifier_external_id" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="form-group">
                                        <label for="modifier_group_handle">Description</label>
                                        <textarea name="modifier_group_desc" class="form-control mt-3"
                                            id="exampleFormControlTextarea1" rows="4"></textarea>
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
                    td = tr[i].getElementsByTagName("td")[0]; // Change the index to match the column you want to search
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