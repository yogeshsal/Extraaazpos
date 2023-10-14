@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<!-- Include Bootstrap CSS -->

<!-- Include jQuery (required for Bootstrap Switch) -->

<!-- Include Bootstrap Switch JS -->
<style>
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

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f5f5f5;
        color: #646464;
        font-weight: 900;
        font-size: small;
    }

    tr {
        border-bottom: 2px solid #F5F5F5;
        /* Light grey border between rows */
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

    .page-content {
        height: 100vh;
    }
</style>

<br>

<div class="main-content">

    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Raw Materials</h3>
                    <p class="text-muted">Materials which are purchased and used for recipes.</p>
                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i
                                class="bi bi-question-circle"></i> Help</button>
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>&nbsp;&nbsp;


                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i>
                            Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal"
                            data-bs-target="#intermediateModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Material</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>CATEGORY</th>
                        <th>STANDARD COST PRICE</th>
                        <th>UPDATED</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <br>


                        </td>
                    </tr>

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
        <div class="modal fade modal-lg" id="intermediateModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">New Product</h4>


                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action=" " method="POST">
                                @csrf

                                <div class="row form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name"> Product Name<span class="asterisk">*</span></label>

                                            <input type="text" name="name" class="form-control" required>
                                            <p class="text-muted">Product name as it will be displayed throughout the
                                                system</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="applicable_on">Brand</label>
                                            <div class="input-group">
                                                <input type="text" name="brand" class="form-control"
                                                    placeholder="Enter Brand Name" required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#brandModal">+</button>
                                                </div>
                                            </div>

                                            <p class="text-muted">Link brands for better reporting and insights</p>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tax_percentage">Category</label>
                                                <input type="text" name="category" class="form-control" required>
                                                <p class="text-muted">Select a category for product</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="applicable_modes">Suppliers</label>
                                            <div class="input-group">
                                                <input type="text" name="brand" class="form-control"
                                                    placeholder="Enter Brand Name" required>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#SupplierModal">+</button>
                                                </div>
                                            </div>
                                            <p class="text-muted">Default supplier for the product.</p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div>
                                    <h4 class="p-0">Product Locations</h4>
                                    <p class="text-muted">Locations that the product is available at.The product can
                                        only be sold at these locations and inventory can also only be added at this
                                        location for the product.You can add/disable locations for a product as
                                        required.

                                        Cant see a location?Please ask your administrator to ensure you have permission
                                        to create products for that location</p>


                                    <table id="dataTable">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>NAME</th>
                                                <th><input type="checkbox">Applicable</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>


                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <div>
                                        <h4 class="p-0">Unit of Measurement</h4>
                                        <p class="text-muted">1.Base Unit: The unit for tracking inventory. This is the
                                            minimum amount you can sell at.</p>
                                        <p class="text-muted">2.Default Unit: The default unit to be chosen to show
                                            inventory in, sell and receive with.</p>

                                    </div>
                                    <table id="dataTable">
                                        <thead>
                                            <tr>

                                                <th>NAME</th>
                                                <th>SCALE</th>
                                                <th>TYPE</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>

                                                    <div class="row form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <div class="input-group">
                                                                    <input type="text" name="brand" class="form-control"
                                                                        placeholder="PCS" required>

                                                                </div>
                                                                <p class="text-muted">Eg- pcs, case, g, kg, ...
                                                                    (Base Unit)
                                                                </p>

                                                            </div>
                                                        </div>
                                                </td>
                                                <td>
                                                    <div class="row form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <div class="input-group">
                                                                    <input class="form-control" type="text"
                                                                        placeholder="1"
                                                                        aria-label="Disabled input example" disabled>
                                                                </div>
                                                                <p class="text-muted">1 x pcs = 1 pcs
                                                                </p>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>


                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="input-group ">
                                            <button type="button" class="btn btn-outline-secondary m-1"> +Add
                                                Unit</button>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="p-0">Identifiers</h4>
                                </div>


                                <div class="row form-row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"> SKU </label>

                                            <input type="text" name="name" class="form-control" required>
                                            <p class="text-muted">Unique stock keeping code. If left blank a code will
                                                be auto generated</p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="applicable_on">Barcode</label>
                                            <input type="text" name="brand" class="form-control"
                                                placeholder="Enter Brand Name" required>
                                            <p class="text-muted">Barcode if any printed on the product</p>

                                        </div>
                                    </div>
                                </div>



                                <div class="row form-row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="applicable_on">Minimum Stock Level pcs</label>
                                            <input type="text" name="brand" class="form-control"
                                                placeholder="Enter Brand Name" required>
                                            <p class="text-muted">When stock levels drop below this quantity, you will
                                                see low stock alerts</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tax_percentage">HSN</label>
                                                <input type="text" name="category" class="form-control" required>
                                                <p class="text-muted">Harmonized System of Nomenclature</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="applicable_modes">Standard Cost for 1 pcs</label>
                                            <input type="text" name=" " class="form-control"
                                                placeholder="Enter Supplier Name" required>
                                            <p class="text-muted">Standard Cost Price, A separate weighted average cost
                                                will be automatically calculated as you receive stock.</p>

                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>
                                <div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-orange">Save</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- brand modal -->


        <div class="modal fade modal-lg" id="brandModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Create Brand</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action=" " method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name<span class="asterisk">*</span></label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-orange">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Supplier Modal-->
            <div class="modal fade modal-lg" id="SupplierModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel1">Create Supplier</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form action=" " method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name<span class="asterisk">*</span></label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Tax Number</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Tax identification Number" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description	">Note</label>
                                        <textarea name="description" class="form-control" rows="3"
                                            placeholder="Any order details you want to track"></textarea>
                                    </div>

                                    <div class="modal-header">
                                        <h4 class="modal-title" id=" ">Contact Person</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Contact Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Contact Designation</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Contact Email</label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Contact Mobile</label>
                                                <input type="text" name="mobile" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <h4 class="modal-title" id=" ">Address</h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Line1</label>
                                                <input type="text" name=" " class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Line2</label>
                                                <input type="text" name=" " class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">City</label>
                                                <input type="text" name=" " class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">State</label>
                                                    <input type="text" name=" " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Country</label>
                                                    <input type="text" name=" " class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">PostCode</label>
                                                    <input type="text" name=" " class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-orange">Save</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                @endsection