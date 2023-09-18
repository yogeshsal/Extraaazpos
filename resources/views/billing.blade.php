
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<br>
<div class="container">    
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a href="#delivery" role="tab" data-toggle="tab"
           class="nav-link active"> Delivery </a>
      </li>
      <li class="nav-item">
        <a href="#dinein" role="tab" data-toggle="tab"
           class="nav-link"> Dinein </a>
      </li>
      <li class="nav-item">
        <a href="#qsr" role="tab" data-toggle="tab"
           class="nav-link"> QSR </a>
      </li>
      <li class="nav-item">
        <a href="#takeaway" role="tab" data-toggle="tab"
           class="nav-link"> Takeaway </a>
      </li>
      <li class="nav-item">
        <a href="#advanceorder" role="tab" data-toggle="tab"
           class="nav-link"> Advance Orders </a>
      </li>
      <li class="nav-item">
        <a href="#plus" role="tab" data-toggle="tab"
           class="nav-link"> + </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" role="tabpanel" id="delivery">
        <h3> delivery </h3>
        <p> Lorem ipsum sit amet </p>
      </div>
      <div class="tab-pane" role="tabpanel" id="dinein">
        <h3> dinein </h3>
        <p> Lorem ipsum dolorem </p>
      </div>
      <div class="tab-pane" role="tabpanel" id="qsr">
        <h3> QSR </h3>
        <p> Lorem ipsum dolorem </p>
      </div>
      <div class="tab-pane" role="tabpanel" id="takeaway">
        <h3> Take Away </h3>
        <p> Lorem ipsum dolorem </p>
      </div>
      <div class="tab-pane" role="tabpanel" id="advanceorder">
        <h3> Advance Order </h3>
        <p> Lorem ipsum dolorem </p>
      </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
</script>
<script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous">
</script>
<script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous">
</script>



@endsection
