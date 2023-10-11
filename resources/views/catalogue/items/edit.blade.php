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
<style>
    * {
  margin: 0 auto;
  box-sizing:border-box;
  font-family: Roboto, sans-serif;
}
/* body{
  background:#222;
} */
#content1 {
  max-width: 100vw;
}
/* .tabContainer {
  background: #333;
  border: .45px solid #555;
  margin: 0 auto;
} */
.tabContent {
  padding: 10px;
  text-align: left;
  min-height:200px;
  color:#000000;
}
/* Hide all but first tab */
.tabContent > div:not(:first-child) {
  display: none;
}
.tabContainer > .tabs {
  overflow: hidden;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
}
.tabs li {
  float: left;
  display: flex;
  flex: 1;
}
.tabs a {
  position: relative;
  background: #fff;
  border-top: 3px solid rgba(0,0,0,0);
  padding: 1em .5em;
  float: left;
  text-decoration: none;
  color: #000000;
  margin: 0 .1em 0 0;
  font-size: 1em;
  flex: 1;
  transition: all .35s ease;
}
.tabs a.active {
  border-top: 3px solid #F39D77;
  color: #000000;
  background: inherit;
}
.tabs a:hover {
  background: #fff;
  color: orange;
}
</style>
<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div id="content1">
  <div class="tabContainer">
    <ul class="tabs">
      <li><a src="tab1" href="javascript:void(0);" class="active">Info</a></li>
      <li><a src="tab2" href="javascript:void(0);">images</a></li>
      <li><a src="tab3" href="javascript:void(0);">Taxes & Charges</a></li>
      <li><a src="tab4" href="javascript:void(0);">Locations ({{ $locationCount}})</a></li>
      <li><a src="tab5" href="javascript:void(0);">Modifier Groups</a></li>
    </ul>
    <div class="tabContent">
        <div id="tab1">
            <div class="container shadow p-4">
            <!-- <div class="card shadow p-3">        -->
            <div>
                <form action="{{ route('items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_name">Name:</label>
                                <input type="text" name="item_name" class="form-control" value="{{ $item->item_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_short_name">Short Name:</label>
                                <input type="text" name="item_short_name" class="form-control" value="{{ $item->item_short_name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="item_category_id" id="category" class="form-control">
                                <option value="" disabled>Select Category</option>
                                @foreach ($categories as $categoryId => $categoryName)
                                    <option value="{{ $categoryId }}" {{ $categoryId == $item->item_category_id ? 'selected' : '' }}>
                                        {{ $categoryName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_pos_code">POS Code</label>
                                <input type="text" name="item_pos_code" class="form-control" value="{{ $item->item_pos_code }}">
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="item_food_type">Food Type <span class="text-danger">*</span></label>
                                <select name="item_food_type" id="item_food_type" class="form-control" required>
                                    <option value="" disabled>Select Food Type</option>
                                    @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                    <option value="{{ $foodtypeName}}" {{ old('item_food_type', $item->item_food_type) == $foodtypeName ? 'selected' : '' }}>
                                        {{ $foodtypeName }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="is_recommended">Is Recommended</label><br>
                                <input type="checkbox"  id="item_is_recommended" name="item_is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_recommended ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="item_is_package_good">Is Package Good</label><br>
                            <input type="checkbox" id="item_is_package_good" name="item_is_package_good" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_package_good ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_recommended">Sell by Weight</label><br>
                            <input type="checkbox" id="item_sell_by_weight" name="item_sell_by_weight" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_sell_by_weight ? 'checked' : '' }}>
                        </div>
                    </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Default Sales Price:</label>
                                <input type="text" name="item_default_sell_price" class="form-control" value="{{$item->item_default_sell_price}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="name">Markup Price (Optional):</label>
                                <input type="text" name="item_markup_price" class="form-control" value="{{$item->item_markup_price}}">
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer form-row">
                        <a href="\items"><button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancel</button></a>
                        <button type="submit" class="btn btn-orange">Update</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div id="tab2">
            <div class="card shadow p-3">
                <form method="POST" action="{{ route('items.updateImage', $item->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group form-row">
                    <label for="item_image">Upload New Image:</label>
                    <input type="file" name="item_image" id="item_image" class="form-control">
                </div>
                    <button type="submit" class="btn btn-orange">Upload Image</button>
                </form>
            </div>
        </div>
        <div id="tab3">
            <span>Inside Tab 3, how <b>interesting</b>.</span>
        </div>
        <div id="tab4">
        <div class="card shadow p-3">
                <div class="row">
                        <div class="col">
                            <h4>Associated Locations</h4>
                        </div>
                            <div class="col-auto">
                            <a type="button" class="btn btn-orange" href="{{ route('items.select_location', $item->id ) }}">Restrict items</a>
                            </div>
                </div>
        </div>
        <div class="card shadow p-3 mt-3">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>OVERRIDE SALES PRICE</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($locations as $l )
                        <tr>
                            <td>{{$l->name}}</td>
                            <td></td>
                        </tr>
                     @endforeach
                        </tbody>
                </table>
             </div>
            </div>
        <div id="tab5">
            <span>Inside Tab 5, how <b>interesting</b>.</span>
        </div>
    </div>
    <!-- /tabContent -->
  </div>
  <!-- /tabContainer -->
</div>
<!-- /content -->
<script>
    $(document).ready(function () {
        $('#item_is_recommended').bootstrapSwitch();
        $('#item_is_package_good').bootstrapSwitch();
        $('#item_sell_by_weight').bootstrapSwitch();
    });
</script>
<script>
    $("#content").on("click", ".tabContainer .tabs a", function(e) {
  e.preventDefault(),
  $(this)
    .parents(".tabContainer")
    .find(".tabContent > div")
    .each(function() {
      $(this).hide();
    });
  $(this)
    .parents(".tabs")
    .find("a")
    .removeClass("active"),
    $(this).toggleClass("active"), $("#" + $(this).attr("src")).show();
});
</script>
@endsection