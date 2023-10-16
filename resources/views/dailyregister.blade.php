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
    margin-top: 200px;
}
</style>

<br>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Daily Register</h4>
                                </div>
                            </div>
                        </div>  -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Daily Register</h4>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">No Register Selected</h5>
                            <p class="card-text">Choose a register to open to start making sales.</p>
                            <button type="button" class="btn btn-orange " data-bs-toggle="modal"
                                data-bs-target="#chooseRegister"> Choose Register</button>
                            <div>
                                <div id="chooseRegister" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select Location</h5>
                                            </div>
                                            <div class="modal-body">

                                                @if (count($loc) === 0)
                                                <!-- Display a button when $loc is empty -->
                                                <div class="text-center">
                                                    <p>Registered Locations not found ! Kindly add.</p>
                                                    <a href="locations"><button type="button"
                                                            class="btn btn-primary">Add Location</button></a>
                                                </div>
                                                @else
                                                <!-- Display the select element when $loc is not empty -->
                                                <select id="selectedOption" class="form-select"
                                                    aria-label="Default select example" onchange="updateTextbox()">
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
                                                                <input type="text" name="location_name" hidden
                                                                    id="displayedValue">
                                                            </div>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-orange m-3">Select
                                                                    Register</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>

</div>


<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script> © Hybrix.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
@endsection



<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectElement = document.getElementById('mySelect');
    const selectedOptionElement = document.getElementById('selectedOption');

    // Initialize the selected option element with the default selected value
    selectedOptionElement.textContent = selectElement.value;

    // Add an event listener to the select element
    selectElement.addEventListener('change', function() {
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