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
    <ul class="tabs">
      <li><a src="tab1" href="javascript:void(0);" class="active">Basic Information</a></li>
      <li><a src="tab2" href="javascript:void(0);">items</a></li>
      <li><a src="tab3" href="javascript:void(0);">Modifiers</a></li>      
    </ul>
    <div class="tabContent">
        <div id="tab1">   
            <div class="container shadow p-4">
            <!-- <div class="card shadow p-3">        -->
            <div>
                <form action="{{ route('modifiergroups.update', $modifiergroup->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row form-row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                              <p>Select modifier group type</p>  
                              <p><b>Add-On:</b> More than one modifiers can be selected with the item (Eg: Pizza Toppings)</p>
                              <p><b>Variant:</b> Only one modifier can be selected with the item (Eg: Size of Pizza)</p>
                            </div>
                        </div>                       
                        <div class="col-md-6 mt-4">
                            <div class="form-group">
                            <label for="modifier_group_type">Modifier Group Type <span class="text-danger">*</span></label>
                                
                            <select name="modifier_group_type" id="modifier_group_type" class="form-control">
                                    <option value="" disabled selected>Select Type</option>
                                    <option value="add_on">Add On</option>
                                    <option value="variant">Variant</option>                                                                        
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Min Selectable <span class="text-danger">*</span></label>
                                        <input type="text" name="item_default_sell_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Max Selectable <span class="text-danger">*</span></label>
                                        <input type="text" name="item_default_sell_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Title<span class="text-danger">*</span></label>
                                <input type="text" name="modifier_group_name" class="form-control" value={{$modifiergroup->modifier_group_name}}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Short Name</label>                                
                                <input type="text" name="modifier_group_short_name" class="form-control" value={{$modifiergroup->modifier_group_short_name}}>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modifier_group_handle">Handle</label>
                                <input type="text" name="modifier_group_handle" class="form-control" value={{$modifiergroup->modifier_group_handle}}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="form-group">
                            <label for="modifier_group_desc">Description</label>
                            <!-- <textarea name="modifier_group_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4" value={{$modifiergroup->modifier_group_desc}}></textarea> -->
                            <textarea name="modifier_group_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4">{{$modifiergroup->modifier_group_desc}}</textarea>

                        </div>
                    </div>       
                    <div class="modal-footer form-row">
                        <a href="\items"><button type="button" class="btn btn-secondary m-2" data-dismiss="modal">Cancel</button></a>
                        <button type="submit" class="btn btn-orange">Update</button>
                    </div>
                </form> 
            </div>
            </div>  
        </div>        
        <div id="tab2">
            <span>Inside Tab 2, how <b>interesting</b>.</span>
        </div>
        <div id="tab3">
            <span>Inside Tab 3, how <b>interesting</b>.</span>
        </div>        
    </div>
    <!-- /tabContent -->
  </div>
  <!-- /tabContainer -->
</div>
<!-- /content -->







<script>
    $(document).ready(function () {
        $('#item_is_recommended').bootstrapSwitch();
        $('#item_is_package_good').bootstrapSwitch();
        $('#item_sell_by_weight').bootstrapSwitch();
    });
</script>

<script>
    $("#content").on("click", ".tabContainer .tabs a", function(e) {
  e.preventDefault(),
  $(this)
    .parents(".tabContainer")
    .find(".tabContent > div")
    .each(function() {
      $(this).hide();
    });
  
  $(this)
    .parents(".tabs")
    .find("a")
    .removeClass("active"),
    $(this).toggleClass("active"), $("#" + $(this).attr("src")).show();
});

</script>
@endsection