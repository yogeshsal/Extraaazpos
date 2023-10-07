
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="row card shadow p-3">
<h3>Category Timings</h3>
<div class="row">
    <div class="col-lg-6">
        <h6>Central repository for all your category timings</h6>
    </div>
 
    <div class="col-lg-3">
        <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
    </div>
    <div class="col-lg-3">
            <button class="btn btn-orange m-1" data-toggle="modal" data-target="#category_timing">New Category Timing</button>
        </div>
        
</div>

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
<div class="card mt-3">
        <div class="row">
        <table class="table table-responsive table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">SLOT COUNT</th>
      <th scope="col">UPDATED</th>
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
