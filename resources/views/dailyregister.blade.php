@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<div class="row text-center">
   
    <!-- <div class="card" >
      <div class="card-body">
           <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div> -->
    <div class="center-container">
    <div class="centered-card">
    <h5 class="card-title">No Register Selected</h5>
                <p class="card-text">Choose a register to open to start making sales.</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Choose Register
              </button>
    </div>
</div>
         
   
</div>


<!-- Modal -->
<div class="modal fade  bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <select id="mySelect" class="form-select" aria-label="Default select example">
        <!-- <option selected>Choose Location Here</option> -->
        <option value="" disabled selected>Select a location</option>
        <php $i = 1 ?>
        @foreach ($loc as $location)
        
        <option value = "{{ $location['name'] }}" >{{ $location['name'] }}</option>
        <php $i++ ?>
        @endforeach
      </select><br>
         
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><h1 id= "selectedOption"></h1></h5>
              
              <a href="/create_register" class="btn btn-primary">Select Register</a>
            </div>
          </div>
        </div>
      </div>
      </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
            </div>
          </div>
        </div>
      </div>







@endsection

<style>
  .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
   
}

.centered-card {
   margin-top:200px;
  
}


</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('mySelect');
        const selectedOptionElement = document.getElementById('selectedOption');

        // Initialize the selected option element with the default selected value
        selectedOptionElement.textContent = selectElement.value;

        // Add an event listener to the select element
        selectElement.addEventListener('change', function () {
            selectedOptionElement.textContent = selectElement.value;
        });
    });
</script>