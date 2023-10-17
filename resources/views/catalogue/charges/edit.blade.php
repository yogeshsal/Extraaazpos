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
     .text-danger {
        color: red;
     }
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
<div class="container">
<div class="card card shadow p-3">
    <h3>Edit Charge</h3>
    <form action="{{ route('catalogue.store') }}" method="POST">
<div id="content1">
  <div class="tabContainer">
    <ul class="tabs">
      <li><a data-target="tab1" href="javascript:void(0);"  class="active">Basic Information</a></li>
      <li><a data-target="tab2"href="javascript:void(0);"  >Items</a></li>
        
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
                                <input type="text" name="name" class="form-control" required>
                                <input type="text" name="name" class="form-control" required value="{{$Charge->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">

                    </div>
                    <div class="form-group mt-3">
                        <label for="description	">Description:</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                        <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$Charge->description}}">
                    </div>

                    

                            <div class="input-group-prepend">
                                    <span class="input-group-text" id="">LKR</span>
                                </div>
                                <input type="text" class="form-control" name="amount_per_quantity">
                                <input type="text" class="form-control" value="{{$Charge->amount_per_quantity}}" name="amount_per_quantity">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Applicable modes:</label>
                                <option value="1">Online</option>
                                <select class="form-select" name="applicable_modes">
                                   
                                    <option value="1">Online</option>

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
    
    $(".tabs a").click(function(e) {
        e.preventDefault();
        // Remove the 'active' class from all tabs
        $(".tabs a").removeClass("active");
        // Add the 'active' class to the clicked tab
        $(this).addClass("active");
        // Hide all tab content
        $(".tabContent > div").hide();
        // Show the content of the selected tab
        $("#" + $(this).data("target")).show();
    });
</script>

@endsection