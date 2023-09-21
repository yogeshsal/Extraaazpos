
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')


<style>
  .flex-container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.flex-column {
  display: flex;
  flex-direction: column;
}
</style>

<div class="row">
<div class="col-sm-8">
<div class="card mt-5">
  <!-- <div class="card-header">
    Featured
  </div> -->
  <div class="card-body">

  <div class="flex-container">
    <div class="flex-column">
      <h2>Session {{$id}}</h2> 
      <h6>Register : Register location name here</h6>     
    </div>
    <div class="flex-column">  
    <h6><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Calculated a few Seconds ago &nbsp; 
    <a href="/closeregister"><button class="btn btn-primary">Close Register</button></a>
    </div>
  </div>
    
  <table class="table table-hover table-bordered mt-5" >
    <thead>
      <tr>
        <th  scope="col">TYPE</th>
        <th  scope="col">OPENING</th>
        <th  scope="col">RECEIVED</th>
        <th  scope="col">ADJUSTMENTS</th>
        <th  scope="col">EXPECTED</th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>Cash</td>
          <td>{{number_format($opening_cash, 2, '.', ',') }}</td>
          <td></td>
          <td></td>
          <td>{{number_format($opening_cash, 2, '.', ',') }}</td>
        </tr>
        <tr>
          <td>Card</td>
          <td>{{number_format($opening_card, 2, '.', ',') }}</td>
          <td></td>
          <td></td>
          <td>{{number_format($opening_card, 2, '.', ',') }}</td>
        </tr>
        <tr>
          <td>Credit</td>
          <td>{{number_format($opening_credit, 2, '.', ',') }}</td>
          <td></td>
          <td></td>
          <td>{{number_format($opening_credit, 2, '.', ',') }}</td>
        </tr>
        <tr>
          <td>Upi</td>
          <td>{{number_format($opening_upi, 2, '.', ',') }}</td>
          <td></td>
          <td></td>
          <td>{{number_format($opening_upi, 2, '.', ',') }}</td>
        </tr>    
      </tbody>
    </table>
 </div>
</div>
</div>
<div class="col-sm-4">
    <div class="card mt-5">
      <div class="card-body">
        <div class="alert alert-primary" role="alert">
          <p>Register is open</p>
          Register was opened ... ago by name          
        </div>

       
        <table class="table table-borderless table-responsive">  
          <tbody>
          <tr>
              <td>Opened:</td>
              <td>{{$opened_at}}</td>      
            </tr>
            <tr>
              <td>Closed:</td>
              @if($status == 1)
              <td>Register Open</td>
              @else
              <td>{{ $closed_at }}</td>
              @endif
            </tr>
            <tr>
              <td>Duration:</td>
              <td></td>      
            </tr>            
          </tbody>
        </table>        
      </div>
    </div>
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




