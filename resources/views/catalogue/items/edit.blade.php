@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')



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
            <!-- <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Tabs</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                                <li class="breadcrumb-item active">Tabs</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div> -->
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">Edit Items</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#info" role="tab" aria-selected="false">
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#images" role="tab" aria-selected="false">
                                        Images
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tandc" role="tab" aria-selected="false">
                                        Taxes & Charges
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#location" role="tab" aria-selected="true">
                                        Location
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#mg" role="tab" aria-selected="true">
                                        Modifier group
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content  text-muted">
                                <div class="tab-pane active" id="info" role="tabpanel">
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
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="item_is_recommended" name="item_is_recommended" data-on-text="Yes" data-off-text="No" {{ $item->item_is_recommended ? 'checked' : '' }}>
                                                        <!-- <label class="form-check-label" for="SwitchCheck1">Switch Default</label> -->
                                                    </div>
                                                    <!-- <input type="checkbox" id="item_is_recommended" name="item_is_recommended" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_recommended ? 'checked' : '' }}> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="item_is_package_good">Is Package Good</label><br>
                                                    <div class="form-check form-switch mb-3">

                                                        <input class="form-check-input" type="checkbox" role="switch" id="item_is_package_good" name="item_is_package_good" data-on-text="Yes" data-off-text="No" {{ $item->item_is_package_good ? 'checked' : '' }}>
                                                    </div>

                                                    <!-- <input type="checkbox" id="item_is_package_good" name="item_is_package_good" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_is_package_good ? 'checked' : '' }}> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="is_recommended">Sell by Weight</label><br>
                                                    <div class="form-check form-switch mb-3">

                                                        <input class="form-check-input" type="checkbox" role="switch" id="item_sell_by_weight" name="item_sell_by_weight" data-on-text="Yes" data-off-text="No" {{ $item->item_sell_by_weight ? 'checked' : '' }}>
                                                    </div>

                                                    <!-- <input type="checkbox" id="item_sell_by_weight" name="item_sell_by_weight" data-toggle="switch" data-on-text="Yes" data-off-text="No" {{ $item->item_sell_by_weight ? 'checked' : '' }}> -->
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
                                <div class="tab-pane " id="images" role="tabpanel">
                                    <div class="card shadow p-3">
                                        <form method="POST" action="{{ route('items.updateImage', $item->id)}}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group form-row">
                                                <label for="item_image">Upload New Image:</label>
                                                <input type="file" name="item_image" id="item_image" class="form-control">
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-orange">Upload Image</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tandc" role="tabpanel">
                                    <h6>Messages</h6>
                                    <p class="mb-0">
                                        Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                        sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                        farm-to-table readymade. Messenger bag gentrify pitchfork
                                        tattooed craft beer, iphone skateboard locavore carles etsy
                                        salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                    </p>
                                </div>
                                <div class="tab-pane" id="location" role="tabpanel">
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
                                <div class="tab-pane" id="mg" role="tabpanel">
                                    <h6>Settings</h6>
                                    <p class="mb-0">
                                        Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                        art party before they sold out master cleanse gluten-free squid
                                        scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                        art party locavore wolf cliche high life echo park Austin. Cred
                                        vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                        farm-to-table VHS.
                                    </p>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!--end col-->


                <!--end col-->
            </div>
            <!--end row-->


            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Hybrix.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>


<!-- /content -->







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