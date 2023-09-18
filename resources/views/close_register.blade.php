
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<div class="card mt-5">
  <!-- <div class="card-header">
    Featured
  </div> -->
  <div class="card-body">
  <div class="d-flex justify-content-end">
  <button class="btn btn-primary">Close Register</button>
</div>
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
      <td>Cash</td>
      <td>{{$opening_cash}}</td>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <td>Card</td>
      <td>{{$opening_card}}</td>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <td>Credit</td>
      <td>{{$opening_credit}}</td>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <td>Upi</td>
      <td>{{$opening_upi}}</td>
      <td></td>
      <td></td>
      </tr>
    
    </tbody>
</table>
 </div>
</div>

<div class="card mt-5">
  <!-- <div class="card-header">
    Featured
  </div> -->
  <div class="card-body">
    <h3>Payments</h3>
  <table  id="myTable"  class="table table-hover table-bordered mt-5" >
        <thead>
            <tr>
            
            <th  scope="col">No</th>
            <th  scope="col">Payment Type</th>
            <th  scope="col">Bill</th>
            <th  scope="col">Amount</th>
            <th  scope="col">Credit</th>

            </tr>
        </thead>
    <tbody>
    <tr>
      <td>e</td>
      <td>d</td>
      <td>c</td>
      <td>s</td>
      <td>w</td>
      </tr>
      <tr>

    </tbody>
  </table>






  </div>
</div>

@endsection





<script>


  $(document).ready( function () {
    $('#myTable').DataTable();
} );

  </script>


