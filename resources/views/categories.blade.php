
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')

<style>
  /* Custom CSS class to increase modal size */
.large-modal {
    max-width: 800px; /* Adjust the maximum width as needed */
}
  

</style>

<br>

    <div class="row">
        <div class="col-lg-6">
            <h3>Categories</h3>
        </div>
        <div class="col-lg-3 float-right">
        <input type="text" class="form-control m-1" />
        </div>
        <div class="col-lg-3">
            <button class="btn btn-secondary m-1" data-toggle="modal" data-target="#add_category">Add Category</button>
        </div>
    </div>
    @foreach($category as $cat)
        <div class="card mt-3 p-2">
            <div style="display: flex; align-items: center;">
                <div>
                    <img src="{{ asset('images/image2.png') }}" alt="" style="width: 90px; height: 90px;">
                </div>
                <div style="margin-left: 10px;">
                    <a href="{{ url('categories/' . $cat->id) }}"   ><h6>{{$cat->name}}</h6></a>
                    
                    <p>Handle: {{$cat->handle}}</p>
                </div>
            </div>
        </div>
    @endforeach




<!-- create Modal -->
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-left modal-lg large-modal" role="document">
        <div class="modal-content p-3">
            <h5>New Category</h5>
            <form method="POST">
                @csrf
                <div class="row mt-2">
                    <div class="col">
                        <p>Name</p>
                    <input name="name" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <p>Short Name</p>
                    <input type="text" name="short_name" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col mt-2">
                    <p>Handle</p>
                    <input type="text" name="handle" class="form-control">
                    </div>
                    <div class="col mt-2">
                    <p>Sort Order</p>
                    <input type="text" name="sort_order" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col mt-2">
                    <p>External Id</p>
                    <input type="number"name="external_id" class="form-control">
                    </div>
                    <div class="col mt-2">
                    <p>Timing Group</p>
                    <div class="form-group col">
                        <select class="form-control" name="external_group_id">
                            <option selected>Choose...</option>
                            <option>A</option>
                        </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control mt-3" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                <div class="form-check mt-3">
                <label>Select Outlets</label>
                    @foreach($location as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox-{{ $item->id }}" name="loc_id[]" value="{{ $item->id }}">
                        <label class="form-check-label" for="checkbox-{{ $item->id }}">
                            {{ $item->name }}
                        </label>
                    </div>
                    @endforeach
                </div>

                
                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-primary mt-3">Save</button>
            </form>
        </div>
    </div>
</div>



@endsection

