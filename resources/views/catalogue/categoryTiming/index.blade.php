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
                    <h3 class="p-0">Category Timing</h3>
                    <p class="text-muted">Central repository for all your category timings</p>
                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <button type="button" class="btn btn-outline-secondary m-1"> <i class="bi bi-question-circle"></i> Help</button>
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>&nbsp;&nbsp;


                        <button type="button" class="btn btn-outline-secondary m-1"><i class="bi bi-sliders2"></i> Filters</button>
                        <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#chargesModal">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> New Category Timing</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>DESCRIPTION </th>
                        <th>SLOT COUNT </th>
                        <th>UPDATED</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($time as $t)
                    <tr>
                        <td>
                            <a href="{{ route('category-timing.edit', ['id' => $t->id]) }}">
                                {{ $t->name }}
                            </a>
                            <br>
                            handle :{{$t->handle}}
                        </td>
                        <td>{{$t->description}}</td>
                        <td>Slot Count</td>
                        <td>{{ $t->updated_at->format('d M, Y - h:i A') }}
                            <br>
                            {{$t->username}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- create Modal -->
            <div class="modal fade modal-lg" id="chargesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">New Timing Group</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <p>Name</p>
                                            <input name="name" type="text" class="form-control">
                                        </div>
                                        <div class="col">
                                            <p>Handle</p>
                                            <input type="text" name="handle" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Slot Start Time</p>
                                            <input name="start_time" type="time" class="form-control">
                                        </div>
                                        <div class="col">
                                            <p>Slot end Time</p>
                                            <input type="time" name="end_time" class="form-control">
                                        </div>
                                    </div>

                                    <br>

                                    <div id="dvPassport">
                                        <div class="weekDays-selector">
                                            <input type="checkbox" id="chkEveryday" name="days[]" value="0" class="form-check-input">
                                            <label for="chkEveryday" class="form-check-label">Everyday</label>
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

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-orange mt-3">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="d-flex justify-content-end">
                        {!! $time->links() !!}
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $("#chkEveryday").click(function() {

                    var isChecked = $(this).is(":checked");
                    $(".weekday").prop("checked", isChecked);

                    if ($(this).is(":checked")) {
                        $("#week").hide();

                    } else {
                        $("#week").show();

                    }
                });

                $(".weekday").click(function() {
                    var areAllDaysChecked = $(".weekday:checked").length === 7;
                    $("#chkEveryday").prop("checked", areAllDaysChecked);

                });
            });
            // Function to filter the table based on user input
            function filterTable() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("dataTable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2]; // Change the index to match the column you want to search
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }

            // Add an event listener to the search input
            document.getElementById("searchInput").addEventListener("keyup", filterTable);
        </script>
        @endsection