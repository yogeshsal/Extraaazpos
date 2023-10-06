
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<style>
    .grey-background {
        background-color: grey;
    }
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

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5; /* Light grey border between rows */
    }
    .btn.btn-outline-secondary {
        border-color: #6c757d; /* Set the default border color */
    }

    .btn.btn-outline-secondary:hover {
        border-color: orange; /* Change the border color to orange on hover */
        background-color: transparent;
        color:orange;
    }
</style>
<br>
<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Select Item</h3>
        <div class="d-flex align-items-center">
            <div class="input-group mr-2">
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Name" aria-label="Search" aria-describedby="search-addon" />
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Tags" aria-label="Search" aria-describedby="search-addon" />
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Categories" aria-label="Search" aria-describedby="search-addon" />
                <!-- <button type="button" class="btn btn-outline-primary m-1">Search</button> -->
                <!-- <button type="button" class="btn btn-outline-secondary m-1">Filters</button> -->
            <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#exampleModal">+ Save Items</a>
            </div>
            
        </div>
    </div>
    <hr>
    <div>
    <table id="dataTable">
    <thead>
        <tr >                
            <th class="grey-background">Name</th>
            <th class="grey-background">Category</th>
            <th class="grey-background">Sales Price</th>            
        </tr>
    </thead>
    <tbody>
    
    @foreach ($items as $item) 
   <tr>
    <td><input type="checkbox" name="selectedItems[]" value="{{$item->id}}">&nbsp; &nbsp; <a href="{{ route('updateItems', ['id' => $item->id, 'catid' => Route::current()->parameter('id') ]) }}">{{$item->item_name}}</a></td>
    <td>{{$item->cat_name}}</td>
    <td>{{$item->item_default_sell_price}}</td>
   </tr>     
    @endforeach
    </tbody>
</table>
</div>
</div>

@endsection



