@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
<style>
    /* Set a fixed height for all cards */
    .card {
        height: 210px; /* Adjust the height as needed */
        weight:100px;
    }

    /* Style for the card title link */
    .card-title-link {
        text-decoration: none;
        color: orange;
        display: inline-flex;
        align-items: center;

    }

    .card-title-link i {
        margin-right: 10px;
    }
</style>
<div class="container ">
        <div class="row">
            <div class="col-md-6">
                <h4>Settings</h4>
            </div>
            
    
<div class="row mt-5">
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-id-card" ></i> Business profile
                    </h5>
                    </a>
        <p class="card-text">
            <span id="refundValue">Configure general settings of your business, like language, currency, timezone etc</span>
              
                        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class=" fa fa-shopping-bag"></i> Order Tracker
                    </h5>
                    </a>
        <p class="card-text" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">Configure settings related to tracking online orders from both aggregator channels and your own channels</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-users"></i> KDS
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to your Kitchen Display System (KDS)</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-inr"></i> Point of sale
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to your Point of sale (POS)</p>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-th-large"></i>Inventory
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to inventory and associated workflows such as stock transfers and purchase orders</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-cutlery"></i> Kitchen operations
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to your kitchen operations</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-bolt"></i>Products
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to barcodes and identifiers associated with your products</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fas fa-cog"></i>Third party integrations
                    </h5>
                    </a>
        <p class="card-text">Configure settings related to integrating modules such as catalogue with third party systems</p>
      </div>
    </div>
  </div>
</div>
    <!-- </div> -->
    <div class="row mt-3">
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-bars"></i> Contactless Menu
                    </h5>
                    </a>
        <p class="card-text">Create your contactless menu and download the QR codes. Customers can scan, view your menu and place orders right from their phones</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card shadow">
      <div class="card-body">
      <a href="#" class="card-title-link">
            <h5 class="card-title">
                    <i class="fa fa-server"></i>E-bill
                    </h5>
                    </a>
        <p class="card-text">Send a digital copy of bill to your walk-in customers</p>
      </div>
    </div>
  </div>
 

@endsection
