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
        <h3>Items</h3>
        <div>
            <button type="button" class="btn btn-outline-secondary">Filters</button>
            <a href="" class="btn btn-orange" data-toggle="modal" data-target="#add_item_modal">+ Add Item</a>            
        </div>
    </div>
    
    <table id="data-table">
    <thead>
        <tr > 
            <th class="grey-background">NAME</th>
            <th class="grey-background">ASSOCIATED LOCATIONS</th>
            <th class="grey-background">CATEGORY</th>
            <th class="grey-background">SALES PRICE (LKR)</th>
            <th class="grey-background">UPDATED</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $data)
            <tr>           
                <td>
                @if ($data->item_image)
                    <!-- <img src="{{ asset('storage/' . $data->item_image) }}" alt="Image"> -->
                    <img src="{{ asset('storage/'.  $data->item_image) }}" alt="Image" class="table-image">
                    @else
                        No Image
                    @endif
                <a href="{{ route('items.edit', ['id' => $data->id]) }}">{{ $data->item_name }}</a>
                </td>
               <td>{{$data->item_pos_code}}</td>                   
               <td>{{$category_name}}</td>     
               <td>{{$data->item_default_sell_price}} <br> <del>{{$data->item_markup_price}}</del></td>
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
                                    <option value="vegetarian">Vegetarian</option>
                                    <option value="non_vegetarian">Non Vegetarian</option>
                                    <option value="eggetarian">Eggetarian</option>                                    
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