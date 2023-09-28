
@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<style>
  .menu ul {
      list-style-type: none;
  }
  /* .menu li {
      display: inline-block;
      vertical-align: middle;
      text-align: center;
  } */
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

        /* Center-align the text */
        .card-title {
            text-align: center;
        }

        .circle-container {
        display: flex;
        flex-wrap: wrap; /* Wrap circles to the next line when they don't fit horizontally */
        justify-content: center; /* Center the circles horizontally */
    }

    .circle {
        width: 100px; /* Adjust the width of each circle */
        height: 100px; /* Adjust the height of each circle */
        background-color: #3498db;
        border-radius: 50%;
        margin: 30px; /* Add spacing between circles */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        color: white;
    }
    .clicked-circle {
    background-color: #F37429; /* Change the background color to your desired color */
    color: white; /* Change the text color to contrast with the new background color */
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Adjust the shadow properties as needed */
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
      <!-- <li class="nav-item">
        <a href="#plus" role="tab" data-toggle="tab"
           class="nav-link"> + </a>
      </li> -->
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" role="tabpanel" id="delivery">
        <h3> delivery </h3>
        <p> Work in progress... </p>
      </div>
      <div class="tab-pane" role="tabpanel" id="dinein">
        <br>
        <div class="row">
          <div class="col-sm-8">
            <div class="card" >
              <div class="card-body"> 
                <!-- <div class="alert alert-secondary" role="alert"> -->
                  <div class="selectWrapper">
                   <select class="selectBox " id="dropdown">
                      <option value="balcony">Balcony Section</option>
                      <option value="table">Table</option>
                  </select>
                  </div>
                <!-- </div> -->
                <hr>
                <div class="menu">
                    <ul>
                    <div id="balconyDiv">
                      <li onclick="showBalcony()">
                          <div class="circle-container">
                              @for ($i = 1; $i <= $bal; $i++)
                                  <div class="circle" id="bal-{{ $i }}" onclick="showCircleDetails(this)">
                                      <span class="circle-number">{{ $i }}</span>
                                  </div>
                              @endfor
                          </div>
                      </li>
                    </div>

                      <div id="tableDiv" style="display: none;">
                          <li onclick="showTable()">
                              <div class="circle-container">
                                  @for ($i = 1; $i <= $table; $i++)
                                      <div class="circle" id="table-{{ $i }}" onclick="showCircleDetails(this)">
                                          <span class="circle-number">{{ $i }}</span>
                                      </div>
                                  @endfor
                              </div>
                          </li>
                      </div>
                    </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div id="circleDetailDiv" class="card" style="display: none">
              <div class="card-body">
                <h4 class="card-title">Table - <span id="circleNumberSpan"></span></h4>
                
                <center><p class="card-text">How many people are at the table ?</p></center>
                <br>


                <center>
                <!-- counter -->
                <div class="counter-container">                
                  <button class="counter-button" id="minusButton">-</button>  
                  <span id="counterValue">0</span>
                  <button class="counter-button" id="plusButton">+</button>
                </div>
                </center>
                <!-- counter -->
                <br>
                <center><p class="card-text">Add Customer</p></center>
                
                <center>
    <button data-toggle="modal" data-target="#customer" type="button" class="btn btn-outline-secondary" id="selectCustomerButton">
        Customer: Select Customer
    </button>
</center>

                 <!-- Modal -->
<div class="modal fade" id="customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <select class="form-select" aria-label="Default select example" id="customerSelect">
                        <option selected>Select Customer</option>
                        @foreach($customer as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCustomerButton" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>

<br>
                <center><p class="card-text">Add Server</p></center>
                
                <center><button type="button" class="btn btn-outline-secondary">Server : Select Server</button><center>
                <a href= "orders"><button type="button" class="btn btn-orange mt-2">New Bill</button></a>
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




<script>
        // Function to show the div
        function showtable1() {
            var div = document.getElementById('table1');
            div.style.display = 'block';
        }
    </script>


<script>
        // Get references to the buttons and the counter value
        const minusButton = document.getElementById('minusButton');
        const plusButton = document.getElementById('plusButton');
        const counterValue = document.getElementById('counterValue');

        // Initialize the counter value
        let count = 0;

        // Function to decrease the counter value
        minusButton.addEventListener('click', function () {
            count--;
            counterValue.textContent = count;
        });

        // Function to increase the counter value
        plusButton.addEventListener('click', function () {
            count++;
            counterValue.textContent = count;
        });



// Get references to the dropdown and div elements
var dropdown = document.getElementById("dropdown");
var balconyDiv = document.getElementById("balconyDiv");
var tableDiv = document.getElementById("tableDiv");

// Function to show the Balcony div
function showBalcony() {
    balconyDiv.style.display = "block";
    tableDiv.style.display = "none";
}

// Function to show the Table div
function showTable() {
    balconyDiv.style.display = "none";
    tableDiv.style.display = "block";
}

// Add an event listener to the dropdown to detect changes
dropdown.addEventListener("change", function() {
    var selectedValue = dropdown.value;
    if (selectedValue === "balcony") {
        showBalcony();
    } else if (selectedValue === "table") {
        showTable();
    }
});

function showCircleDetails(circle) {
    // Display the circle details div
    var circleDetailDiv = document.getElementById("circleDetailDiv");
    circleDetailDiv.style.display = "block";

    // Display the circle's number
    var circleNumberSpan = document.getElementById("circleNumberSpan");
    circleNumberSpan.textContent = circle.querySelector('.circle-number').textContent;
    var allCircles = document.querySelectorAll('.circle');
    allCircles.forEach(function (circle) {
        circle.classList.remove('clicked-circle');
    });

    // Add the "clicked-circle" class to the clicked circle
    circle.classList.add('clicked-circle');
}


// Add an event listener to the dropdown to detect changes
dropdown.addEventListener("change", function() {
    var selectedValue = dropdown.value;
    if (selectedValue === "balcony") {
        showBalcony();
    } else if (selectedValue === "table") {
        showTable();
    }
});


// Get references to the dropdown and span elements
var dropdown = document.getElementById("dropdown");
var circleNumberSpan = document.getElementById("circleNumberSpan");

// Function to update the selected value in the span element
// function updateSelectedValue() {
//     var selectedOption = dropdown.options[dropdown.selectedIndex];
//     circleNumberSpan.textContent = selectedOption.text;
// }

// Add an event listener to the dropdown to detect changes
// dropdown.addEventListener("change", updateSelectedValue);

// Initial update when the page loads
// updateSelectedValue();
</script>

<script>
    // Get references to the button and select element
    const selectCustomerButton = document.getElementById('selectCustomerButton');
    const customerSelect = document.getElementById('customerSelect');

    // Add an event listener to the "Save changes" button in the modal
    document.getElementById('saveCustomerButton').addEventListener('click', function() {
        // Get the selected customer's name
        const selectedCustomerName = customerSelect.options[customerSelect.selectedIndex].text;
        
        // Update the button text with the selected customer's name
        selectCustomerButton.innerText = `Customer: ${selectedCustomerName}`;
        
        // Close the modal
        $('#customer').modal('hide');
    });
</script>
@endsection
