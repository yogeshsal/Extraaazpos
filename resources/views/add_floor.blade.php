
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<style>
.add {
  margin: 0 auto;
  display: block;
  text-align: center;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Adjust the shadow properties as needed */
}
</style>
<br>
<div class="row card p-3 m-2">
    <h3>Floor Setting</h3>
    <div class="row">
        <div class="col-lg-8">
            <h6>Add Floor tables</h6>
        </div>
    </div>

    <div class="card">
        <div class="row">
        <form method="POST">
            @csrf
            <table class="table table-responsive table-hover">
            <thead>
                    <tr>
                        <th class="text-center" scope="col" >BALCONY</th>
                        <th class="text-center" scope="col">TABLES</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-control col-lg-4" type="number" name="balcony"  ></td>
                        <td><input class="form-control col-lg-4" type="number" name="table"  ></td>
                        <td><input type="hidden" class="form-control col-lg-6" type="number" name="loc_id" value="{{$loc_id}}"  ></td>
                    </tr>
    
                </tbody>
    
            </table>
        </div>
        <button type="submit" class=" add btn btn-orange col-lg-2 mb-4">Add </button>
       </form>
    </div>
</div>


@endsection
