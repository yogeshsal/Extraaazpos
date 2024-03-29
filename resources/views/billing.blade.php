@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<style>
.menu ul {
    list-style-type: none;
}

/* .menu li {
                  display: inline-block;
                  vertical-align: middle;
                  text-align: center;
              } */
.circle {
    border-radius: 100px;
    width: 100px;
    height: 100px;
    line-height: 100px;
    background: #999da3;
    margin-left: 5px;
}
</style>

<style>
.selectWrapper {
    border-radius: 0px;
    display: inline-block;
    overflow: hidden;
    background: #cccccc;
    border: 1px solid #cccccc;
    margin-left: 555px;
}

/* .selectBox {
                    width: 140px;
                    height: 40px;
                    border: 0px;
                    outline: none;
                } */

/* Center-align the text */
.card-title {
    text-align: center;
}

.circle-container {
    display: flex;
    flex-wrap: wrap;
    /* Wrap circles to the next line when they don't fit horizontally */
    justify-content: center;
    /* Center the circles horizontally */
}

.circle {
    width: 100px;
    /* Adjust the width of each circle */
    height: 100px;
    /* Adjust the height of each circle */
    background-color: #3498db;
    border-radius: 50%;
    margin: 30px;
    /* Add spacing between circles */
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    color: white;
}

.clicked-circle {
    background-color: #F37429;
    /* Change the background color to your desired color */
    color: white;
    /* Change the text color to contrast with the new background color */
}

.card {
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); */
    /* Adjust the shadow properties as needed */
}
</style>


<br>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <!-- <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Tabs</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="javascript: void(0);">Base UI</a>
                                            </li>
                                            <li class="breadcrumb-item active">Tabs</li>
                                        </ol>
                                    </div>
                                </div> -->
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-7">
                    <h5 class="mb-3">Default Tabs</h5>
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                {{-- <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#delivery" role="tab"
                                            aria-selected="false">
                                            <!-- <a class="nav-link" data-bs-toggle="tab" href="#delivery" role="tab" aria-selected="false"> -->
                                            Delivery
                                        </a>
                                    </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#product1" role="tab"
                                        aria-selected="false">
                                        Billing
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab"
                                        aria-selected="false">
                                        Messages
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab"
                                        aria-selected="true">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                {{-- <div class="tab-pane active" id="delivery" role="tabpanel"> --}}
                                <!-- Small Tables -->
                                {{-- <div class="input-group">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                                            </ul>
                                            <input type="text" class="form-control"
                                                aria-label="Text input with dropdown button">
                                        </div> --}}

                                {{-- <table class="table table-sm table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-start">NO</th>
                                                    <th scope="col" class="text-center">Customer</th>
                                                    <th scope="col" class="text-center">KOT</th>
                                                    <th scope="col" class="text-center">Driver</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Open Time</th>
                                                    <th scope="col" class="text-end">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-start fs-12"><span
                                                            class="badge badge-soft-warning">84/00062</span></th>
                                                    <td class="text-center fs-12">Sam <br>1234567890</td>
                                                    <td class="text-center fs-12"><span
                                                            class="badge badge-soft-dark">84/001</span></td>
                                                    <td class="text-center fs-12"><a href="">Select Driver</a> </td>
                                                    <td class="text-center fs-12"><select
                                                            class="form-select form-select-sm  mb-3"
                                                            aria-label=".form-select-sm example">
                                                            <option selected>Status</option>
                                                            <option value="1">Pending</option>
                                                            <option value="2">Dlivered</option>
                                                            <option value="3">Three</option>
                                                        </select></td>
                                                    <td class="text-center fs-12">1:42 </td>
                                                    <td class="text-end fs-12">200 </td>
                                                </tr>

                                            </tbody>
                                        </table> --}}


                                {{-- </p>
                                    </div> --}}
                                <div class="tab-pane active " id="product1" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <select class="form-select mb-3 selectBox" id="dropdown"
                                                aria-label="Default select example">
                                                <option value="balcony" selected>Balcony</option>
                                                <option value="table">Table</option>
                                            </select>


                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <div class="menu">
                                                    <div id="balconyDiv">
                                                        <li onclick="showBalcony()">
                                                            <div class="circle-container">
                                                                @for ($i = 1; $i <= $bal; $i++) <div class="circle"
                                                                    id="bal-{{ $i }}" onclick="showCircleDetails(this)">
                                                                    <span class="circle-number">{{ $i }}</span>
                                                            </div>
                                                            @endfor
                                                        </li>
                                                    </div>
                                                </div>

                                                <div id="tableDiv" style="display: none;">
                                                    <li onclick="showTable()">
                                                        <div class="circle-container">
                                                            @for ($i = 1; $i <= $table; $i++) <div class="circle"
                                                                id="table-{{ $i }}" onclick="showCircleDetails(this)">
                                                                <span class="circle-number">{{ $i }}</span>
                                                        </div>
                                                        @endfor
                                                    </li>
                                                </div>
                                            </ul>
                                        </div>
                                        <!-- <div class="card-footer">
                                                        <a href="javascript:void(0);" class="link-success float-end">Read More <i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                                                        <p class="text-muted mb-0">1 days Ago</p>
                                                    </div> -->
                                    </div>

                                    <!-- <h6>Product</h6>
                                                <p class="mb-0">
                                                    You've probably heard that opposites attract. The same
                                                    is true for fonts. Don't be afraid to combine font
                                                    styles that are different but complementary, like sans
                                                    serif with serif, short with tall, or decorative with
                                                    simple. Qui photo booth letterpress, commodo enim
                                                    craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                                                    cillum PBR.
                                                </p> -->
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <h6>Messages</h6>
                                    <p class="mb-0">
                                        Etsy mixtape wayfarers, ethical wes anderson tofu
                                        before they sold out mcsweeney's organic lomo retro
                                        fanny pack lo-fi farm-to-table readymade. Messenger
                                        bag gentrify pitchfork tattooed craft beer, iphone
                                        skateboard locavore carles etsy salvia banksy hoodie
                                        helvetica. DIY synth PBR banksy irony.
                                    </p>
                                </div>

                                <div class="tab-pane" id="settings" role="tabpanel">
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
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-xxl-5">
                    <h5 class="mb-3">&nbsp;</h5>


                    <div id="circleDetailDivs" class="card  " style="display: none; height: 90%;">
                        <div class="card-header">
                            <h6 class="card-title mb-0 ">
                                <p class="text-start">
                                    <span id="tableNumberPlaceholder"></span>
                                    <span class="float-end">Customer Name : <span
                                            id="customerNamePlaceholder"></span></span>
                                </p>
                            </h6>
                        </div>

                        <div class="card-body" style="height:67%">
                            <!-- Small Tables -->
                            <table class="table table-sm table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-start">PRODUCT</th>
                                        <th class="text-center" scope="col">SERVED</th>
                                        <th class="text-center" scope="col">UNIT PRICE</th>
                                        <th class="text-center" scope="col">QUANTITY</th>
                                        <th scope="col" class="text-end">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody id="targetTableBody">
                                    <!-- Data rows will be appended here -->
                                </tbody>
                            </table>


                        </div>
                        <div class="card-body">
                            <a href="javascript:void(0);" class="float-end" id="completeTotalPrice">$0</a>
                            <p class="text-muted mb-0">Total</p>
                        </div>

                        <div class="card-footer">
                            <a href="/orders"><button type="button" class="btn btn-light btn-icon rounded-pill"><i
                                        class=" ri-shopping-cart-fill"></i></button></a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#discount"
                                class="btn btn-light btn-icon rounded-pill"><i class=" ri-percent-line"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#charges"
                                class="btn btn-light btn-icon rounded-pill"><i
                                    class=" ri-money-dollar-box-line"></i></button>
                            <button type="button" class="btn btn-light btn-icon rounded-pill printButton"><i
                                    class=" ri-printer-line"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#selectcustomer"
                                class="btn btn-light btn-icon rounded-pill"><i class=" ri-earth-line"></i></button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalnote"
                                class="btn btn-light btn-icon rounded-pill"><i class=" ri-file-edit-line"></i></button>
                            <button id="payButton" class="btn btn-outline-success btn-lg float-end" type="button"
                                onclick="navigateToPayRoute()">Collect</button>




                        </div>



                        <!-- modals start -->

                        <!-- Standard Modal -->
                        <!-- Discount Modal -->
                        <div id="discount" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Bill Discount</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <select class="form-select mb-3" aria-label=".form-select-lg example">
                                            <option selected>Select Discount</option>
                                            @foreach($discounts as $d)
                                            <option value="">{{$d->discount_name}}</option>   
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary ">Save Changes</button>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Discount Modal End -->
                        <!-- Modalnote Modal -->
                        <div id="modalnote" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Note</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="mb-3">
                                                <label for="employeeName" class="form-label ">Kitchen
                                                    Instructions</label>
                                                <select class="form-select mb-3" name="k_inst"
                                                    aria-label=".form-select-lg example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" id="employeeName" placeholder="Enter emploree name"> -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="Billnote" class="form-label">Bill Note</label>
                                                <input type="text" class="form-control" id="bill_note" name="bill_note"
                                                    placeholder="Bill Note">
                                            </div>
                                            <div class="mb-3">
                                                <label for="Internalnote" class="form-label">Internal Note</label>
                                                <input type="text" class="form-control" id="int_note"
                                                    placeholder="Internal Note" name="int_note">
                                            </div>

                                            <div class="text-end">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary ">Save Changes</button> -->
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- ]Modalnote Modal End -->

                        <!-- Select Customer -->
                        <div id="selectcustomer" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Select Bill Currencies</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Main Bill Currency
                                        </p>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="currency"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                USD
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="currency"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                India
                                            </label>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="modal-body">
                                        <p>
                                            Currencies to Show Bill Total
                                        </p>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" name="currency_total"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                USD
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="currency_total"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                India
                                            </label>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary ">Save Changes</button>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Select Customer End -->

                        <!-- Charges Modal -->
                        <div id="charges" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Select Charges</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"> </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Outlined Styles -->
                                        <div class="hstack gap-2 d-grid flex-wrap">
                                        @foreach($charges as $c)
                                            <button type="button" class="btn btn-outline-light custom-toggle text-start"
                                                data-bs-toggle="button">
                                                <span class="icon-on "> {{$c->name}}</span>
                                                <span class="icon-off "> {{$c->name}}<i
                                                        class="ri-check-fill align-bottom me-1 float-end"></i></span>
                                            </button>
                                           @endforeach
                                            <!-- <input type="checkbox" class="btn-check" id="btn-check-outlined">
                                                        <label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-outlined">
                                                        <label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-outlined">
                                                        <label class="btn btn-outline-primary" for="btn-check-outlined">Single toggle</label>



                                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined">
                                                        <label class="btn btn-outline-light" for="btn-check-2-outlined">Service Charge</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined">
                                                        <label class="btn btn-outline-light" for="btn-check-2-outlined">Service Charge</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined">
                                                        <label class="btn btn-outline-light" for="btn-check-2-outlined">Service Charge</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined">
                                                        <label class="btn btn-outline-light" for="btn-check-2-outlined">Service Charge</label>
                                                        <input type="checkbox" class="btn-check" id="btn-check-2-outlined">
                                                        <label class="btn btn-outline-light" for="btn-check-2-outlined">Service Charge</label> -->

                                            <!-- <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" checked>
                                                        <label class="btn btn-outline-success" for="success-outlined">Checked success radio</label> -->

                                            <!-- <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined"> -->
                                            <!-- <label class="btn btn-outline-danger" for="danger-outlined">Danger radio</label> -->
                                        </div>
                                        <!-- <select class="form-select mb-3" aria-label=".form-select-lg example">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary ">Save Changes</button>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Charges Modal End -->

                        <!-- Notes Modal -->


                        <!-- Notes Modal End -->

                        <!-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Center Modal</button> -->


                        <!-- modals end -->
                    </div>
                    <div id="circleDetailDiv" class="card " style="display: none">
                        <div class="card-body">
                            <h4 class="card-title">Table - <span id="circleNumberSpan"></span></h4>

                            <center>
                                <p class="card-text">How many people are at the table ?</p>
                            </center>
                            <br>


                            <div class="col-sm-12 text-center">
                                <div>
                                    <!-- <h5 class="fs-13 fw-medium text-muted">Light</h5> -->
                                    <div class="input-step light">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" class="product-quantity" value="5" min="0" max="100"
                                            readonly>
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                            </div>
                            <!-- counter -->
                            <br>
                            <center>
                                <p class="card-text">Add Customer</p>
                            </center>

                            <center>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#myModal" id="selectCustomerButton">
                                    Customer: <span id="selectedCustomerName">Select Customer</span>
                                </button>
                            </center>
                            <br>
                            <center>
                                <a href="orders"><button type="button" class="btn btn-orange mt-2"
                                        id="newBillButton">New Bill</button>
                                </a>
                        </div>
                    </div>


                    <!-- end card -->
                </div>
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
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Select Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-xxl-12 col-md-10">
                        <div>
                            <label for="labelInput" class="form-label">Search by Name or Mobile Number</label>
                            <select class="form-select" aria-label="Default select example" id="customerSelect">
                                <option>Select Customer</option>
                                @foreach ($customer as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-orange" id="addCustomerButton"
                        data-bs-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</div>
<!-- end main content-->
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
            </script> -->


<script>
// 1. Get the ID from the URL
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get("id");

// 2. Use JavaScript to find the element by its ID
const element = document.getElementById(id);

if (element) {
    // 3. Change the CSS display property to show the element
    element.style.display = "block";
} else {
    console.error("Element not found");
}
</script>




<script>
document.addEventListener('DOMContentLoaded', function() {
    // Retrieve table number, customer name, and product data from localStorage
    var tableNumber = localStorage.getItem('tableNumber');
    var customerName = localStorage.getItem('customerName');
    var productData = JSON.parse(localStorage.getItem('productData'));

    // Update the content of the placeholders in the card header
    var tableNumberPlaceholder = document.getElementById('tableNumberPlaceholder');
    var customerNamePlaceholder = document.getElementById('customerNamePlaceholder');

    if (tableNumber && customerName) {
        tableNumberPlaceholder.textContent = `Table Number: ${tableNumber}`;
        customerNamePlaceholder.textContent = customerName;
    }

    if (productData && Array.isArray(productData)) {
        var tableBody = document.getElementById('targetTableBody');

        // Loop through the productData and create rows for the table
        var completeTotal = 0; // Initialize the complete total

        productData.forEach(function(product) {
            var row = document.createElement('tr');

            row.innerHTML = `
                <td class="text-start">${product.productName}</td>
                <td class="text-center">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" value="" id="cardtableCheck01">
                        <label class="form-check-label" for="cardtableCheck01"></label>
                    </div>
                </td>
                <td class="text-center">${product.unitPrice}</td>
                <td class="text-center">${product.quantity}</td>
                <td class="text-end">${product.total}</td>
            `;

            tableBody.appendChild(row);

            // Calculate and update the complete total
            completeTotal += parseFloat(product
                .total); // Remove the '$' sign and convert to a number
        });

        // Update the complete total in the specified div
        var completeTotalPrice = document.getElementById('completeTotalPrice');
        completeTotalPrice.textContent = `₹${completeTotal.toFixed(2)}`; // Display with 2 decimal places
    }
});




document.getElementById("addCustomerButton").addEventListener("click", function() {
    var selectedOption = document.getElementById("customerSelect").options[document.getElementById(
        "customerSelect").selectedIndex];
    var selectedCustomerName = selectedOption.text;
    document.getElementById("selectedCustomerName").textContent = selectedCustomerName;

    // Fetch the selected area from the dropdown in Code 1
    var selectedArea = document.getElementById("dropdown").value;

    // Store the selected area, customer name, and other data in localStorage
    localStorage.setItem("selectedArea", selectedArea);
    localStorage.setItem("selectedCustomerName", selectedCustomerName);
});

document.getElementById("newBillButton").addEventListener("click", function() {
    // Get the selected customer ID, cover count, table number, and area
    var selectedCustomer = document.getElementById("customerSelect").value;
    var coverCount = parseInt(document.querySelector(".product-quantity").value);
    var tableNumber = document.getElementById("circleNumberSpan").textContent;

    // Fetch the selected area from localStorage
    var selectedArea = localStorage.getItem("selectedArea");

    // Store the customer ID, cover count, table number, and area in localStorage
    localStorage.setItem("selectedCustomer", selectedCustomer);
    localStorage.setItem("coverCount", coverCount);
    localStorage.setItem("tableNumber", tableNumber);
    localStorage.setItem("selectedArea", selectedArea);

    // Perform the desired action (e.g., create a new bill)
    createNewBill();
});



// Function to show the div
function showtable1() {
    var div = document.getElementById('table1');
    div.style.display = 'block';
}
const printButton = document.getElementsByClassName('printButton');

printButton.addEventListener('click', function() {
    window.print(); // Open the print dialog
});
</script>


<script>
// Get references to the buttons and the counter value
const minusButton = document.getElementById('minusButton');
const plusButton = document.getElementById('plusButton');
const counterValue = document.getElementById('counterValue');

// Initialize the counter value
let count = 0;

// Function to decrease the counter value
minusButton.addEventListener('click', function() {
    count--;
    counterValue.textContent = count;
});

// Function to increase the counter value
plusButton.addEventListener('click', function() {
    count++;
    counterValue.textContent = count;
});


// Get references to the dropdown and div elements
var dropdown = document.getElementById("dropdown");
var balconyDiv = document.getElementById("balconyDiv");
var tableDiv = document.getElementById("tableDiv");

// Function to show the Balcony div
function showBalcony() {
    balconyDiv.style.display = "block";
    tableDiv.style.display = "none";
}

// Function to show the Table div
function showTable() {
    balconyDiv.style.display = "none";
    tableDiv.style.display = "block";
}

// Add an event listener to the dropdown to detect changes
dropdown.addEventListener("change", function() {
    var selectedValue = dropdown.value;
    if (selectedValue === "balcony") {
        showBalcony();
    } else if (selectedValue === "table") {
        showTable();
    }
});

function showCircleDetails(circle) {
    // Display the circle details div
    var circleDetailDiv = document.getElementById("circleDetailDiv");
    circleDetailDiv.style.display = "block";

    // Display the circle's number
    var circleNumberSpan = document.getElementById("circleNumberSpan");
    circleNumberSpan.textContent = circle.querySelector('.circle-number').textContent;
    var allCircles = document.querySelectorAll('.circle');
    allCircles.forEach(function(circle) {
        circle.classList.remove('clicked-circle');
    });

    // Add the "clicked-circle" class to the clicked circle
    circle.classList.add('clicked-circle');
}



// Add an event listener to the dropdown to detect changes
dropdown.addEventListener("change", function() {
    var selectedValue = dropdown.value;
    if (selectedValue === "balcony") {
        showBalcony();
    } else if (selectedValue === "table") {
        showTable();
    }
});


// Get references to the dropdown and span elements
var dropdown = document.getElementById("dropdown");
var circleNumberSpan = document.getElementById("circleNumberSpan");

// Function to update the selected value in the span element
// function updateSelectedValue() {
//     var selectedOption = dropdown.options[dropdown.selectedIndex];
//     circleNumberSpan.textContent = selectedOption.text;
// }

// Add an event listener to the dropdown to detect changes
// dropdown.addEventListener("change", updateSelectedValue);

// Initial update when the page loads
// updateSelectedValue();
</script>

<script>
// Get references to the button and select element
const selectCustomerButton = document.getElementById('selectCustomerButton');
const customerSelect = document.getElementById('customerSelect');

// Add an event listener to the "Save changes" button in the modal
document.getElementById('saveCustomerButton').addEventListener('click', function() {
    // Get the selected customer's name
    const selectedCustomerName = customerSelect.options[customerSelect.selectedIndex].text;

    // Update the button text with the selected customer's name
    selectCustomerButton.innerText = `Customer: ${selectedCustomerName}`;

    // Close the modal
    $('#customer').modal('hide');
});
</script>


<script>
function navigateToPayRoute() {
    // Use the Laravel route function to generate the URL
    var payRouteUrl = "{{ route('orders.pay') }}";

    // Redirect to the pay route
    window.location.href = payRouteUrl;
}
</script>

@endsection