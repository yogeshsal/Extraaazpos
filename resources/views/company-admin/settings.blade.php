@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

</script> <style> .card { height: 160px; weight: 100px; padding bottom:5px; } .card-title-link { text-decoration: none;
  !important; font-size:25px; display: inline-flex; align-items: center; } .card-title-link i { margin-right:10px; }
  .card-title-link i { margin-right: 10px; font-size: 24px; } </style>
<style>
  .page-content {
    height: 100vh;
  }
</style>
<div class="main-content">
  <div class="page-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Settings</h4>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-people-fill"></i> Business Profile
                </h5>
              </a>
              <p class="card-text">
                <span id="refundValue">Configure general settings of your business, like language, currency, timezone
                  etc</span>
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link ">
                <h5 class="card-title text-primary">
                  <i class="bi bi-bag-plus "></i> Order Tracker
                </h5>
              </a>
              <p class="card-text" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;">Configure
                settings related to tracking online orders from both aggregator channels and your own channels</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-emoji-heart-eyes"></i>KDS
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
                <h5 class="card-title text-primary">
                  <i class="bi bi-grid"></i> Point of sale
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
                <h5 class="card-title text-primary">
                  <i class="bi bi-hypnotize"></i> Inventory
                </h5>
              </a>
              <p class="card-text">Configure settings related to inventory and associated workflows such as stock
                transfers and purchase orders</p>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-tools"></i> Kitchen operations
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
                <h5 class="card-title text-primary">
                  <i class="bi bi-trophy-fill"></i> Products
                </h5>
              </a>
              <p class="card-text">Configure settings related to barcodes and identifiers associated with your products
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-universal-access"></i> Third-party integrations
                </h5>
              </a>
              <p class="card-text">Configure settings related to integrating modules such as a catalog with third-party
                systems</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-wifi"></i> Contactless Menu
                </h5>
              </a>
              <p class="card-text">Create your contactless menu and download the QR codes.
              </p>
            </div>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="card shadow">
            <div class="card-body">
              <a href="#" class="card-title-link">
                <h5 class="card-title text-primary">
                  <i class="bi bi-tablet "></i> E-bill
                </h5>
              </a>
              <p class="card-text">Send a digital copy of the bill to your walk-in customers</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection