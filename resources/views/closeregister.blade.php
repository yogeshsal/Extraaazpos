
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

<style>
  .positive-value {
    color: red;
}
</style>

<div class="row">
<div class="col-sm-8">
<div class="card mt-5">  
  <div class="card-body">
  <div class="flex-container">
    <div class="flex-column">
      <h2>Session {{$id}}</h2> 
      <h6>Register : Register location name here</h6>     
    </div>
    <div class="flex-column">
    <h6><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Calculated a few Seconds ago &nbsp;
    <a href="/dailyregister"><button id="showmessage" class="btn btn-primary">Reset Closing</button></a></h6>
    
    </div>
  </div>
    
  <table class="table table-hover table-responsive table-bordered mt-5" >
    <thead>
      <tr>
        <th>TYPE</th>
        <th>EXPECTED</th>
        <th>CLOSING</th>
        <th>DIFFERENCE</th>        
      </tr>
      </thead>
      
      <tbody>
        <tr>
          <td>Cash</td>
          <td id="expected_cash">{{$opening_cash}}</td>
          <td><input type="number" id="closingcash" value="0"></td>
          <td id="cash_difference">0</td>                  
        </tr>
        <tr>
          <td>Card</td>
          <td id="expected_card">{{$opening_card}}</td>
          <td><input type="number" id="closingcard" value="0"></td>
          <td id="card_difference">0</td>         
        </tr>
        <tr>
          <td>Credit</td>
          <td id="expected_credit">{{$opening_credit}}</td>
          <td><input type="number" id="closingcredit" value="0"></td>
          <td id="credit_difference">0</td>           
        </tr>
        <tr>
          <td>Upi</td>
          <td id="expected_upi">{{$opening_upi}}</td>
          <td><input type="number" id="closingupi" value="0"></td>
          <td id="upi_difference">0</td>          
        </tr>
        <tr>
          <td colspan = "4">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Notes</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </td>                
        </tr>
        <tr>
          <td colspan = "3"><td>
          <form action="/closeregister" method="POST">
            @csrf
            <!-- Your input fields here -->
            <input type="text" id="closingcash1" hidden name="closingcash1">
            <input type="text" id="closingcard1" hidden name="closingcard1">
            <input type="text" id="closingcredit1" hidden name="closingcredit1">
            <input type="text" id="closingupi1" hidden name="closingupi1">
            
            <button type="submit" class="btn btn-primary">Close Register</button>     
          </form>
               
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
              <td>21 Sep, 2023 - 12:29 PM</td>      
            </tr>
            <tr>
              <td>Closed:</td>
              <td>Register Open</td>      
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
  <table  id="myTable"  class="table table-hover table-responsive table-bordered mt-5" >
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



<script>     
const expected_cashCell = document.getElementById("expected_cash");
const closecashval = document.getElementById("closingcash");
const closecashval1 = document.getElementById("closingcash1");
const cash_differenceCell = document.getElementById("cash_difference");




closecashval.addEventListener("input", function() {
    // Set the value of inputField2 to match inputField1
    closecashval1.value = closecashval.value;
});

// Calculate and update the initial difference
updatecashDifference();


// Add an event listener to the input element
closecashval.addEventListener("input", updatecashDifference);


// Function to calculate and update the cash difference
function updatecashDifference() {
    // Parse the values as numbers
    const expected_cash = parseFloat(expected_cashCell.textContent);
    const userValue = parseFloat(closecashval.value);
    
    // Check if the input value is a valid number
    if (!isNaN(userValue)) {
        const diff = expected_cash - userValue;
        cash_differenceCell.textContent = -diff;
        cash.textContent = diff;
         // Add a CSS class for positive values
         if (diff == 0) {
          cash_differenceCell.style.color = 'green';
        } else {
          cash_differenceCell.style.color = 'red'; // Reset to default text color
        }
    } else {
      cash_differenceCell.textContent = diff;        
    }    
}




</script>

<script>
const expected_cardCell = document.getElementById("expected_card");
const closecardval = document.getElementById("closingcard");
const closecardval1 = document.getElementById("closingcard1");
const card_differenceCell = document.getElementById("card_difference");

closecardval.addEventListener("input", function() {
    // Set the value of inputField2 to match inputField1
    closecardval1.value = closecardval.value;
});



updatecardDifference();
// Add an event listener to the input element
closecardval.addEventListener("input", updatecardDifference);
//update card difference
function updatecardDifference() {
    // Parse the values as numbers
    const expected_card = parseFloat(expected_cardCell.textContent);
    const userValue = parseFloat(closecardval.value);
    
    // Check if the input value is a valid number
    if (!isNaN(userValue)) {
        const diff = expected_card - userValue;
        card_differenceCell.textContent = -diff;
         // Add a CSS class for positive values
         if (diff == 0) {
          card_differenceCell.style.color = 'green';
        } else {
          card_differenceCell.style.color = 'red'; // Reset to default text color
        }
    } else {
      card_differenceCell.textContent = diff;        
    }
}
</script>


<!-- 3 -->
<script>
const expected_creditCell = document.getElementById("expected_credit");
const closecreditval = document.getElementById("closingcredit");
const closecreditval1 = document.getElementById("closingcredit1");
const credit_differenceCell = document.getElementById("credit_difference");

closecreditval.addEventListener("input", function() {
    // Set the value of inputField2 to match inputField1
    closecreditval1.value = closecreditval.value;
});
updatecreditDifference();
// Add an event listener to the input element
closecreditval.addEventListener("input", updatecreditDifference);
//update card difference
function updatecreditDifference() {
    // Parse the values as numbers
    const expected_credit = parseFloat(expected_creditCell.textContent);
    const userValue = parseFloat(closecreditval.value);
    
    // Check if the input value is a valid number
    if (!isNaN(userValue)) {
        const diff = expected_credit - userValue;
        credit_differenceCell.textContent = -diff;
         // Add a CSS class for positive values
         if (diff == 0) {
          credit_differenceCell.style.color = 'green';
        } else {
          credit_differenceCell.style.color = 'red'; // Reset to default text color
        }
    } else {
      credit_differenceCell.textContent = diff;        
    }
}
</script>

<script>
const expected_upiCell = document.getElementById("expected_upi");
const closeupival = document.getElementById("closingupi");
const closeupival1 = document.getElementById("closingupi1");
const upi_differenceCell = document.getElementById("upi_difference");

closeupival.addEventListener("input", function() {
    // Set the value of inputField2 to match inputField1
    closeupival1.value = closeupival.value;
});
updateupiDifference();
// Add an event listener to the input element
closeupival.addEventListener("input", updateupiDifference);
//update card difference
function updateupiDifference() {
    // Parse the values as numbers
    const expected_upi = parseFloat(expected_upiCell.textContent);
    const userValue = parseFloat(closeupival.value);
    
    // Check if the input value is a valid number
    if (!isNaN(userValue)) {
        const diff = expected_upi - userValue;
        upi_differenceCell.textContent = -diff;
         // Add a CSS class for positive values
         if (diff == 0) {
          upi_differenceCell.style.color = 'green';
        } else {
          upi_differenceCell.style.color = 'red'; // Reset to default text color
        }
    } else {
      upi_differenceCell.textContent = diff;        
    }
}
</script>

@endsection





<script>


  $(document).ready( function () {
    $('#myTable').DataTable();
} );

  </script>

<script>
  document.getElementById('showmessage').addEventListener('click', function() {
    // Get the displayText element
    var displayText = document.getElementById('displayText');

    // Show the text
    displayText.style.display = 'block';
});
</script>


