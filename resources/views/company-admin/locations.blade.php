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
        background-color: #F5F5F5;
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
                        <button type="button" class="btn btn-outline-secondary m-1"> <i class="bi bi-question-circle"></i> Help</button>
                        <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i> Filters</button>
                        <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_item_modal"><i class="bi bi-plus-lg fw-bolder text-white"></i> New</a>
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
                        <button class="nav-link" id="pos-tab" data-bs-toggle="tab" data-bs-target="#pos-tab-pane" type="button" role="tab" aria-controls="pos-tab-pane" aria-selected="false">Point Of Sale</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="online-tab-pane" role="tabpanel" aria-labelledby="online-tab" tabindex="0">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th class="grey-background"></th>
                                <th class="grey-background"></th>
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
                                <th class="grey-background"></th>
                                <th class="grey-background"></th>
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
                                <th class="grey-background"></th>
                                <th class="grey-background"></th>
                                <th class="grey-background">NAME</th>
                                <th class="grey-background">CITY</th>
                                <th class="grey-background">REGISTERS</th>
                                <th class="grey-background">PRODUCTS</th>
                                <th class="grey-background"> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- modal starts here -->
            <div class="modal fade modal-lg" id="add_item_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Create New Item</h4>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form action=" " method="POST">
                                    <div class="row ">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Title<span class="red-asterisk"></span></label>
                                                <input type="text" name="item_name" class="form-control" required>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mt-3">
                                                    <label for="category">Type<span class="red-asterisk"></span></label>
                                                    <select name="item_category_id" id="category" class="form-control">
                                                        <option value=" ">Online</option>
                                                        <option value=" ">Inventory</option>
                                                        <option value=" ">Point Of Sale</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-3">
                                                    <label for="handle">Handle</label>
                                                    <input type="text" name="handle" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_number">Tax Number</label>
                                                    <input type="text" name="item_name" class="form-control" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City<span class="red-asterisk"></span></label>
                                                    <input type="text" name="item_name" class=" form-control red-asterisk" required>

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
                                                    <div class="form-group">
                                                        <label for="fssai_id">FSSAI ID</label>
                                                        <input type="text" name="fssai_id" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group">
                                                <label for="address">Address<span class="red-asterisk"></span></label>
                                                <textarea name="address" class="form-control mt-3" id="addressTextarea1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">Stock Location<span class="red-asterisk"></span></label>
                                                    <input type="text" name="state" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="brand">Brand<span class="red-asterisk"></span></label>
                                                        <select name="brand" id="brand" class="form-control">
                                                            <option value="" disabled selected></option>
                                                            <option value=" ">AY Cafe</option>
                                                            <option value=" ">ABC Cafe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">Max Slot Number</label>
                                                    <input type="text" name="slot_number" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <div class="ml-auto"> <!-- Use 'ml-auto' class to push the button to the left -->
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-orange">Create Location</button>
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

@endsection