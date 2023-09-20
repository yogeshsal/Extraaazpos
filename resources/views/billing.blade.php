
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<style>
  .menu ul {
      list-style-type: none;
  }
  .menu li {
      display: inline-block;
      vertical-align: middle;
      text-align: center;
  }
  .circle {
      border-radius: 100px;
      width: 100px;
      height: 100px;
      line-height: 100px;
      background: #999da3;
      margin-left: 5px;
  }
  </style>

  <style>
    .selectWrapper{
    border-radius:0px;
    display:inline-block;
    overflow:hidden;
    background:#cccccc;
    border:1px solid #cccccc;
    margin-left: 555px;
  }
    .selectBox{
    width:140px;
    height:40px;
    border:0px;
    outline:none;
  }
  </style>
  

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
        <div class="row">
          <div class="col-sm-8">
            <div class="card" >
              <div class="card-body"> 
                <!-- <div class="alert alert-secondary" role="alert"> -->
                  <div class="selectWrapper">
                    <select class="selectBox">
                      <option>Balcony Section</option>
                      <option>Table</option>  
                    </select>
                  </div>
                <!-- </div> -->
                <hr>
                <div class="menu">
                    <ul>
                        <a href=""><li class="circle">One</li></a>
                        <li class="circle">Two</li>
                        <li class="circle">Three</li>
                        <li class="circle">Four</li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card" style="display: none">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
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
