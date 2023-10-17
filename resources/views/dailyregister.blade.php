@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')



<div class="main-content"> <div class="page-content"> <div class="card alert alert-light shadow">
    <div class="d-flex justify-content-between align-content-center my-2">
        <div>
            <h3>DAILY REGISTER</h3>
        </div>


    </div>


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="text-center">
                <h5>No Register Selected</h5>
                <h6>Choose a register to start making sales.</h6>
                <button type="button" class="btn btn-sm btn-orange m-1" data-bs-toggle="modal"
                            data-bs-target="#chooseRegister">
                            <i class="bi bi-plus-lg fw-bolder text-white"></i> Choose Register</button>

                            


            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-lg" id="chooseRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Select Location</h4>
                </div>

                 <div class="modal-body">

                        @if (count($loc) === 0)
                        <!-- Display a button when $loc is empty -->
                        <div class="text-center">
                            <p>Registered Locations not found ! Kindly add.</p>
                            <a href="locations"><button type="button" class="btn btn-primary">Add Location</button></a>
                        </div>
                        @else
                        <!-- Display the select element when $loc is not empty -->
                        <select id="selectedOption" class="form-select" aria-label="Default select example"
                            onchange="updateTextbox()">
                            <option value="" disabled required selected>Select a location
                            </option>
                            @foreach ($loc as $location)
                            <option value="{{ $location['name'] }}">{{ $location['name'] }}
                            </option>
                            @endforeach
                        </select>
                        @endif
                        <div class="row">
                            <div class="col">

                                <form name="add_location" id="add_location" method="post"
                                    action="{{url('select_register')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="location_name" hidden id="displayedValue">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-orange m-3">Select
                                            Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                    
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('mySelect');
    const selectedOptionElement = document.getElementById('selectedOption');

    // Initialize the selected option element with the default selected value
    selectedOptionElement.textContent = selectElement.value;

    // Add an event listener to the select element
    selectElement.addEventListener('change', function() {
        selectedOptionElement.textContent = selectElement.value;
        var selecte dOpti        lectElement.value;
          var optionValue = selectedOpti             document.getElementByI d ("optionValue").value = optionValue;
    });
});

function updateTextbox() {
    // Get the selected option element
                                                                                                                                                                                                                                                                                                                                                                                                                                                            dOptionElement = document.getElem e ntById("selectedOption                                                                                                                                                                                                                                                                                                                                                                                                                                                         Get the selected option's value
    var selecte                                                                                                                                                                                                                                                                                                                                                                                                                                                          = selectedOptionElement.value;

    // Display t he se                                                                                                                                                                                                                                                                                                                                                                                                                                                             textbox
    var displayedValueEle m ent = document.getEle                                                                                                                                                                                                                                                                                                                                                                                                                                                             alue");
    displayedVa l ueElement.value = sel
}                                                                                                                                                                                                                                                                                                                                                                                                                                                             
// Call the fu n ction to initialize t                                                                                                                                                                                                                                                                                                                                                                                                                                                             ateTextbox();
</script>
@endsection