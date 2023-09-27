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
<div class="card">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Items</h3>
        <div>
            <button type="button" class="btn btn-outline-secondary">Filters</button>
            <a href="" class="btn btn-orange" data-toggle="modal" data-target="#add_item_modal">+ Add Item</a>            
        </div>
    </div>
    
    <table>
    <thead>
        <tr >            
            <th class="grey-background">#</th>
            <th class="grey-background">NAME</th>
            <th class="grey-background">ASSOCIATED LOCATIONS</th>
            <th class="grey-background">CATEGORY</th>
            <th class="grey-background">SALES PRICE (LKR)</th>
            <th class="grey-background">UPDATED</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>
                {{ $data->title }}
                </td>
                <td>{{$location_name}}</td>
                <td>{{$category_name}}</td>
                <td>{{ $data->default_sales_price }}</td>                              
                <td>{{ $data->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>


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
                                <label for="name">Title:</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Short Name:</label>
                                <input type="text" name="short_name" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Handle:</label>
                                <input type="text" name="handle" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                    @foreach ($categories as $categoryId => $categoryName)
                                        <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">POS Code</label>
                                <select name="pos_code" id="pos_code" class="form-control">
                                    <option value="">Select POS</option>
                                    @foreach ($locations as $locationId => $locationName)
                                        <option value="{{ $locationId }}">{{ $locationName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="food_type">Food Type</label>
                                <select name="food_type" id="food_type" class="form-control">
                                    <option value="" disabled selected>Select Food Type</option>
                                    <option value="vegetarian">Vegetarian</option>
                                    <option value="non_vegetarian">Non Vegetarian</option>
                                    <option value="eggetarian">Eggetarian</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Sort Order:</label>
                                <input type="text" name="sort_order" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_recommended">Is Recommended</label><br>
                                <input type="checkbox" id="is_recommended" name="is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_recommended">Is Package Good</label><br>
                            <input type="checkbox" id="is_package_good" name="is_package_good" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_recommended">Sell by Weight</label><br>
                            <input type="checkbox" id="sell_by_weight" name="sell_by_weight" data-toggle="switch" data-on-text="Yes" data-off-text="No">
                        </div>
                    </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Default Sales Price:</label>
                                <input type="text" name="default_sales_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="name">Markup Price (Optional):</label>
                                <input type="text" name="markup_price" class="form-control">
                            </div>
                            </div>
                        </div>
                    </div> 

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Create</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#is_recommended').bootstrapSwitch();
        $('#is_package_good').bootstrapSwitch();
        $('#sell_by_weight').bootstrapSwitch();
    });
</script>
@endsection