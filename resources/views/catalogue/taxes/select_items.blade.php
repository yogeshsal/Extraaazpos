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

<div class="main-content">

    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">

                <h3>Select items</h3>
                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                            <i class="ri-search-line search-icon "></i>
                        </div>
                        <form id="category-form" method="POST"
                            action="{{ route('tax.items', ['id' => Route::current()->parameter('id')]) }}"> @csrf
                            <button type="submit" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal"
                                data-bs-target="#chargesModal">
                                Save</button>
                    </div>

                </div>
            </div>

            <table id="dataTable">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Selling Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $i)
                    <tr>
                        <td>
                            <input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]"
                                id="items-{{$i->id}}" @if(in_array($i->id, $ids)) checked @endif
                        </td>
                        <td>{{$i->item_name}}</td>
                        <td>{{$i->cat_name}}</td>
                        <td>{{$i->item_default_sell_price}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </form>


        </div>
    </div>
</div>
</div>












@endsection