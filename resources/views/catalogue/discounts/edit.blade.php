@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css"
    rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<style>
.form-row {
    margin-bottom: 20px;
    /* Add space below each row */
}
</style>

<style>
#content1 {
    max-width: 100vw;
}

.tabContent {
    padding: 10px;
    text-align: left;
    min-height: 200px;
    color: #000000;
}

/* Hide all but first tab */
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

table th {
    background-color: #f5f5f5;
}
</style>

<br>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-selected="false">
                                    Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#item" role="tab" aria-selected="false">
                                    Items
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#location" role="tab"
                                    aria-selected="false">
                                    Locations
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content  text-muted">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <form action="{{ route('discounts.update', ['id' => $discount->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Disount Name</label>
                                                <input type="text" name="discount_name" class="form-control"
                                                    value="{{ $discount->discount_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Applicable On:</label>
                                                <select name="applicable_on" class="form-select"
                                                    aria-label="Default select example" id="selectOption">
                                                    <option value="1"
                                                        {{ $discount->applicable_on == 1 ? 'selected' : '' }}>Bill
                                                        Sub
                                                        Total Amount</option>
                                                    <option value="2"
                                                        {{ $discount->applicable_on == 2 ? 'selected' : '' }}>
                                                        Specific
                                                        Items</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Discount Type</label>
                                                <select id="discount_type" class="form-select"
                                                    aria-label="Default select example">
                                                    <option value=""
                                                        {{ is_null($discount->discount_type) ? 'selected' : '' }}>
                                                        Select Type</option>
                                                    <option value="Fixed"
                                                        {{ $discount->discount_type === 'Fixed' ? 'selected' : '' }}>
                                                        Fixed</option>
                                                    <option value="Percentage"
                                                        {{ $discount->discount_type === 'Percentage' ? 'selected' : '' }}>
                                                        Percentage
                                                    </option>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-0">
                                            <!-- Add mt-0 class here -->
                                            <label for="basic-url">Discount Value</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span id="discount_icon"
                                                        class="input-group-text">{{ $discount->discount_type === 'Fixed' ? '₹' : '%' }}</span>
                                                </div>
                                                <input name="discount_value" type="text" class="form-control"
                                                    id="basic-url" aria-describedby="basic-addon3"
                                                    value="{{ $discount->discount_value }}">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="address">Description:</label>
                                        <textarea name="desc" class="form-control"
                                            rows="3">{{ $discount->desc }}</textarea>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="basic-url">Maximum Discount Value</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">₹</span>
                                                </div>
                                                <input name="max_discount_value" type="text" class="form-control"
                                                    id="basic-url" aria-describedby="basic-addon3"
                                                    value="{{ $discount->max_discount_value }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="basic-url" id="dynamicLabel">Minimum Bill Sub Total
                                                Amount</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">₹</span>
                                                </div>
                                                <input name="min_total_amount" type="text" class="form-control"
                                                    id="basic-url" aria-describedby="basic-addon3"
                                                    value="{{ $discount->min_total_amount }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Auto Apply</label><br>
                                                <input type="checkbox"
                                                    {{ $discount->auto_apply_billing_type ? 'checked' : '' }}
                                                    data-toggle="toggle" id="toggleButton" data-style="ios">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group" id="textboxContainer">
                                                <label for="name">Auto Apply Billing Type</label>
                                                <select name="auto_apply_billing_type" class="form-select"
                                                    aria-label="Default select example" id="textBox">
                                                    <option value="1"
                                                        {{ $discount->auto_apply_billing_type == 1 ? 'selected' : '' }}>
                                                        Ac Table
                                                    </option>
                                                    <option value="2"
                                                        {{ $discount->auto_apply_billing_type == 2 ? 'selected' : '' }}>
                                                        Inside
                                                        Section</option>
                                                    <option value="3"
                                                        {{ $discount->auto_apply_billing_type == 3 ? 'selected' : '' }}>
                                                        Pool Section
                                                    </option>
                                                    <option value="4"
                                                        {{ $discount->auto_apply_billing_type == 4 ? 'selected' : '' }}>
                                                        Token
                                                    </option>
                                                    <option value="5"
                                                        {{ $discount->auto_apply_billing_type == 5 ? 'selected' : '' }}>
                                                        Dine In
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label for="name">Authorised User Roles</label>
                                            <select name="user_role" class="form-select"
                                                aria-label="Default select example">
                                                <option value="" {{ $discount->user_role ? '' : 'selected' }}>
                                                    Select a role
                                                </option>
                                                <option value="All"
                                                    {{ $discount->user_role == 'All' ? 'selected' : '' }}>All
                                                </option>
                                                <option value="Administrator"
                                                    {{ $discount->user_role == 'Administrator' ? 'selected' : '' }}>
                                                    Administrator</option>
                                                <option value="Cashier"
                                                    {{ $discount->user_role == 'Cashier' ? 'selected' : '' }}>
                                                    Cashier</option>
                                                <option value="Manager"
                                                    {{ $discount->user_role == 'Manager' ? 'selected' : '' }}>
                                                    Manager</option>
                                                <option value="Online Order Supervisor"
                                                    {{ $discount->user_role == 'Online Order Supervisor' ? 'selected' : '' }}>
                                                    Online Order Supervisor</option>
                                                <option value="Satellite Tracker"
                                                    {{ $discount->user_role == 'Satellite Tracker' ? 'selected' : '' }}>
                                                    Satellite Tracker</option>
                                                <option value="Online Order Processor"
                                                    {{ $discount->user_role == 'Online Order Processor' ? 'selected' : '' }}>
                                                    Online Order Processor</option>
                                                <option value="Billing User"
                                                    {{ $discount->user_role == 'Billing User' ? 'selected' : '' }}>
                                                    Billing User
                                                </option>
                                                <option value="Captain"
                                                    {{ $discount->user_role == 'Captain' ? 'selected' : '' }}>
                                                    Captain</option>
                                                <!-- Add more options here if needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    <div class="modal-footer form-row mt-3">

                                        <button type="submit" class="btn btn-orange">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content  text-muted">
                        <div class="tab-pane " id="item" role="tabpanel">
                            <div class="container-fluid shadow-lg p-0">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h4 class="text-dark">Selected Items</h4>
                                                <p class="fs-5 text-muted">Discount is applicable to only these selected
                                                    items</p>
                                            </div>
                                            <div>
                                                <a type="button" class="btn btn-orange"
                                                    href="{{ route('discounts.select_items', $discount->id) }}">Update
                                                    Items</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Selling Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $i)
                                    <tr>
                                        <td>{{$i->item_name}}</td>
                                        <td>{{ $i->cat_name }}</td>
                                        <td>{{$i->item_default_sell_price}}</td>
                                    </tr>
                                    @endforeach
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /tabContent -->
            </div>
            <!-- /tabContainer -->
        </div>
        <!-- /content -->
    </div>
</div>

<!-- /tabContainer -->
<!-- </div> -->
<!-- /content -->


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

<script>
$(document).ready(function() {
    $('#item_is_recommended').bootstrapSwitch();
    $('#item_is_package_good').bootstrapSwitch();
    $('#item_sell_by_weight').bootstrapSwitch();
});
</script>
@endsection