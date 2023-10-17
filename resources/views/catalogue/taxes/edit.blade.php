@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- <style>
    .form-row {
        margin-bottom: 20px;
        /* Add space below each row */
    }
</style> -->



<!-- <br>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h3>{{$tax->name}}</h3> -->


@php
// Calculate the time difference
$currentTime = now();
$updatedAt = $tax->updated_at;
$diff = $currentTime->diff($updatedAt);

// Determine the appropriate format based on the time elapsed
$formattedTime = '';

if ($diff->y > 0) {
$formattedTime = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
} elseif ($diff->m > 0) {
$formattedTime = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
} elseif ($diff->d > 0) {
$formattedTime = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
} elseif ($diff->h > 0) {
$formattedTime = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
} elseif ($diff->i > 0) {
$formattedTime = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
} else {
$formattedTime = 'just now';
}
@endphp
<!-- <h6>Last updated {{ $formattedTime }}</h6> -->
<br>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->

            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">Edit Taxes</h5>
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#basicinfo" role="tab" aria-selected="false">
                                        Basic Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#itemstab" role="tab" aria-selected="false">
                                        Items
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" aria-selected="false">
                                        Messages
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="true">
                                        Settings
                                    </a>
                                </li> -->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane " id="basicinfo" role="tabpanel">
                                    <form action="{{ route('taxes.update',$tax->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="firstNameinput" class="form-label">Tax Type</label>
                                                    <select name="tax_type" id="tax_type" class="form-select">
                                                        <option value="" disabled selected>Select Tax Type</option>
                                                        <option value="gst">GST</option>
                                                        <option value="custom">Customn</option>
                                                        <option value="purchasereceive">PurchaseReceive</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="lastNameinput" class="form-label">Tax Code</label>
                                                    <select name="tax_code" id="tax_code" class="form-select">
                                                        <option value="" disabled selected>Select Tax Code</option>
                                                        <option value="igst">IGST</option>
                                                        <option value="sgst">SGST</option>
                                                        <option value="cgst">CGST</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="NameInput" class="form-label"> Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter name" name="name" id="compnayNameinput" value="{{$tax->name}}">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="Description" class="form-label">Description</label>
                                                    <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{$tax->description}}" id="phonenumberInput">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="ApplicableOn" class="form-label">Applicable On</label>
                                                    <select name="applicable_on" id="applicable_on" name="tax_code" id="tax_code" class="form-select">
                                                        <option value="" disabled selected>Select Applicable On</option>
                                                        <option value="item_price">Item Price</option>
                                                        <option value="charge">Charge</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="TaxPercentage" class="form-label">Tax percentage</label>
                                                    <input type="text" class="form-control" name="tax_percentage" value="{{$tax->tax_percentage}}" placeholder="Address 1" id="address1ControlTextarea">
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="citynameInput" class="form-label">Applicable Modes</label>
                                                    <select name="applicable_modes" id="applicable_modes" class="form-select">
                                                        <option value="" disabled selected>Select Applicable Modes</option>
                                                        <option value="online">Online</option>
                                                        <option value="in_store">In Store</option>
                                                    </select>
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <a href="/taxes">
                                                        <button type="button" class="btn btn-secondary">Cancel</button></a>
                                                    <button type="submit" class="btn btn-orange">Submit</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                    <!-- <form action="{{ route('taxes.update',$tax->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_type">Type</label>
                                                    <select name="tax_type" id="tax_type" class="form-control">
                                                        <option value="" disabled selected>Select Tax Type</option>
                                                        <option value="gst">GST</option>
                                                        <option value="custom">Customn</option>
                                                        <option value="purchasereceive">PurchaseReceive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tax_code">Tax Code</label>
                                                    <select name="tax_code" id="tax_code" class="form-control">
                                                        <option value="" disabled selected>Select Tax Code</option>
                                                        <option value="igst">IGST</option>
                                                        <option value="sgst">SGST</option>
                                                        <option value="cgst">CGST</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" name="name" class="form-control" value="{{$tax->name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description:</label>
                                                    <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$tax->description}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="applicable_on">Applicable On</label>
                                                    <select name="applicable_on" id="applicable_on" class="form-control">
                                                        <option value="" disabled selected>Select Applicable On</option>
                                                        <option value="item_price">Item Price</option>
                                                        <option value="charge">Charge</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="tax_percentage">Tax Percentage:</label>
                                                        <input type="text" name="tax_percentage" class="form-control" value="{{$tax->tax_percentage}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="applicable_modes">Applicable Modes</label>
                                                    <select name="applicable_modes" id="applicable_modes" class="form-control">
                                                        <option value="" disabled selected>Select Applicable Modes</option>
                                                        <option value="online">Online</option>
                                                        <option value="in_store">In Store</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-orange">Save</button>
                                        </div>
                                    </form> -->



                                </div>
                                <div class="tab-pane active" id="itemstab" role="tabpanel">

                                <div class="card shadow p-3">
            <div class="row">
                 <div class="col">
                     <h4>All Items</h4>
                </div>
            <div class="col-auto">
                <a type="button" class="btn btn-orange" href="{{ route('taxes.select_items', $tax->id ) }}">Restrict items</a>  


             </div>
            </div>
            </div>

            <div class="card shadow p-3 mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $i)
                    <tr>
                    <td>{{$i->item_name}}</td>
                    <td>{{ $i->cat_name }}</td>
                 </tr>
                   @endforeach
                </tbody>
                </table>
            
        </div>

                                </div>
                                <!-- <div class="tab-pane" id="messages" role="tabpanel">
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
      <li><a src="tab2" href="javascript:void(0);">Items</a></li>
        
    </ul>
    <div class="tabContent">
        <div id="tab1">   
            <div class="container shadow p-4">
            <div>
            <form action="{{ route('taxes.update',$tax->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tax_type">Type</label>
                                <select name="tax_type" id="tax_type" class="form-control"  >
                                    <option value="" disabled selected>Select Tax Type</option>                                         
                                    <option value="gst">GST</option>
                                    <option value="custom">Customn</option>
                                    <option value="purchasereceive">PurchaseReceive</option>                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="tax_code">Tax Code</label>
                                <select name="tax_code" id="tax_code" class="form-control">  
                                    <option value="" disabled selected>Select Tax Code</option>                                  
                                    <option value="igst">IGST</option>
                                    <option value="sgst">SGST</option>
                                    <option value="cgst">CGST</option>                                    
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{$tax->name}}">
                            </div>
                        </div>                        
                    </div>

                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$tax->description}}">
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="applicable_on">Applicable On</label>
                                <select name="applicable_on" id="applicable_on" class="form-control" >
                                    <option value="" disabled selected>Select Applicable On</option>                                         
                                    <option value="item_price">Item Price</option>
                                    <option value="charge">Charge</option>                                                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="tax_percentage">Tax Percentage:</label>
                                <input type="text" name="tax_percentage" class="form-control"  value="{{$tax->tax_percentage}}">
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="applicable_modes">Applicable Modes</label>
                                <select name="applicable_modes" id="applicable_modes" class="form-control" >
                                    <option value="" disabled selected>Select Applicable Modes</option>                                         
                                    <option value="online">Online</option>
                                    <option value="in_store">In Store</option>                                                                       
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
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
        <div id="tab2">
        <div class="card shadow p-3">
            <div class="row">
                 <div class="col">
                     <h4>All Items</h4>
                </div>
            <div class="col-auto">
                <a type="button" class="btn btn-orange" href="{{ route('taxes.select_items', $tax->id ) }}">Restrict items</a>  


             </div>
            </div>
            </div>

            <div class="card shadow p-3 mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($items as $i)
                    <tr>
                    <td>{{$i->item_name}}</td>
                    <td>{{ $i->cat_name }}</td>
                 </tr>
                   @endforeach
                </tbody>
                </table>
            
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