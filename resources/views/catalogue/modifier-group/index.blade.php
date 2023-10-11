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


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Modifier Group</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> -->
                                <li class="breadcrumb-item active">Modifier Group</li>
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
                                            <button type="button" class="btn btn-orange  add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> New Modifier Group</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap data-table" id="data-table">
                                        <thead class="table-light">
                                            <tr>
                                            <th class="grey-background">NAME</th>
            <th class="grey-background">TYPE</th>
            <th class="grey-background">ASSOCIATED ITEMS</th>
            <th class="grey-background">MODIFIERS</th>
            <th class="grey-background">UPDATED</th>
   
    </thead>
    <tbody>
    @foreach($data as $data)
            <tr>           
                <td><a href="{{ route('modifiergroups.edit', ['id' => $data->id]) }}">{{$data->modifier_group_name}}</a><br>Handle : {{$data->modifier_group_handle}}</td>
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
    $(document).ready(function () {
        $('tr[data-toggle="modal"]').click(function () {
            var name = $(this).data('name');
            $('#modalTitle').text(name); // Update the modal title
        });
    });
</script>







<!-- Modal -->
<div class="modal fade modal-lg" id="add_modifier_group_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create New Modifier Group</h4>                
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
                              <p><b>Add-On:</b> More than one modifiers can be selected with the item (Eg: Pizza Toppings)</p>
                              <p><b>Variant:</b> Only one modifier can be selected with the item (Eg: Size of Pizza)</p>
                            </div>
                        </div>                       
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                            <label for="modifier_group_type">Modifier Group Type</label>
                                <select name="modifier_group_type" id="modifier_group_type" class="form-control">
                                    <option value="" disabled selected>Select Type</option>
                                    @foreach ($modifiergrouptype as $modifiergroupId => $modifiergrouptypeName)
                                        <option value="{{ $modifiergroupId }}">{{ $modifiergrouptypeName }}</option>
                                    @endforeach                                                   -->
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
                                        <label for="name">Min Selectable <span class="text-danger">*</span></label>
                                        <input type="text" name="item_default_sell_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Max Selectable <span class="text-danger">*</span></label>
                                        <input type="text" name="item_default_sell_price" class="form-control">
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
                        <div class="form-group">
                            <label for="modifier_group_handle">Description</label>
                            <textarea name="modifier_group_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4"></textarea>
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
    $(document).ready(function () {
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