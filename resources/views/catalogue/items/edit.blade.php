@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<style>
.form-control {
    /* Set the desired width */
    width: 400px;
    height: 50px;
}

.card-outer {
    border: 1px solid #ccc;
    /* Add a border */
    border-radius: 5px;
    /* Rounded corners */
    padding: 30px;
}

.page-content {
    height: 100vh;
}

.center-content {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>



<div class="main-content ">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-selected="false">
                                    Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#product1" role="tab"
                                    aria-selected="false">
                                    Images
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab"
                                    aria-selected="false">
                                    Taxes and Charges
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab"
                                    aria-selected="true">
                                    Location ({{ $locationCount}})
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#mg" role="tab" aria-selected="true">
                                    Modifier Groups
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->

                        <div class="card-outer center-content">
                            <div class="tab-content  text-muted ">
                                <div class="tab-pane active " id="home" role="tabpanel">

                                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item_name">Name:</label>
                                                    <input type="text" name="item_name" class="form-control my-2 my-2"
                                                        value="{{ $item->item_name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item_short_name">Short Name:</label>
                                                    <input type="text" name="item_short_name" class="form-control my-2"
                                                        value="{{ $item->item_short_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex">
                                            <div class="col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="handle">Handle</label>
                                                    <input type="text" name="handle" class="form-control my-2"
                                                        value="{{ $item->handle }}">

                                                </div>
                                            </div>



                                            <div class="col-md-6 mt-2">
                                                <div class="form-group">
                                                    <label for="category">Category<span
                                                            class="text-danger">*</span></label>
                                                    <select name="item_category_id" id="category"
                                                        class="form-control my-2">
                                                        <option value="" disabled>Select Category</option>
                                                        @foreach ($categories as $categoryId => $categoryName)
                                                        <option value="{{ $categoryId }}"
                                                            {{ $categoryId == $item->item_category_id ? 'selected' : '' }}>
                                                            {{ $categoryName }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label for="item_pos_code">POS Code</label>
                                                        <input type="text" name="item_pos_code"
                                                            class="form-control my-2"
                                                            value="{{ $item->item_pos_code }}">
                                                    </div>
                                                </div>


                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label for="item_food_type">Food Type <span
                                                                class="text-danger">*</span></label>
                                                        <select name="item_food_type" id="item_food_type"
                                                            class="form-control my-2" required>
                                                            <option value="" disabled>Select Food Type</option>
                                                            @foreach ($foodtype as $foodtypeId => $foodtypeName)
                                                            <option value="{{ $foodtypeName}}"
                                                                {{ old('item_food_type', $item->item_food_type) == $foodtypeName ? 'selected' : '' }}>
                                                                {{ $foodtypeName }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="is_recommended">Sort Order<span
                                                            class="text-danger">*</span></label><br>
                                                    <input type="text" name="item_sort_order" class="form-control my-2"
                                                        value=" ">
                                                    <!-- <input type="checkbox" id="item_is_recommended" name="item_is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_recommended ? 'checked' : '' }}> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="is_recommended">Is Recommended</label><br>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" id="item_is_recommended"
                                                            name="item_is_recommended" type="checkbox" role="switch"
                                                            id="SwitchCheck1" data-on-text="Yes" data-off-text="No"
                                                            {{ $item->item_is_recommended ? 'checked' : '' }}>
                                                        <!-- <label class="form-check-label" for="SwitchCheck1">Switch Default</label> -->
                                                    </div>
                                                    <!-- <input type="checkbox" id="item_is_recommended" name="item_is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_recommended ? 'checked' : '' }}> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item_is_package_good">Is Package Good</label><br>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" id="item_is_package_good"
                                                            name="item_is_package_good" type="checkbox" role="switch"
                                                            id="SwitchCheck1" data-on-text="Yes" data-off-text="No"
                                                            {{ $item->item_is_package_good ? 'checked' : '' }}>
                                                        <!-- <label class="form-check-label" for="SwitchCheck1">Switch Default</label> -->
                                                    </div>
                                                    <p class="muted">Packaged or Prepared items whose tax liability
                                                        falls on the Restaurant</p>
                                                    <!-- <input type="checkbox" id="item_is_package_good" name="item_is_package_good" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_package_good ? 'checked' : '' }}> -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="is_recommended">Sell by Weight</label><br>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" id="item_sell_by_weight"
                                                            name="item_sell_by_weight" type="checkbox" role="switch"
                                                            id="SwitchCheck1" data-on-text="Yes" data-off-text="No"
                                                            {{ $item->item_sell_by_weight ? 'checked' : '' }}>
                                                        <!-- <label class="form-check-label" for="SwitchCheck1">Switch Default</label> -->
                                                    </div>
                                                    <!-- <input type="checkbox" id="item_sell_by_weight" name="item_sell_by_weight" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_sell_by_weight ? 'checked' : '' }}> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Default Sales Price<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="item_default_sell_price"
                                                        class="form-control my-2"
                                                        value="{{$item->item_default_sell_price}}"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="name">Markup Price (Optional):</label>
                                                        <input type="text" name="item_markup_price"
                                                            class="form-control my-2"
                                                            value="{{$item->item_markup_price}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Aggregate Price<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="item_default_sell_price"
                                                        class="form-control my-2"
                                                        value="{{$item->item_default_sell_price}}"
                                                        aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="name">External Id</label>
                                                        <input type="text" name="item_external_id"
                                                            class="form-control my-2"
                                                            value="{{$item->item_external_id}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-row mt-2">
                                            <div class="form-group">
                                                <label for="item_description">Description</label>
                                                <textarea name="item_description" class="form-control mt-3"
                                                    id="exampleFormControlTextarea1" rows="4">{{ $item->item_description }}
                                                </textarea>
                                            </div>
                                        </div>


                                        <div class="row form-row mt-2">
                                            <div class="form-group">
                                                <p class="muted">Tag your items for easy bulk operations</p>
                                                <input type="text" name="item_markup_price" class="form-control"
                                                    value="{{$item->item_markup_price}}">

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="\items"><button type="button" class="btn btn-outline-warning m-2"
                                                    data-dismiss="modal">Cancel</button></a>
                                            <button type="submit" class="btn btn-orange">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane " id="product1" role="tabpanel">
                                    <form method="POST" action="{{ route('items.updateImage', $item->id)}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="item_image">Upload New Image:</label>
                                            <input type="file" name="item_image" id="item_image"
                                                class="form-control my-2">
                                        </div>
                                        <button type="submit" class="btn btn-orange">Upload Image</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">

                                    <h5>TAXES APPLICABLE</h5>

                                    <div class="col-sm-6 col-lg-6 shadow">
                                        @foreach($tax as $list)
                                        <div class="card text-left">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1">{{$list->name}}</h5>
                                                <p class="card-text">{{$list->tax_percentage}}% on
                                                    {{$list->applicable_on}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <h5>CHARGES APPLICABLE</h5>

                                    <div class="col-sm-6 col-lg-6 shadow">
                                        @foreach($charge as $clist)
                                        <div class="card text-left">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1">{{$clist->name}}</h5>
                                                <p class="card-text">{{$clist->amount_per_quantity}}% on
                                                    {{$clist->applicable_on}}
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Associated Locations</h4>
                                        </div>
                                        <div class="col-auto">
                                            <a type="button" class="btn btn-orange"
                                                href="{{ route('items.select_location', $item->id ) }}">Restrict
                                                items</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="mg" role="tabpanel">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="card shadow p-3">
                <div class="row">
                        <div class="col">
                            <h4>Modifier Groups </h4>
                        </div>
                            <div class="col-auto">
                            <a type="button" class="btn btn-orange" href="{{ route('items.select_modifiergroup', $item->id ) }}">Update</a>  
                            </div>
                </div>
        </div>  
         <div class="card shadow p-3 mt-3">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Modifier group</th>
                       
                        </tr>
                      
                    </thead>
                        <tbody>
                        @foreach($modifierGroup as $m)
                    <tr>
                    <td>{{$m->modifier_group_name}}</td>
                    
                 </tr>
                   @endforeach
                        

                        </tbody>
                </table>
             </div> 

        </div>
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
</div>
<!-- /content -->
</div>


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









<script>
$(document).ready(function() {
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