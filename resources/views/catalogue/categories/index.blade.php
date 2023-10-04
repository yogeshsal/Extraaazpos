
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')

<style>
  /* Custom CSS class to increase modal size */
.large-modal {
    max-width: 800px; /* Adjust the maximum width as needed */
}
.form-row {
        margin-bottom: 20px; /* Add space below each row */
    } 
</style>
<style>
    .table-image {
        width: 100px; /* Set the desired width */
        height: auto; /* Auto-adjust the height to maintain the aspect ratio */
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
            <button class="btn btn-orange m-1" data-toggle="modal" data-target="#add_category">Add Category</button>
        </div>
    </div>
    @foreach($category as $category)
        <div class="card mt-3 p-2">
            <div style="display: flex; align-items: center;">
                <div>
                
                @if ($category->cat_image)
                    <img src="{{ asset('storage/'.$category->cat_image) }}" alt="Image" class="table-image">
                @else
                    <img src="{{ asset('storage/item_images/placeholder.png') }}" alt="Placeholder Image" class="table-image">
                @endif
                
               
                </div>
                <div style="margin-left: 10px;">
                <a href="{{ route('categories.edit', ['id' => $category->id]) }}">{{$category->cat_name}}</h6></a>
                    
                    <p>Handle: {{$category->cat_handle}}</p>
                </div>
            </div>
        </div>
    @endforeach
    




<!-- create Modal -->
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-left modal-lg large-modal" role="document">
        <div class="modal-content p-3">
            <h5>New Category</h5>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_name">Name:</label>
                            <input type="text" name="cat_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_short_name">Short Name:</label>
                            <input type="text" name="cat_short_name" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_handle">Handle:</label>
                            <input type="text" name="cat_handle" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_timing_group">Category Timing Group:</label>
                            <select name="cat_timing_group" class="form-select" aria-label="Default select example">
                                <option selected>------</option>
                                @foreach($timing as $t)
                                <option value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                </div>

                
                
                <div class="row form-row">
                    <div class="form-group">
                        <label for="cat_desc">Description</label>
                        <textarea name="cat_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                </div>

                
              
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-orange mt-3">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

