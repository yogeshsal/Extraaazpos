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
    .form-row {
        margin-bottom: 20px; /* Add space below each row */
    }
</style>
<br>
<div class="container">
<div class="card shadow p-3">       
        <form action="{{ route('taxes.update', $tax->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $tax->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="items">Items:</label>
                                <input type="text" name="items" class="form-control" value="">
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Handle:</label>
                                <input type="text" name="handle" class="form-control" value="{{ $item->handle }}">
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
                                    <option value="" disabled selected>Select POS</option>
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
                                <input type="text" name="sort_order" class="form-control" value="{{ $item->sort_order }}">
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
                                <input type="text" name="default_sales_price" class="form-control" value="{{$item->default_sales_price}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="name">Markup Price (Optional):</label>
                                <input type="text" name="markup_price" class="form-control" value="{{$item->markup_price}}">
                            </div>
                            </div>
                        </div>
                    </div> 

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <div class="modal-footer form-row">
                        <button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange ">Save</button>
                    </div>
                </form>
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