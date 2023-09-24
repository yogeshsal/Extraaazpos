@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')

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

<br>
<div class="row text-center">
  <div class="center-container">
    <div class="centered-card">
      <h5 class="card-title">No Register Selected</h5>
      <p class="card-text">Choose a register to open to start making sales.</p>
      <button type="button" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal">
      Choose Register
      </button>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade  bd-example-modal-md" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>        
      </div>
      <div class="modal-body">
      
      @if (count($loc) === 0)
    <!-- Display a button when $loc is empty -->
    <div class="text-center">
        <p>Registered Locations not found ! Kindly add.</p>
        <a href="/location"><button type="button" class="btn btn-primary">Add Location</button></a>
    </div>
@else
    <!-- Display the select element when $loc is not empty -->
    <select id="selectedOption" class="form-select" aria-label="Default select example" onchange="updateTextbox()">
        <option value="" disabled required selected>Select a location</option>
        @foreach ($loc as $location)
            <option value="{{ $location['name'] }}">{{ $location['name'] }}</option>
        @endforeach
    </select>
@endif             
      <div class="row">
        <div class="col">
                 
              <form name="add_location" id="add_location" method="post" action="{{url('select_register')}}">
                @csrf
                <div class="form-group">          
                <input type="text" name ="location_name" hidden id="displayedValue">
                </div> 
                <div class="text-center">       
                <button type="submit" class="btn btn-orange m-3" >Select Register</button>
                </div>
              </form>

              <!-- <a href="/create_register"><button type="submit" class="btn btn-success m-3" >Select Register</button></a> -->
        
        </div>
      </div>
      </div>      
    </div>
  </div>
</div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('mySelect');
        const selectedOptionElement = document.getElementById('selectedOption');

        // Initialize the selected option element with the default selected value
        selectedOptionElement.textContent = selectElement.value;

        // Add an event listener to the select element
        selectElement.addEventListener('change', function () {
            selectedOptionElement.textContent = selectElement.value;
            var selectedOptionValue = selectElement.value;
            var optionValue = selectedOptionValue;
            document.getElementById("optionValue").value = optionValue;
        });
    });
</script>


<script>
        function updateTextbox() {
            // Get the selected option element
            var selectedOptionElement = document.getElementById("selectedOption");

            // Get the selected option's value
            var selectedOptionValue = selectedOptionElement.value;

            // Display the selected value in the textbox
            var displayedValueElement = document.getElementById("displayedValue");
            displayedValueElement.value = selectedOptionValue;
        }

        // Call the function to initialize the textbox value
        updateTextbox();
    </script>


