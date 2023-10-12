@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<style>
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
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-xxl-12">

                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" aria-selected="false">
                                        Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-bs-toggle="tab" href="#product1" role="tab" aria-selected="false">
                                        Categories
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content  text-muted">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <form action="{{ route('category-timing.update', $timing->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" name="name" class="form-control my-2 my-2" value="{{ $timing->name }}">
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="handle">Handle</label>
                                                    <input type="text" name="handle" class="form-control my-2" value="{{$timing->handle}}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row ">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <!-- <textarea name="description" value="{{$timing->description}}" class="form-control mt-3" rows="4"></textarea> -->
                                                <input style="height: 80px;" type="text" name="description" class="form-control" value="{{$timing->description}}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row ">
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label for="item_name">Slot Start Time</label>
                                                    <input type="time" name="start_time" class="form-control my-2 my-2" value="{{$timing->start_time}}">


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
                                            <div class="weekDays-selector ">

                                                <input type="checkbox" id="chkEveryday" name="days[]" value="" class="form-check-input">
                                                <label for="chkEveryday" class="form-check-label">Everyday</label>
                                                <br>
                                                <br>
                                                <div id="week">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="1" id="weekday-mon" class="form-check-input weekday">
                                                        <label for="weekday-mon" class="form-check-label">MON</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="2" id="weekday-tue" class="form-check-input weekday">
                                                        <label for="weekday-tue" class="form-check-label">TUE</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="3" id="weekday-wed" class="form-check-input weekday">
                                                        <label for="weekday-wed" class="form-check-label">WED</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="4" id="weekday-thu" class="form-check-input weekday">
                                                        <label for="weekday-thu" class="form-check-label">THU</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="5" id="weekday-fri" class="form-check-input weekday">
                                                        <label for="weekday-fri" class="form-check-label">FRI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="6 id=" weekday-sat" class="form-check-input weekday">
                                                        <label for="weekday-sat" class="form-check-label">SAT</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="days[]" value="7" id="weekday-sun" class="form-check-input weekday">
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
                        <div class="tab-content  text-muted">
                            <div class="tab-pane " id="product1" role="tabpanel">

                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Associated Categories</h4>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-auto">
                                                <a type="button" class="btn btn-orange" href="{{ route('category-timing.select_category', $timing->id) }}">Update Categories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>NAME</th>
                                            <th>Associated Item </th>
                                            <th>Parent Category</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($categories as $c)
                                        <tr>
                                            <td>{{$c->cat_name}}</td>
                                            <td>{{ $itemCounts[$c->id] }}</td>
                                            @foreach ($categoryNames as $categoryName)
                                            <td>{{ $categoryName }}</td>
                                            @endforeach
                                            @if (empty($categoryNames))
                                            <td>-</td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /tabContent -->
            </div>
            <!-- /tabContainer -->

        </div>
        <!-- /content -->


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


            $(function() {
                // Fetch the selected days from the database and store them as an array

                var selectedDays = {
                    !!json_encode($timing - > days) !!
                };
                // console.log(selectedDays);
                var dataArray = JSON.parse(selectedDays);
                //console.log(dataArray);
                // Check the checkboxes based on the selectedDays array
                $.each(dataArray, function(index, value) {
                    $("input[type='checkbox'][value='" + value + "']").prop("checked", true);
                });

                // Handle the "Everyday" checkbox
                $("#chkEveryday").click(function() {
                    var isChecked = $(this).is(":checked");
                    $(".weekday").prop("checked", isChecked);

                    if (isChecked) {
                        $("#week").hide();
                    } else {
                        $("#week").show();
                    }
                });

                // Handle individual day checkboxes
                $(".weekday").click(function() {
                    var areAllDaysChecked = $(".weekday:checked").length === 7;
                    $("#chkEveryday").prop("checked", areAllDaysChecked);
                });
            });
        </script>
        @endsection