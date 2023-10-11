
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Category Timing</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li> -->
                                <li class="breadcrumb-item active">Items</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                        </div> -->
                        <!-- end card header -->

                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <!-- <div class="col-sm-auto">
                                        <div>
                                            <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                        </div>
                                    </div> -->
                                    <div class="col-sm">

                                        <div class="d-flex justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-secondary">Help</button>&nbsp;&nbsp;
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-outline-secondary ml-1">Filter</button>&nbsp;&nbsp;
                                            <button type="button" class="btn btn-orange  add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap data-table" id="data-table">
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th class="grey-background sort " data-sort="customer_name">NAME</th>
                                                <th class="grey-background sort " data-sort="Description">Description</th>
                                                <th class="grey-background sort " data-sort="category">SLOT COUNT</th>
                                                <th class="grey-background sort " data-sort="update">UPDATED</th>

                                                <!-- <th class="sort" data-sort="customer_name">Customer</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="phone">Phone</th>
                                                <th class="sort" data-sort="date">Joining Date</th>
                                                <th class="sort" data-sort="status">Delivery Status</th>
                                                <th class="sort" data-sort="action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
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
<div class="modal fade" id="category_timing" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-left modal-lg large-modal" role="document">
        <div class="modal-content p-3">
            <h5>New Timing Group</h5>
            <form method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="col">
                        <p>Name</p>
                    <input name="name" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <p>Handle</p>
                    <input type="text" name="handle" class="form-control">
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control mt-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row mt-2">
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
        <input type="checkbox" id="chkEveryday" name="days[]" value = "0" class="form-check-input" >
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


                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-orange mt-3">Save</button>
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
   $(function () {
        $("#chkEveryday").click(function () {
           
            var isChecked = $(this).is(":checked");
            $(".weekday").prop("checked", isChecked);

            if ($(this).is(":checked")) {
                $("#week").hide();
                
            } else {
                $("#week").show();
                
            }
         });

        $(".weekday").click(function () {
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
