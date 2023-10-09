@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
<style>
    /* Set a fixed height for all cards */
    .card {
        height: 350px; /* Adjust the height as needed */
        weight:100px;
    }

    /* Style for the card title link */
    .card-title-link {
        text-decoration: none;
        color: orange;
        display: inline-flex;
        align-items: center;

    }

    
</style>
<div class="container ">
        <div class="row">
            <div class="col-md-12">
                <h4>Integrations</h4>
            </div>
            
    
<div class="row mt-5">
  <div class="col-sm-4">
    <div class="card shadow">
    <div class="card-body text-center">
      <img src="company-admin/pinelabs.svg" alt="Your Image" style="max-width: 100px;">
            <h5 class="card-title mt-3">
                     PineLabs
                    </h5>
                    <button class=" rounded-pill mt-2 p-2">Digital Payment</button>
                    <br>

             <br>      
        <p class="card-text" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">Securely collect payments via Cards, UPI, Wallets etc. at your storefront with Pine Labs EDCs.
        <div class="mt-3">
                    <a href="#" class="btn btn-primary">Sign Up</a>
                </div>
    </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card shadow">
      <div class="card-body text-center">
      <img src="your-image.jpg" alt="Your Image" style="max-width: 100px;">
            <h5 class="card-title mt-3">
                     Tally
                    </h5>
                    
                    <button class=" rounded-pill mt-2 p-2">Accounting</button>
                    <br>

             <br>      
        <p class="card-text" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">Seamlessly integrate Urbanpiper Prime with Tally Prime as your accounting system.
        <div class="mt-3">
                    <a href="#" class="btn btn-primary">Sign Up</a>
                </div>
    </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card shadow">
      <div class="card-body text-center">
      <img src="your-image.jpg" alt="Your Image" style="max-width: 100px;">
            <h5 class="card-title mt-3">
                     Paytm
                    </h5>
                    <button class=" rounded-pill mt-2 p-2">Digital Payment</button>
                    <br>

             <br>      
        <p class="card-text" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">Securely collect payments via Cards, UPI, Wallets etc. at your storefront with Paytm EDCs.
        <div class="mt-3">
                    <a href="#" class="btn btn-primary">Sign Up</a>
                </div>
    </div>
    </div>
 
    </div>
  </div>
</div>


@endsection
