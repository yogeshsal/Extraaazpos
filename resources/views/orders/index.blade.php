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
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #ccc;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    transform: rotate(-45deg);
}

.circle-btn {
    width: 100px;
    height: 30px;
    text-align: center;
    background: #0074cc;
    color: white;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    transform: rotate(45deg);
}

.note-icon {
    width: 30px;
    height: 30px;
    background: #0074cc;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
}

.clickable {
    cursor: pointer;
}

#note {
    background: white;
}

#finishorder {
    background: #4caf50;
}

#hold {
    background: #ff9800;
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
                        @php
                            $category = App\Models\Category::find($categoryId);
                        @endphp
                        <li class="list-group-item" data-id="{{ $categoryId }}">
                            {{ $category->cat_name }} ({{ $itemCount }})
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
                <div id="result">
            <!-- <h1>Items List</h1> -->
    
            </div>

            </div>
        </div>
    </div>
</div>










  </div>
  <div class="col-sm-4">
    <div class="card shadow" style="background-color: #FFFFFF;">
      <div class="card-body">
        
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="input-group mr-2">
                        <label for="searchInput" class="mr-2">Table</label>
                        <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                    </div>       
                </div>   
            </div>
        </div>
        <div class="card" style="height: 300px;">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr> 
                </tbody>
            </table>            
        </div>
            <div class="card">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Total :</td>
                            <td>6560.00</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
            <div class="circle">
        <button id="note" class="circle-btn">
            <div class="note-icon clickable"><i class="fas fa-pencil-alt"></i></div> 
        </button>
        <button id="finishorder" class="circle-btn"><i class="fas fa-check-circle"></i> </button>
        <button id="hold" class="circle-btn"><i class="fas fa-pause"></i> </button>
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
            fetch('/get-categoryid/' + categoryId, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response data and display items in cards
                var items = data.items;
                var resultDiv = document.getElementById('result');
                resultDiv.innerHTML = ''; // Clear the div content

                var cardRow = document.createElement('div');
                cardRow.className = 'row'; // Create a Bootstrap row

                items.forEach(function (itemData) {
                    var cardCol = document.createElement('div');
                    cardCol.className = 'col-sm-3'; // Create a Bootstrap column
                    cardCol.innerHTML = `
                        <div class="card shadow mb-3 m-1">
                            <img src="http://127.0.0.1:8000/storage/${itemData.item_image}" class="card-img-top" alt="${itemData.item_name}" id="card-img-${itemData.id}">
                            <div class="card-body" id="card-body-${itemData.id}">
                                <h6 class="card-title" id="card-title-${itemData.id}">${itemData.item_name}</h6>
                                <p class="card-text" id="card-text-${itemData.id}">Price: ${itemData.item_default_sell_price}</p>
                            </div>
                        </div>
                    `;

                    cardRow.appendChild(cardCol);
                });

                resultDiv.appendChild(cardRow);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

</script>

@endsection