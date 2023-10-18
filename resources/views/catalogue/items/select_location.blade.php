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
    font-weight: 950;
    font-size: small;
}

tr {
    border-bottom: 2px solid #F5F5F5;
    /* Light grey border between rows */
}
</style> <br>
<div class="main-content">
    <div class="page-content">
        <!-- <div class=" row card shadow p-3">

    <h3>Associate Locations</h3>



    <div class="row">
      <div class="col-lg-5">
        <input type="text" class="form-control">
      </div>



      <div class="col-lg-7">
        <form method="POST" action="{{ route('loction.items', ['id' => Route::current()->parameter('id')]) }}">
          @csrf
          Your checkboxes and table here

          <button class="btn btn-orange m-1" type="submit">Save</button>

      </div>
    </div>

    <br><br>
    <br> -->

        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Associate Location</h3>

                </div>

                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">

                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>&nbsp;&nbsp;

                        <form method="POST"
                            action="{{ route('loction.items', ['id' => Route::current()->parameter('id')]) }}">
                            @csrf
                            <!-- Your checkboxes and table here -->

                            <button class="btn btn-orange" type="submit">Save</button>
                    </div>

                </div>
            </div>






            <table id="data-table">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">city</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($location as $loc)
                    <tr>
                        <td><input value="{{$loc->id}}" class="items-checkbox" type="checkbox" name="selected_items[]"
                                id="items-{{$loc->id}}" @if(in_array($loc->id,
                            $ids)) checked @endif></td>
                        <td>{{$loc->name}}</td>
                        <td>{{$loc->city}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            </form>
        </div>
        <div>
        </div>
        <div>



            @endsection