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
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Modifier Groups</h3>
        <div>
            <button type="button" class="btn btn-outline-secondary">Filters</button>
            <a href="" class="btn btn-orange" data-toggle="modal" data-target="#add_modifier_group_modal">+ New Modifier Group</a>            
        </div>
    </div>
    
    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background">NAME</th>
            <th class="grey-background">TYPE</th>
            <th class="grey-background">ASSOCIATED ITEMS</th>
            <th class="grey-background">MODIFIERS</th>
            <th class="grey-background">UPDATED</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $data)
            <tr>           
                <td><a href="{{ route('modifiergroups.edit', ['id' => $data->id]) }}">{{$data->modifier_group_name}}</a><br>Handle : {{$data->modifier_group_handle}}</td>
                <td>{{$data->modifier_group_type}}</td>                   
               <td></td>     
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
                                    <option value="add_on">Add On</option>
                                    <option value="variant">Variant</option>                                                                        
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



<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-table tbody').on('click', 'tr', function() {
            // Get the ID from the clicked row's data attribute
            var id = $(this).data('id');
            console.log(id);
            // Send the ID to the controller using AJAX
            $.ajax({
                type: 'GET',
                url: '/edit/' + id, // Replace with your controller route
                success: function(response) {
                    // Handle the response from the controller (e.g., display a modal)
                    console.log('Row ID ' + id + ' sent to the controller.');
                    var item = response.item;
                    $('#title').val(item.title);


                    // Show the modal
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error sending ID to the controller: ' + error);
                }
            });
        }); -->




        

    });
</script>

@endsection