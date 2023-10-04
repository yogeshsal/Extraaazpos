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
    .form-row {
        margin-bottom: 20px; /* Add space below each row */
    }
</style>

<style>
    * {
  margin: 0 auto;
  box-sizing:border-box;
  font-family: Roboto, sans-serif;
}

/* body{
  background:#222;
} */

#content1 {
  max-width: 100vw;
}
/* .tabContainer {
  background: #333;
  border: .45px solid #555;
  margin: 0 auto;
} */
.tabContent {
  padding: 10px;
  text-align: left;
  min-height:200px;
  color:#000000;
}
/* Hide all but first tab */
.tabContent > div:not(:first-child) {
  display: none;
}

.tabContainer > .tabs {
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
  border-top: 3px solid rgba(0,0,0,0);
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
</style>

<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h3>{{$Charge->name}}</h3>

    
@php
    // Calculate the time difference
    $currentTime = now();
    $updatedAt = $Charge->updated_at;
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
<h6>Last updated {{ $formattedTime }}</h6>
<br>
<div id="content1">
  <div class="tabContainer">
    <ul class="tabs">
      <li><a src="tab1" href="javascript:void(0);" class="active">Basic Information</a></li>
      <li><a src="tab2" href="javascript:void(0);">Items</a></li>
        
    </ul>
    <div class="tabContent">
        <div id="tab1">   
            <div class="container shadow p-4">
           
            <div>
            <form action="{{ route('charge.update',$Charge->id) }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required value="{{$Charge->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Charge Type:</label>
                                <select class="form-select" name="charge_type" aria-label="Default select example">
                                    
                                    <option value="1">Packaging Charge</option>
                                    <option value="2">Delivery Charge</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="description	">Description:</label>
                        <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$Charge->description}}">
                    </div>

                    
                    <div class="row mt-3">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Applicable On:</label>
                                <select class="form-select" aria-label="Default select example"name="applicable_on">
                                   
                                    <option value="Order Sub Total(%)">Order Sub Total(%)</option>
                                    <option value="Order Sub Total(Fixed)">Order Sub Total(Fixed)</option>
                                    <option value="Item Quantity">Item Quantity</option>
                                    
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                        <label for="mobile">Amount per Quantity:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="">LKR</span>
                                </div>
                                <input type="text" class="form-control" value="{{$Charge->amount_per_quantity}}" name="amount_per_quantity">
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Applicable modes:</label>
                                <option value="1">Online</option>
                                <select class="form-select" name="applicable_modes">
                                   
                                    <option value="1">Online</option>
                                    <option value="2">In store</option>
                                   
                                    
                                </select>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Auto Apply Billing Type:</label>
                                <select class="form-select" name="auto_apply_billing_types">
                                   
                                    <option value="1">AC Table</option>
                                    <option value="2">Inside Section</option>
                                    <option value="2">Pool Section</option>
                                    <option value="2">Dine In</option>
                                   
                                    
                                </select>
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
        <div id="tab2">
        <div class="card shadow p-3">
            <div class="row">
                 <div class="col">
                     <h4>All Items</h4>
                </div>
            <div class="col-auto">
              <a type="button" class="btn btn-orange" href="{{ route('charge.select_items', $Charge->id ) }}">Restrict items</a>  

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
    <!-- /tabContent -->
  </div>
  <!-- /tabContainer -->
  
</div>
<!-- /content -->





<script>
    $(document).ready(function () {
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