@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>



<div class="row card shadow p-3">
    <h3>Select items</h3>
    <div class="row">
        <div class="col-lg-5">
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-7">
            <form id="category-form" method="POST"
                action="{{ route('discounts.items', ['id' => Route::current()->parameter('id')]) }}"> @csrf
                <!-- Your checkboxes and table here -->

                <div class="main-content">

                    <div class="page-content">
                        <div class="card shadow">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <h3>Select items</h3>
                                <div class="d-flex align-items-center">
                                    <div class="input-group mr-2">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" id="searchInput"
                                                placeholder=" Search...">
                                            <i class="ri-search-line search-icon "></i>
                                        </div>
                                       
                                            <button type="submit" class="btn btn-sm btn-orange m-1"
                                                data-bs-toggle="modal" data-bs-target="#chargesModal">
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
                                            <input value="{{$i->id}}" class="items-checkbox" type="checkbox"
                                                name="selected_items[]" id="items-{{$i->id}}" @if(in_array($i->id,
                                            $ids)) checked @endif
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