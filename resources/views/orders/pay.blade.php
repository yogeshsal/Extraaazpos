@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<div class="main-content">
  <div class="page-content">
    <div class="container card shadow">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-8">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div style="background-color: #fff;">

              <div class="d-flex justify-content-between">
                <div>
                  <h4>Select Payment Mode </h4>
                </div>
                <div>
                  <div class="form-check form-switch">
                    <label class="h6 form-check-label" for="flexSwitchCheckChecked">Split Payments</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="pay1" value="option1">
                        <label class="form-check-label" for="pay1">
                          Cash
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="pay2" value="option2">
                        <label class="form-check-label" for="pay2">
                          Credit Card
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="pay3" value="option3">
                        <label class="form-check-label" for="pay3">
                          Debit / ATM Card
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="pay4" value="option4" checked>
                        <label class="form-check-label" for="pay4">
                          Paytm
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="pay5" value="option5">
                        <label class="form-check-label" for="pay5">
                          UPI
                        </label>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <p>Special Payments <i class="bi bi-info-circle"></i></p>
                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="spay" id="spay3" value="option3">
                        <label class="form-check-label" for="spay3">
                          Credit Card
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="spay" id="spay4" value="option4">
                        <label class="form-check-label" for="spay4">
                          FOC
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="d-flex justify-content-between">
                <div class="d-flex">
                  <div>
                    <small class="text-uppercase h6 mx-2" style="font-size: 10px;">Bill Amount</small>
                    <p class="h5 text-center text-uppercase mx-2">121.00</p>
                  </div>
                  <div>
                    <small class="text-uppercase mx-2" style="font-size: 10px;">Bill Pending</small>
                    <p class="h5 text-center text-uppercase mx-2">212.00</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger float-end mx-1">Cancel</button>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#payModal" id="" class="btn btn-primary float-end mx-1">Pay
                    <button type="button" data-bs-toggle="modal" data-bs-target="#payCash" id="" class="btn btn-info float-end">Pay Cash</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
    </div>
  </div>
</div>


<!-- footer starts -->
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
          Design & Develop by Extraaaz
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Modal pay by card and other  -->
<div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <h1 class="text-center" style="font-size: 100px;">
          <i class="text-success text-center bi bi-check-circle-fill"></i>
        </h1>
        <h5 class="text-center">Bill Setteled and Synced Successfully</h5>

        <table class="table mt-4">
          <thead class="table-light">
            <tr>
              <th class="col-3 text-muted" style="font-size: 10px;">PAYMENT METHOD</th>
              <th class="col-6 text-muted" style="font-size: 10px;">TRANSACTION ID</th>
              <th class="col-3 text-muted" style="font-size: 10px;">AMOUNT</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="font-size: 10px;">Cash</td>
              <td class="text-right" style="font-size: 10px;">-</td>
              <td style="font-size: 10px;">343.00</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer d-flex justify-content-between">
        <div>
          <small class="text-uppercase h6 mx-2" style="font-size: 12px;">Bill Amount</small>
          <p class="h5 text-center text-uppercase mx-2">343.00</p>
        </div>
        <div>
          <i class="bi bi-printer-fill mt-1" style="font-size: x-large;"></i>
          <button type="button" class="mx-3 btn btn-sm btn-light">Done</button>
          <button type="button" class="btn btn-sm btn-primary">Clear Bill</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal pay cash -->
<div class="modal fade" id="payCash" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class=" modal-content">
      <div class="modal-body" style="height: 400px;">
        <h5>Cash Amount </h5>
        <p class="mt-4">Bill Amount <span class="float-end">669.09</span></p>
        <hr>
        <p>Cash Amount <span class="float-end"><input type="text" class="ml-4 form-control form-control-sm" value="669.00"></span></p>
        <p>Cash Amount <span class="float-end">669.09</span></p>
        <hr>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Continue</button>
      </div>
    </div>
  </div>
</div>

@endsection