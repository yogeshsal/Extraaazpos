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
    .asterisk{
        color:red;
    }
</style>

<br>

<div class="main-content">

    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Categories</h3>
                    <p class="text-muted">Categories used for Raw Materials</p>
                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <div class="search-box ms-2">
                                                <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                                                <i class="ri-search-line search-icon "></i>
                                            </div>&nbsp;&nbsp;


                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i> Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#categoryModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Category</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th> </th>
                        <th>NAME</th>
                        <th>MATERIAL ITEMS</th>
                        <th> </th>
                        
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
<div class="modal fade modal-lg" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">New Category</h4>

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
                            <label for="name">Name<span class="asterisk">*</span></label>
                            <input type="text" name=" " class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="sort_order">Sort Order</label>
                            <input type="text" name=" " class="form-control" required>
                            </div>
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