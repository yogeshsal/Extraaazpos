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

<h3>{{$timing->name}}</h3>

    
@php
    // Calculate the time difference
    $currentTime = now();
    $updatedAt = $timing->updated_at;
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
      <li><a src="tab1" href="javascript:void(0);" class="active">Details</a></li>
      <li><a src="tab2" href="javascript:void(0);">Categories</a></li>
        
    </ul>
    <div class="tabContent">
        <div id="tab1">   
            <div class="container shadow p-4">
            <!-- <div class="card shadow p-3">        -->
            <div>
                <form action="{{ route('category-timing.update', $timing->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{$timing->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="handle">Handle</label>
                                <input type="text" name="handle" class="form-control" value="{{$timing->handle}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-row">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <!-- <textarea name="description" value="{{$timing->description}}" class="form-control mt-3" rows="4"></textarea> -->
                            <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$timing->description}}">
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_name">Slot Start Time<span class="text-danger">*</span></label>
                                <input type="time" name="start_time" class="form-control" value="{{$timing->start_time}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_short_name">Slot End Time</label>
                                <input type="time" name="end_time" class="form-control" value="{{$timing->end_time}}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="dvPassport">
    <div class="weekDays-selector">
        <input type="checkbox" id="chkEveryday" name="days[]" value = "" class="form-check-input">
        <label for="chkEveryday" class="form-check-label">Everyday</label>
        <br>
        <div id="week">
            <div class="form-check form-check-inline">
                <input type="checkbox"  name="days[]" value = "1" id="weekday-mon" class="form-check-input weekday">
                <label for="weekday-mon" class="form-check-label">MON</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"  name="days[]" value = "2" id="weekday-tue" class="form-check-input weekday">
                <label for="weekday-tue" class="form-check-label">TUE</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"  name="days[]" value = "3" id="weekday-wed" class="form-check-input weekday">
                <label for="weekday-wed" class="form-check-label">WED</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"  name="days[]" value = "4" id="weekday-thu" class="form-check-input weekday">
                <label for="weekday-thu" class="form-check-label">THU</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox"  name="days[]" value = "5" id="weekday-fri" class="form-check-input weekday">
                <label for="weekday-fri" class="form-check-label">FRI</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="days[]" value = "6 id="weekday-sat" class="form-check-input weekday">
                <label for="weekday-sat" class="form-check-label">SAT</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" name="days[]" value = "7" id="weekday-sun" class="form-check-input weekday">
                <label for="weekday-sun" class="form-check-label">SUN</label>
            </div>
        </div>
    </div>
</div>
            
                           
                    <div class="modal-footer form-row">
                        <a href="/category-timing"><button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancel</button></a>
                        <button type="submit" class="btn btn-orange ">Update</button>
                    </div>
                </form> 
            </div>
            </div>  
        </div>
        <div id="tab2">
        <div class="card shadow p-3">
            <div class="row">
                 <div class="col">
                     <h4>Associated Categories</h4>
                </div>
            <div class="col-auto">
              <a type="button" class="btn btn-orange" href="{{ route('category-timing.select_category', $timing->id) }}">Update Categories</a>  
             </div>
            </div>
            </div>

            <div class="card shadow p-3 mt-3">
            
            <table class="table table-hover">
                <thead>
                    <tr>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Associated Item</th>
                    <th scope="col">Parent Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $c)
                    <tr>
                    <td>{{$c->cat_name}}</td>
                    <td>{{$itemCounts[$c->id] }}</td>
                    <td>-</td>
                    
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


$(function () {
    // Fetch the selected days from the database and store them as an array
    
    var selectedDays = {!! json_encode($timing->days) !!}; 
   // console.log(selectedDays);
    var dataArray = JSON.parse(selectedDays);
    //console.log(dataArray);
    // Check the checkboxes based on the selectedDays array
    $.each(dataArray, function (index, value) {
        $("input[type='checkbox'][value='" + value + "']").prop("checked", true);
    });

    // Handle the "Everyday" checkbox
    $("#chkEveryday").click(function () {
        var isChecked = $(this).is(":checked");
        $(".weekday").prop("checked", isChecked);

        if (isChecked) {
            $("#week").hide();
        } else {
            $("#week").show();
        }
    });

    // Handle individual day checkboxes
    $(".weekday").click(function () {
        var areAllDaysChecked = $(".weekday:checked").length === 7;
        $("#chkEveryday").prop("checked", areAllDaysChecked);
    });
});

</script>
@endsection