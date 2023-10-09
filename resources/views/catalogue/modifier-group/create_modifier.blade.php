@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<style>
    .form-row {
        margin-bottom: 20px; /* Add space below each row */
    }
</style>

<style>
    * {
  margin: 0 auto;
  box-sizing:border-box;
  font-family: Roboto, sans-serif;
}

/* body{
  background:#222;
} */

#content1 {
  max-width: 100vw;
}
/* .tabContainer {
  background: #333;
  border: .45px solid #555;
  margin: 0 auto;
} */
.tabContent {
  padding: 10px;
  text-align: left;
  min-height:200px;
  color:#000000;
}
/* Hide all but first tab */
.tabContent > div:not(:first-child) {
  display: none;
}

.tabContainer > .tabs {
  overflow: hidden;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
}
.tabs li {
  float: left;
  display: flex;
  flex: 1;
}
.tabs a {
  position: relative;
  background: #fff;
  border-top: 3px solid rgba(0,0,0,0);
  padding: 1em .5em;
  float: left;
  text-decoration: none;
  color: #000000;
  margin: 0 .1em 0 0;
  font-size: 1em;
  flex: 1;
  transition: all .35s ease;
}
.tabs a.active {
  border-top: 3px solid #f39d77;
  color: #000000;
  background: inherit;
}
.tabs a:hover {
  background: #fff;
  color: orange;
}
</style>

<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id="content1">
  <div class="tabContainer">
    
    <div class="tabContent">
        <div id="tab1">   
        
            <div class="container shadow p-4">
            <h1>Create New Modifier</h1>
            <div>
                <form action="{{ route('modifiergroups.modifier', ['id' => Route::current()->parameter('id')]) }}" method="POST">
                    @csrf
                    
                    <div class="col-md-12">
                            <div class="form-group">
                            <label for="name">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control">
                            </div>
                    </div>

                    <div class="col-md-12 mt-3">
                            <div class="form-group">
                            <label for="name">Short Name<span class="text-danger">*</span></label>
                                <input type="text" name="short_name" class="form-control">
                            </div>
                    </div>


                    <div class="row form-row mt-3">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Default sales Price<span class="text-danger">*</span></label>
                                <input type="text" name="default_sale_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Aggregator sales price</label>                                
                                <input type="text" name="aggregator_sales_price" class="form-control" >
                            </div>
                        </div>
                    </div>

                    <div class="row form-row mt-3">                        
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Food Type</label>          
                            <select class="form-select" aria-label="Default select example" name="food_type">
                                <option selected>Select Food Type</option>
                                @foreach($foodtype as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                               @endforeach
                            </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sort Order</label>                                
                                <input type="text" name="sort_order" class="form-control" >
                            </div>
                        </div>
                    </div>
                
                   
                    </div>       
                    <div class="modal-footer form-row">
                        
                        <button type="submit" class="btn btn-orange">Create Modifier</button>
                    </div>
                </form> 
            </div>
            </div>  
        </div>        
       
</div>
<!-- /content -->






@endsection