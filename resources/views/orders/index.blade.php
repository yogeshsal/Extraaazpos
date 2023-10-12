@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

<style>
#totalRow>td {
    cursor: pointer;
}

.slide-up-down {
    display: none;
}
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-2">
                    <!-- Simple card -->
                    <div class="card">
                        <ul class="list-group" id="category-list">
                            @foreach ($categoryCounts as $categoryId => $itemCount)
                            @php
                            $category = App\Models\Category::find($categoryId);
                            @endphp
                            <li class="list-group-item" data-id="{{ $categoryId }}">
                                {{ $category->cat_name }} ({{ $itemCount }})
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row" style="height:29px;">
                                <div class="col">
                                    Choose Items
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Search by name or POS code"
                                        style="color: #000; height:29px; width: 250px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" id="result">

                            </div><!-- end row -->
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group mr-2">
                                            <label for="searchInput" class="mr-2">Table</label>
                                            <input type="search" id="searchInput" class="form-control rounded m-1"
                                                placeholder="Search by Name" aria-label="Search"
                                                aria-describedby="search-addon" />
                                        </div>
                                        <div>
                                            <p>Table Number: <span id="tableNumber"></span></p>
                                            <p>Customer Name: <span id="customerName"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="billdata">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height: 300px;">

                                    </tbody>
                                    <tfoot style="background-color:#f5f5f5">
                                        <tr id="subtotalRow" class="slide-up-down py-0">
                                            <td colspan="3" class="small py-0">Subtotal</td>
                                            <td id="subtotal" class="small py-0">0</td>
                                        </tr>
                                        <tr id="totalTaxesRow" class="slide-up-down py-0">
                                            <td colspan="3" class="small py-0">Total Taxes</td>
                                            <td id="totalTaxes" class="small py-0">0</td>
                                        </tr>
                                        <tr id="totalRow">
                                            <td colspan="3" class="toggle-slide" id="total">Total <i
                                                    class="bi bi-chevron-expand"></i></td>
                                            <td id="total-amount">0</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>


                            <div class="card">
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary">Note</button>
                                    <button type="button" class="btn btn-secondary">Hold</button>
                                    <a href="/billing?id=circleDetailDivs">
                                        <button type="button" class="btn btn-danger">Finish Order</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

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
</div>
<!-- end main content-->
</div>

<script script src="https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script>
$(document).ready(function() {
    const total = $('#total');
    const subtotalRow = $('#subtotalRow');
    const totalTaxesRow = $('#totalTaxesRow');

    total.click(function() {
        toggleRows(subtotalRow);
        toggleRows(totalTaxesRow);
    });

    function toggleRows(element) {
        if (element.is(':visible')) {
            element.slideUp('fast');
        } else {
            element.slideDown('fast');
        }

    }
})

const tableNumber = localStorage.getItem('tableNumber');
const customerName = localStorage.getItem('selectedCustomer');

// Update the content of the div with the retrieved data
if (tableNumber) {
    document.getElementById('tableNumber').textContent = tableNumber;
}

if (customerName) {
    document.getElementById('customerName').textContent = customerName;
}
document.addEventListener('DOMContentLoaded', function() {
    var categoryList = document.getElementById('category-list');
    var resultDiv = document.getElementById('result');

    // Get the first category by default
    var defaultCategory = categoryList.querySelector('li.list-group-item');

    if (defaultCategory) {
        var defaultCategoryId = defaultCategory.getAttribute('data-id');
        fetchItemsForCategory(defaultCategoryId);
    }

    function fetchItemsForCategory(categoryId) {
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
                var items = data.items;
                var cardRow = document.createElement('div');
                cardRow.className = 'row';

                items.forEach(function(itemData) {
                    var cardCol = document.createElement('div');
                    cardCol.className = 'col-xl-3 custom-col';

                    var card = document.createElement('div');
                    card.className = 'card';
                    card.setAttribute('onclick',
                        `selectItem('${itemData.item_name}', ${itemData.item_default_sell_price})`
                    );

                    var img = document.createElement('img');
                    img.className = 'img-fluid';
                    img.src = 'images/small/img-4.jpg';
                    img.alt = 'Card image cap';

                    var cardBody = document.createElement('div');
                    cardBody.className = 'card-body';
                    cardBody.id = `card-body-${itemData.id}`;

                    var cardTitle = document.createElement('h4');
                    cardTitle.className = 'card-title mb-2';
                    cardTitle.id = `card-title-${itemData.id}`;
                    cardTitle.textContent = itemData.item_name;

                    var cardText = document.createElement('p');
                    cardText.className = 'card-text';
                    cardText.id = `card-text-${itemData.id}`;
                    cardText.textContent = `Price: ${itemData.item_default_sell_price}`;

                    cardBody.appendChild(cardTitle);
                    cardBody.appendChild(cardText);

                    card.appendChild(img);
                    card.appendChild(cardBody);
                    cardCol.appendChild(card);
                    cardRow.appendChild(cardCol);
                });

                resultDiv.innerHTML = '';
                resultDiv.appendChild(cardRow);

            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    categoryList.addEventListener('click', function(event) {
        var target = event.target;
        if (target && target.matches('li.list-group-item')) {
            var categoryId = target.getAttribute('data-id');
            fetchItemsForCategory(categoryId);
        }
    });
});
</script>
<script>
var selectedItems = [];

function selectItem(itemName, itemPrice) {
    var selectedItem = {
        name: itemName,
        price: itemPrice,
        quantity: 1 // Start with a quantity of 1
    };

    // Check if the item is already in the selectedItems array
    var existingItem = selectedItems.find(item => item.name === itemName);

    if (existingItem) {
        // If it already exists, increase the quantity
        existingItem.quantity += 1;
    } else {
        // If it's not in the array, add it
        selectedItems.push(selectedItem);
    }

    updateBillData();
}

function updateBillData() {
    var billData = document.getElementById('billdata').getElementsByTagName('tbody')[0];
    billData.innerHTML = ''; // Clear the current content

    // Initialize the total amount
    var totalAmount = 0;

    // Add the table header
    // ...

    // Iterate through selected items and display them in the bill data
    selectedItems.forEach((item, index) => {
        var row = document.createElement('tr');
        row.innerHTML = `
                <td>${item.name}</td>
                <td>
    <button class="btn btn-sm btn-info" onclick="decreaseQuantity(${index})">-</button>
    <span id="quantity-${index}">${item.quantity}</span>
    <button class="btn btn-sm btn-info" onclick="increaseQuantity(${index})">+</button>
</td>

                <td>${item.price}</td>
                <td>${item.price * item.quantity}</td>
            `;
        billData.appendChild(row);

        // Update the total amount
        totalAmount += item.price * item.quantity;
    });

    // Display the total amount
    var totalAmountElement = document.getElementById('total-amount');
    totalAmountElement.textContent = totalAmount;
}

function increaseQuantity(index) {
    selectedItems[index].quantity += 1;
    updateBillData();
}

function decreaseQuantity(index) {
    if (selectedItems[index].quantity > 1) {
        selectedItems[index].quantity -= 1;
    } else {
        // If quantity is 1 or less, remove the item from the array
        selectedItems.splice(index, 1);
    }
    updateBillData();
}
</script>
@endsection