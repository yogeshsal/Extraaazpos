@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')


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
                    <h3 class="p-0">Discounts</h3>
                    <p class="text-muted">Central repository for all your discounts on <b>Point of Sale.<b></p>
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
                            data-bs-target="#chargesModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Discount</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>ITEMS</th>
                        <th>LOCATIONS</th>
                        <th>UPDATED</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>
                            <a href="{{ route('discounts.edit', ['id' => $d->id]) }}">
                                {{$d->discount_name}}
                            </a>

                            <br>
                            {{$d->discount_type}} Amount of ₹ {{$d->discount_value}} on item
                        </td>
                        <td>item</td>
                        <td>location</td>
                        <td>{{$d->updated_at}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade modal-lg" id="chargesModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">New Discount</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="{{ route('add_discount') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <!-- <div class="card-header">
                                            <h4 class="card-title mb-0">Form Grid</h4>
                                        </div> -->
                                            <!-- end card header -->

                                            <div class="card-body">


                                                <div class="row form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <label for="name">Disount Name</label>
                                                                <input type="text" name="discount_name"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Applicable On:</label>
                                                            <select name="applicable_on" class="form-select"
                                                                aria-label="Default select example" id="selectOption">
                                                                <option selected></option>
                                                                <option value="1">Bill Sub Total Amount</option>
                                                                <option value="2">Specific Items</option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="row form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="name">Discount Type</label>
                                                                <select id="discount_type" class="form-select"
                                                                    aria-label="Default select example">
                                                                    <option selected value=""></option>
                                                                    <option value="Fixed">Fixed</option>
                                                                    <option value="Percentage">Percentage</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="basic-url">Discount Value</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon3">$</span>
                                                                    </div>
                                                                    <input name="max_discount_value" type="text"
                                                                        class="form-control" id="basic-url"
                                                                        aria-describedby="basic-addon3">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row form-row">
                                                        <div class="form-group">
                                                            <label for="address">Description</label>
                                                            <textarea name="item_description" class="form-control mt-3"
                                                                id="exampleFormControlTextarea1" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="basic-url">Maximum Discount Value</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon3">$</span>
                                                                    </div>
                                                                    <input name="max_discount_value" type="text"
                                                                        class="form-control" id="basic-url"
                                                                        aria-describedby="basic-addon3">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="basic-url" id="dynamicLabel">Minimum Bill
                                                                    Sub Total Amount</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"
                                                                            id="basic-addon3">$</span>
                                                                    </div>
                                                                    <input name="min_total_amount" type="text"
                                                                        class="form-control" id="basic-url"
                                                                        aria-describedby="basic-addon3">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row form-row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="name">Authorised User Roles</label>
                                                                        <select name="user_role" class="form-select"
                                                                            aria-label="Default select example">
                                                                            <option selected></option>
                                                                            <option value="Fixed">All</option>
                                                                            <option value="Fixed">Administrator</option>
                                                                            <option value="Percentage">Cashier</option>
                                                                            <option value="Percentage">Manager</option>
                                                                            <option value="Percentage">Online Order
                                                                                Supervisor</option>
                                                                            <option value="Percentage">Satellite
                                                                                -Tracker</option>
                                                                            <option value="Percentage">Online order
                                                                                Processor</option>
                                                                            <option value="Percentage">Billing User
                                                                            </option>
                                                                            <option value="Percentage">Captain</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="name">Restaurant ID</label>
                                                                        <input type="text" name="restaurant_id"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>




                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                                            <button type="submit" class="btn btn-orange">Create</button>
                                                        </div>
                                                        <!--end row-->

                                                    </div>

                                                </div>
                                            </div> <!-- end col -->


                                        </div>























                                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit modal -->

            <script>
            $(document).ready(function() {
                const discountTypeSelect = $('#discount_type');
                const discountIcon = $('#discount_icon');
                $('#toggleButton').bootstrapToggle();

                // Function to handle toggle change event
                $('#toggleButton').change(function() {
                    var isChecked = $(this).prop('checked');
                    $('#textboxContainer').toggle(isChecked);
                });
                // Initial state
                updateDiscountIcon();

                // Add an event listener to the select element to detect changes
                discountTypeSelect.on('change', function() {
                    updateDiscountIcon();
                    $("#selectOption").change(function() {
                        var selectedValue = $(this).val();
                        var label = "";

                        if (selectedValue === "1") {
                            label = "Minimum Bill Sub Total Amount";
                        } else if (selectedValue === "2") {
                            label = "Minimum Item Total Amount";
                        }

                        // Update the label text
                        $("#dynamicLabel").text(label);
                    });
                });


                function updateDiscountIcon() {
                    const selectedValue = discountTypeSelect.val();

                    if (selectedValue === 'Fixed') {
                        discountIcon.text('₹'); // Rupee icon
                    } else if (selectedValue === 'Percentage') {
                        discountIcon.text('%'); // Percentage symbol
                    } else {
                        discountIcon.text('₹'); // Clear the icon if no option is selected
                    }
                }
            });
            </script>
            @endsection