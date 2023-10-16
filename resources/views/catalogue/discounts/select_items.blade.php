@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')

<div class="main-content">
    <div class="page-content">

        <form id="category-form" method="POST" action="{{ route('discounts.items', ['id' => Route::current()->parameter('id')]) }}"> @csrf
            <!-- Your checkboxes and table here -->

            <div class="card shadow">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <h3>Select items</h3>
                    <div class="d-flex align-items-center">
                        <div class="input-group mr-2">
                            <div class="search-box ms-2">
                                <input type="text" class="form-control search" id="searchInput" placeholder=" Search...">
                                <i class="ri-search-line search-icon "></i>
                            </div>

                            <button type="submit" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal" data-bs-target="#chargesModal">
                                Save</button>
                        </div>

                    </div>
                </div>
                <div class="container-fluid">
                    <table class="table table-light" id="dataTable">
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
                                    <input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$i->id}}" @if(in_array($i->id,
                                    $ids)) checked @endif
                                </td>
                                <td>{{$i->item_name}}</td>
                                <td>{{$i->cat_name}}</td>
                                <td>{{$i->item_default_sell_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </form>
    </div>

    @endsection