@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
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
</style>
<br>
<div class="card">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Items</h3>
        <div>
            <button type="button" class="btn btn-outline-secondary">Filters</button>
            <a href="" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal">+ Add Item</a>            
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

                    <div class="row">
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


                    <div class="row">
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
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                    <option value="category3">Category 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">POS Code:</label>
                                <input type="text" name="pos_code" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="food_type">Food Type</label>
                                <select name="food_type" id="food_type" class="form-control">
                                    <option value="food_type1">Food Type 1</option>
                                    <option value="food_type2">Food Type 2</option>
                                    <option value="food_type3">Food Type 3</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Sort Order:</label>
                                <input type="text" name="sort_order" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_recommended">Is Recommended</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_recommended" name="is_recommended">
                                    <label class="custom-control-label" for="is_recommended"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_recommended">Is Package Good</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_package_good" name="is_package_good">
                                    <label class="custom-control-label" for="is_package_good"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_recommended">Sell by Weight</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="sell_by_weight" name="sell_by_weight">
                                    <label class="custom-control-label" for="sell_by_weight"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
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
@endsection