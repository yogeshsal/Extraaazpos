@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<style>
.no-gutters .col-sm-3,
.no-gutters .col-sm-9 {
    padding: 0;
    margin: 0;
}
.close {
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
}
</style>
<br>
<div class="row">
  <div class="col-sm-8">
  <div class="row no-gutters">
    <div class="col-sm-3"  >
        <div class="card shadow" style="background-color: #F5F5F5;" >
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Categories
                    </div>
                    <div class="col-auto">
                        <button type="button" class="close border-0" aria-label="Close" style="font-size: 20px; height:29px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- <div class="card-body"> -->
            <ul class="list-group">
            @foreach($categoryCounts as $categoryId => $itemCount)
            <li class="list-group-item" data-id="{{ $categoryId }}">
                {{ $categoryId }} ({{ $itemCount }})
            </li>
                @endforeach
            </ul>
            <!-- </div> -->
        </div>
    </div>
    <div class="col-sm-9">
        <div class="card shadow" style="background-color: #FFFFFF;">
            <div class="card-header">
                <div class="row" style="height:29px;">
                    <div class="col" >
                        Choose Items
                    </div>                    
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Search by name or POS code" style="color: #000; height:29px; width: 250px;">
                    </div>
                </div>
            </div>
            <div class="card-body">
            <p>Title: {{ $a }}</p>

            </div>
        </div>
    </div>
</div>










  </div>
  <div class="col-sm-4">
    <div class="card shadow" style="background-color: #FFFFFF;">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>





<script>

document.addEventListener('DOMContentLoaded', function () {
    var listItems = document.querySelectorAll('.list-group-item');

    listItems.forEach(function (item) {
        item.addEventListener('click', function () {
            var categoryId = this.getAttribute('data-id');
            console.log(categoryId);
            // Make an AJAX request to the controller with the categoryId
            // Replace 'your_controller_route' with the actual route to your controller method
            fetch('/get-categoryid/' + categoryId, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response data if needed
                console.log(data);
            })
            .catch(error => {
                // Handle any errors that occur during the request
                console.error('Error:', error);
            });
        });
    });
});
</script>


@endsection