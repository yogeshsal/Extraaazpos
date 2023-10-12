@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- Include Bootstrap CSS -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css"
    rel="stylesheet"> -->

<!-- Include jQuery (required for Bootstrap Switch) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- Include Bootstrap Switch JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<style>
.form-row {
    margin-bottom: 20px;
}
</style>

<style>
* {
    margin: 0 auto;
    box-sizing: border-box;
    font-family: Roboto, sans-serif;
}


#content1 {
    max-width: 100vw;
}


.tabContent {
    padding: 10px;
    text-align: left;
    min-height: 200px;
    color: #000000;
}

.tabContent>div:not(:first-child) {
    display: none;
}

.tabContainer>.tabs {
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
    border-top: 3px solid rgba(0, 0, 0, 0);
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
    border-top: 3px solid #f39d77;
    color: #000000;
    background: inherit;
}

.tabs a:hover {
    background: #fff;
    color: orange;
}
</style> -->

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

            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#basicinfo" role="tab"
                                        aria-selected="false">
                                        Basic Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#images" role="tab"
                                        aria-selected="false">
                                        Image
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#items" role="tab"
                                        aria-selected="false">
                                        Items ({{$itemCount}})
                                    </a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="true">
                                        Settings
                                    </a>
                                </li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="basicinfo" role="tabpanel">
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="NameInput" class="form-label"> Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter name"
                                                        name="cat_name" id="compnayNameinput"
                                                        value="{{ $category->cat_name }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="Description" class="form-label">Short Name</label>
                                                    <input type="text" class="form-control" name="cat_short_name"
                                                        placeholder="Enter Description"
                                                        value="{{ $category->cat_short_name }}" id="phonenumberInput">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="handle" class="form-label">Handle</label>
                                                    <input type="text" class="form-control" name="cat_handle"
                                                        value="{{$category->cat_handle}}" placeholder="Enter Handle"
                                                        id="address1ControlTextarea">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="cat_timing_group" class="form-label">Timing
                                                        Group</label>
                                                    <select name="cat_timing_group" id="cat_timing_group"
                                                        class="form-select">
                                                        <option selected>Select Timing Group</option>
                                                        @foreach($timing as $t)
                                                        <option value="{{$t->id}}" @if($t->id == $category->id) selected
                                                            @endif>
                                                            {{$t->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="cat_parent_category" class="form-label">Parent
                                                        Category</label>
                                                    <select name="cat_parent_category" id="cat_parent_category"
                                                        class="form-select">
                                                        <option value="" disabled selected>Select Parent Category
                                                        </option>
                                                        @foreach ($categories as $category1)
                                                        <option value="{{ $category1->id }}" @if($category1->id ==
                                                            $category->id)
                                                            selected @endif>
                                                            {{ $category1->cat_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="cat_kot_type" class="form-label">KOT</label>
                                                    <select name="cat_kot_type" id="cat_kot_type" class="form-select">
                                                        <option value="" disabled selected>Select Applicable Modes
                                                        </option>
                                                        <option value="kot">KOT</option>
                                                        <!-- <option value="in_store">In Store</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-6">
                                                <!-- Example Textarea -->
                                                <div>
                                                    <label for="cat_desc" class="form-label">Description</label>
                                                    <textarea class="form-control" name="cat_desc" id="cat_desc"
                                                        rows="3"></textarea>
                                                </div>
                                                <!-- <div class="mb-3">
                                                    <label for="cat_desc" class="form-label">Description </label>
                                                    <textarea name="cat_desc" id="cat_desc" rows="3"></textarea>
                                                </div> -->
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <a href="/taxes">
                                                        <button type="button"
                                                            class="btn btn-secondary">Cancel</button></a>
                                                    <button type="submit" class="btn btn-orange">Submit</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>

                                </div>
                                <div class="tab-pane " id="images" role="tabpanel">

                                    <form method="POST" action="{{ route('categories.updateImage', $category->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group form-row">
                                            <label for="cat_image">Upload New Image:</label>
                                            <input type="file" name="cat_image" id="cat_image" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-orange mt-4">Upload Image</button>
                                    </form>



                                </div>
                                <div class="tab-pane " id="items" role="tabpanel">
                                    <div class="card shadow p-3">
                                        <div class="row">
                                            <div class="col">
                                                <h4>Associated Items 1</h4>
                                            </div>
                                            <div class="col-auto">
                                                <a href="{{ route('categories.items', ['id' => $category->id]) }}"
                                                    type="button" class="btn btn-orange">Update Items</a>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card shadow p-3 mt-3">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAME</th>
                                                    <th scope="col">CATEGORY</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($items as $item)
                                                <tr>
                                                    <td>{{$item->item_name}} </td>
                                                    <td>{{$item->cat_name}}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $items->links() }}
                                    </div>
                                </div>
                                <!-- <div class="tab-pane" id="settings" role="tabpanel">
                                    <h6>Settings</h6>
                                    <p class="mb-0">
                                        Trust fund seitan letterpress, keytar raw denim
                                        keffiyeh etsy art party before they sold out master
                                        cleanse gluten-free squid scenester freegan cosby
                                        sweater. Fanny pack portland seitan DIY, art party
                                        locavore wolf cliche high life echo park Austin. Cred
                                        vinyl keffiyeh DIY salvia PBR, banh mi before they
                                        sold out farm-to-table VHS.
                                    </p>
                                </div> -->
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!--end col-->
            </div>
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
                    document.write(new Date().getFullYear());
                    </script>
                    © Hybrix.
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

<!-- <div id="content1">
    <div class="tabContainer">
        <ul class="tabs">
            <li><a src="tab1" href="javascript:void(0);" class="active">Basic Information</a></li>
            <li><a src="tab2" href="javascript:void(0);">images</a></li>
            <li><a src="tab3" href="javascript:void(0);">Items ({{$itemCount}})</a></li>
        </ul>
        <div class="tabContent">
            <div id="tab1">
                <div class="container shadow p-4">
                    <div>
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="item_name">Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="cat_name" class="form-control" value="{{ $category->cat_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cat_short_name">Short Name:</label>
                                        <input type="text" name="cat_short_name" class="form-control" value="{{ $category->cat_short_name }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cat_handle">Handle</label>
                                        <input type="text" name="cat_handle" class="form-control" value="{{ $category->cat_handle }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cat_timing_group">Timing Group</label>
                                        <select name="cat_timing_group" class="form-select" aria-label="Default select example">
                                            <option selected>Select Timing Group</option>
                                            @foreach($timing as $t)
                                            <option value="{{$t->id}}" @if($t->id == $category->id) selected @endif>
                                                {{$t->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cat_parent_category">Parent Category</label>
                                        <select name="cat_parent_category" id="cat_parent_category" class="form-control">
                                            <option value="" disabled selected>Select Parent Category</option>
                                            @foreach ($categories as $category1)
                                            <option value="{{ $category1->id }}" @if($category1->id == $category->id)
                                                selected @endif>
                                                {{ $category1->cat_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cat_kot_type">KOT</label>
                                        <select name="cat_kot_type" id="cat_kot_type" class="form-control">
                                            <option value="kot">KOT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="form-group">
                                    <label for="cat_desc">Description</label>
                                    <textarea name="cat_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4">{{ $category_desc }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer form-row">
                                <a href="\categories"><button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancel</button></a>
                                <button type="submit" class="btn btn-orange ">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="tab2">
                <div class="card shadow p-3">
                    <form method="POST" action="{{ route('categories.updateImage', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-row">
                            <label for="cat_image">Upload New Image:</label>
                            <input type="file" name="cat_image" id="cat_image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-orange">Upload Image</button>
                    </form>
                </div>
            </div>
            <div id="tab3">
                <div class="card shadow p-3">
                    <div class="row">
                        <div class="col">
                            <h4>Associated Items 1</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('categories.items', ['id' => $category->id]) }}" type="button" class="btn btn-orange">Update Items</a>  
                        </div>
                    </div>
                </div>
                <div class="card shadow p-3 mt-3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">NAME</th>
                                <th scope="col">CATEGORY</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$item->item_name}} </td>
                                <td>{{$item->cat_name}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->







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