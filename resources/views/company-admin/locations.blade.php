@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css"
    rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS and Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<style>
    .grey-background {
        background-color: #F5F5F5;
    }
.astrik{
    color:red;
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

    .red-asterisk {
        color: red;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .red-asterisk::after {
        content: " *";
        color: red;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5;
        /* Light grey border between rows */
    }

    table tr:hover {
        background-color: #b8b8b8;
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

    .form-row {
        margin-bottom: 20px;
        /* Add space below each row */
    }

    .table-image {
        width: 100px;
        /* Set the desired width */
        height: auto;
        /* Auto-adjust the height to maintain the aspect ratio */
    }
</style>

<div class="main-content">
    <div class="page-content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3>Locations</h3>
                    <p class="text-muted">You can manage your online locations from here</P>
                </div>
                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i class="bi bi-question-circle"></i>
                            Help</button>
                        <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i>
                            Filters</button>
                        <a href="#" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_location_modal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New
                        </a>

                    </div>
                </div>
            </div>

            <div class="card shadow mt-4 container-fluid">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="online-tab" data-bs-toggle="tab" data-bs-target="#online-tab-pane" type="button" role="tab" aria-controls="online-tab-pane" aria-selected="true">Online</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory-tab-pane" type="button" role="tab" aria-controls="inventory-tab-pane" aria-selected="false">Inventory</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pos-tab" data-bs-toggle="tab" data-bs-target="#pos-tab-pane" type="button" role="tab" aria-controls="pos-tab-pane" aria-selected="false">Point Of
                            Sale</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="online-tab-pane" role="tabpanel" aria-labelledby="online-tab" tabindex="0">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th class="grey-background">NAME</th>
                                <th class="grey-background">CITY</th>
                                <th class="grey-background">PRODUCTS</th>
                                <th class="grey-background">PLATFORMS</th>
                                <th class="grey-background">LAST PUBLISH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="inventory-tab-pane" role="tabpanel" aria-labelledby="inventory-tab" tabindex="0">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th class="grey-background">NAME</th>
                                <th class="grey-background">CITY</th>
                                <th class="grey-background">PRODUCTS</th>
                                <th class="grey-background"></th>
                                <th class="grey-background"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> </td>
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pos-tab-pane" role="tabpanel" aria-labelledby="pos-tab" tabindex="0">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th class="grey-background">NAME</th>
                                <th class="grey-background">CITY</th>
                                <th class="grey-background">REGISTERS</th>
                                <th class="grey-background">PRODUCTS</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    {{ $location->name }}
                                </td>
                                <td>{{ $location->city }}</td>
                                <td></td>
                                <td></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- modal starts here -->
<!-- ... Previous HTML code ... -->
<div class="modal fade modal-lg" id="add_location_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create New Location</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <form action="{{ route('locations.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name<span class="red-asterisk"></span></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="type">Type<span class="red-asterisk"></span></label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="Online">Online</option>
                                        <option value="Inventory">Inventory</option>
                                        <option value="Point Of Sale">Point Of Sale</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <label for="handle">Handle</label>
                                    <input type="text" name="handle" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tax_number">Tax Number</label>
                                    <input type="text" name="tax_number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City<span class="red-asterisk"></span></label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fssai_id">FSSAI ID</label>
                                    <input type="text" name="fssai_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="address">Address<span class="red-asterisk"></span></label>
                                <textarea name="address" class="form-control" required id="addressTextarea1"
                                    rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stock_location">Stock Location</label>
                                    <input type="text" name="stock_location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="" disabled selected></option>
                                        <option value="AY Cafe">AY Cafe</option>
                                        <option value="ABC Cafe">ABC Cafe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_slot_number">Max Slot Number</label>
                                    <input type="text" name="max_slot_number" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <input type="hidden" name="user_id" class="form-control" value={{$currentUserId}}>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">

                                    <input type="hidden" name="restaurant_id" class="form-control"
                                        value={{$restaurant_id}}>
                                </div>
                            </div>
                        </div>

                        <div class=" modal-footer">
                            <div class="ml-auto">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-orange">Create
                                    Location</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>

<!-- off canvas modal -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header d-flex">
        <div>
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Maharashtra Palace</h4>
                <p>Created a year ago by <span class="text-muted h6">abcd1234@xyz.com</span></p>

        </div>


        <div class="btn-group" role="group" aria-label="Default button group">
            <button type="button" class="btn btn-danger">Archive</button>
            <button type="button" class="btn btn-light"> <i class="bi bi-arrow-clockwise"></i> Publish
                Catalogue</button>
        </div>

    </div>
    <hr>
    <div class="offcanvas-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane"
                    type="button" role="tab" aria-controls="info-tab-pane" aria-selected="true">Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="catalogue-tab" data-bs-toggle="tab" data-bs-target="#catalogue-tab-pane"
                    type="button" role="tab" aria-controls="catalogue-tab-pane" aria-selected="false">Catalogue</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="publish-tab" data-bs-toggle="tab" data-bs-target="#publish-tab-pane"
                    type="button" role="tab" aria-controls="publish-tab-pane" aria-selected="false">Publish Log</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="resgisters-tab" data-bs-toggle="tab" data-bs-target="#resgisters-tab-pane"
                    type="button" role="tab" aria-controls="resgisters-tab-pane"
                    aria-selected="false">Registers</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="machines-tab" data-bs-toggle="tab" data-bs-target="#machines-tab-pane"
                    type="button" role="tab" aria-controls="machines-tab-pane" aria-selected="false">EDC
                    Machines</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="areas-tab" data-bs-toggle="tab" data-bs-target="#areas-tab-pane"
                    type="button" role="tab" aria-controls="areas-tab-pane" aria-selected="false">Areas</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <form action="{{ route('locations.store') }}" method="POST">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title<span class="red-asterisk"></span></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="type">Type<span class="red-asterisk"></span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="Online">Online</option>
                                    <option value="Inventory">Inventory</option>
                                    <option value="Point Of Sale">Point Of Sale</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="handle">Handle</label>
                                <input type="text" name="handle" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="tax_number">Tax Number</label>
                                <input type="text" name="tax_number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="city">City<span class="red-asterisk"></span></label>
                                <input type="text" name="city" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" name="state" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="external_id">External ID</label>
                                <input type="text" name="fssai_id" class="form-control">
                            </div>
                        </div>
                    
                    <div class="col-md-6 mt-2">
                        <div class="form-group">
                            <label for="fssai_id">FSSAI ID</label>
                            <input type="text" name="fssai_id" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group">
                            <label for="address">Address<span class="red-asterisk"></span></label>
                            <textarea name="address" class="form-control" required id="addressTextarea1"
                                rows="2"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stock_location">Stock Location<span class="red-asterisk"></span></label>
                                <input type="text" name="stock_location" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_slot_number">Max Slot Number</label>
                                <input type="text" name="max_slot_number" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for=" ">Tag your locations for easy bulk operations</label>
                                <button type="submit" class="btn btn-light ">+New tag</button>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <input type="hidden" name="user_id" class="form-control" value={{$currentUserId}}>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <input type="hidden" name="restaurant_id" class="form-control" value={{$restaurant_id}}>
                            </div>
                        </div>
                    </div>

                    <div class=" modal-footer mt-4">
                        <div class="ml-auto">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-orange">Create
                                Location</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="catalogue-tab-pane" role="tabpanel" aria-labelledby="catalogue-tab"
                tabindex="0">
                Catalogue</div>
            <div class="tab-pane fade" id="publish-tab-pane" role="tabpanel" aria-labelledby="publish-tab" tabindex="0">
                Publish
            </div>

            <div class="tab-pane fade" id="registers-tab-pane" role="tabpanel" aria-labelledby="registers-tab"
                tabindex="0">
                Registers
            </div>

            <div class="tab-pane fade" id="machines-tab-pane" role="tabpanel" aria-labelledby="machines-tab"
                tabindex="0"> EDC
                Machines
            </div>

            <div class="tab-pane fade" id="areas-tab-pane" role="tabpanel" aria-labelledby="areas-tab" tabindex="0">
                Areas
            </div>
        </div>
    </div>
</div>





@endsection