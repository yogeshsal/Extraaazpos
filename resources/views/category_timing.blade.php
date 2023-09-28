
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
    <input type="text" class="form-control">
    </div>
    <div class="col-lg-3">
            <button class="btn btn-orange m-1" data-toggle="modal" data-target="#category_timing">New Category Timing</button>
        </div>
        
</div>

<!-- create Modal -->
<div class="modal fade" id="category_timing" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
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

                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancle</button>
                <button type="submit" class="btn btn-orange mt-3">Save</button>
            </form>
        </div>
    </div>
  
</div>
<div class="card mt-3">
        <div class="row">
        <table class="table table-responsive table-hover">
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
            <td>{{$t->name}}
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


@endsection
