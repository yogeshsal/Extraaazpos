
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<div class="card mt-5">
  <!-- <div class="card-header">
    Featured
  </div> -->
  <div class="card-body">
<button class="btn btn-primary ">Close Register</button>
  <table class="table table-hover table-bordered mt-5" >
        <thead>
            <tr>
            
            <th  scope="col">Type</th>
            <th  scope="col">Opening</th>
            <th  scope="col">Received</th>
            <th  scope="col">Adjustment</th>
            <th  scope="col">Expected</th>

            </tr>
        </thead>
    <tbody>
    <tr>
     
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
   
  </tbody>
</table>






  </div>
</div>







@endsection



</style>