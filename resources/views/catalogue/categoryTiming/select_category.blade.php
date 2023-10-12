@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<br>
<div class="main-content">
    <div class="page-content">
        <div class="row card shadow mx-3 p-3">
            <div class="d-flex justify-content-between">
                <h3>Select Category</h3>
                <form id="category-form" method="POST"
                    action="{{ route('associate.categories', ['id' => Route::current()->parameter('id')]) }}"> @csrf
                    <button class="btn btn-orange m-1 float-end" type="submit">Associate Categories</button>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-7 py-2">
                    <label for="name" class="text-muted">Name</label>
                    <input type="text" id="name" class="form-control">
                </div>
            </div>

            <table class="table table-hover mt-2 px-1">
                <thead>
                    <tr style="background-color:#f5f5f5;">
                        <th><input type="checkbox" name="" id=""></th>
                        <th class="text-muted">Name</th>
                        <th class="text-muted">Timing Group</th>
                        <th class="text-muted">Associated Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $i)
                    <tr>
                        <td><input value="{{$i->id}}" class="category-checkbox" type="checkbox"
                                name="selected_categories[]" id="category-{{$i->id}}"></td>
                        <td>{{$i->cat_name}}</td>
                        <td>{{$i->name}}</td>
                        <td>{{ $itemCounts[$i->id] }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>

@endsection