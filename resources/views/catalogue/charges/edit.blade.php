@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<!-- Include Bootstrap CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">

<!-- Include jQuery (required for Bootstrap Switch) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap Switch JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>



@php
// Calculate the time difference
$currentTime = now();
$updatedAt = $Charge->updated_at;
$diff = $currentTime->diff($updatedAt);

// Determine the appropriate format based on the time elapsed
$formattedTime = '';

if ($diff->y > 0) {
$formattedTime = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
} elseif ($diff->m > 0) {
$formattedTime = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
} elseif ($diff->d > 0) {
$formattedTime = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
} elseif ($diff->h > 0) {
$formattedTime = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
} elseif ($diff->i > 0) {
$formattedTime = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
} else {
$formattedTime = 'just now';
}
@endphp
<!-- <h6>Last updated {{ $formattedTime }}</h6> -->

<div class="main-content">
  <div class="page-content">

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif
    <div class="container-fluid">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <!-- ul tab starts -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic-tab-pane" type="button" role="tab" aria-controls="basic-tab-pane" aria-selected="true">Basic</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="items-tab" data-bs-toggle="tab" data-bs-target="#items-tab-pane" type="button" role="tab" aria-controls="items-tab-pane" aria-selected="false">Items</button>
              </li>
            </ul>
            <!-- end ul tabs -->
            <div class="tab-content" id="myTabContent">
              <!-- Basic Information tab -->
              <div class="tab-pane fade show active" id="basic-tab-pane" role="tabpanel" aria-labelledby="basic-tab" tabindex="0">
                <form action="{{ route('charge.update',$Charge->id) }}" method="POST">
                  @csrf
                  <div class="row mt-2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="name" class="my-2">Name:</label>
                        <input type="text" name="name" class="form-control" required value="{{$Charge->name}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="charge_type" class="my-2">Charge Type:</label>
                        <select class="form-select" name="charge_type" id="charge_type" aria-label="Default select example">
                          <option>{{$Charge->charge_type}}</option>
                          <option value="1">Packaging Charge</option>
                          <option value="2">Delivery Charge</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group mt-3">
                        <label for="description	">Description:</label>
                        <textarea name="description" class="form-control" rows="3">{{$Charge->description}}</textarea>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label for="mobile">Amount per Quantity:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="">LKR</span>
                        </div>
                        <input type="text" class="form-control" value="{{$Charge->amount_per_quantity}}" name="amount_per_quantity">
                      </div>

                    </div>

                  </div>
                  <button class="float-end btn btn-light">Cancel</button>
                  <button type="submit" class="mx-2 btn btn-orange float-end">Save</button>
                </form>
              </div>
              <!-- Items tab -->
              <div class="tab-pane fade" id="items-tab-pane" role="tabpanel" aria-labelledby="items-tab" tabindex="0">
                <div class="card shadow p-3">
                  <div class="row">
                    <div class="col">
                      <h4>All Items</h4>
                    </div>
                    <div class="col-auto">
                      <a type="button" class="btn btn-orange" href="{{ route('charge.select_items', $Charge->id ) }}">Restrict items</a>
                    </div>
                  </div>
                </div>
                <table class="table table-hover mt-4">
                  <thead class="bg-light">
                    <tr>

                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($items as $i)
                    <tr>
                      <td>{{$i->item_name}}</td>
                      <td>{{ $i->cat_name }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- items tab ends -->
          </div>
          <!-- tab content div ends -->

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /content -->

<script>
  $(document).ready(function() {
    $('#item_is_recommended').bootstrapSwitch();
    $('#item_is_package_good').bootstrapSwitch();
    $('#item_sell_by_weight').bootstrapSwitch();
  });
</script>

@endsection