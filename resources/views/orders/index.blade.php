@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
    <style>
        /* .close {
                        border: none !important;
                        outline: none !important;
                        box-shadow: none !important;
                    } */
    </style>
    <br>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-xl-2">
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
                    <div class="col-sm-12 col-xl-6">
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

                    <div class="col-sm-6 col-xl-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="input-group mr-2">
                                                {{-- <label for="searchInput" class="mr-2">Table</label> --}}
                                                {{-- <input type="search" id="searchInput" class="form-control rounded m-1"
                                                    placeholder="Search by Name" aria-label="Search"
                                                    aria-describedby="search-addon" /> --}}
                                                <p>Table Number: <span id="tableNumber"></span></p>
                                            </div>
                                            <div>

                                                <p>Customer Name: <span id="customerName"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card" id="billdata" style="height: 300px;">
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

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="total">
                                            <tr id="subtotalRow" class="slide-up-down py-0" style="display: none;">
                                                <td colspan="3" class="small py-0">Subtotal</td>
                                                <td id="subtotal" class="small py-0">0</td>
                                            </tr>
                                            <tr id="totalTaxesRow" class="slide-up-down py-0" style="display: none;">
                                                <td colspan="3" class="small py-0">Total Taxes</td>
                                                <td id="totalTaxes" class="small py-0">0</td>
                                            </tr>
                                            <tr>
                                                <td id="total-text">Total :</td>
                                                <td id="total-amount">0</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary">Note</button>
                                        <button type="button" class="btn btn-secondary">Hold</button>
                                        <a href="/billing?id=circleDetailDivs">
                                            <button type="button" id="finishOrderButton" class="btn btn-danger">Finish
                                                Order</button></a>
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
    5:15 PM
    <script script src="https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
    <script>
        $(document).ready(function() {
            const total = $('#total-text');
            const subtotalRow = $('#subtotalRow');
            const totalTaxesRow = $('#totalTaxesRow');
            total.click(function() {
                toggleRows(subtotalRow);
                toggleRows(totalTaxesRow);
            })
            function toggleRows(element) {
                if (element.is(':visible')) {
                    element.slideUp('fast');
                } else {
                    element.slideDown('fast');
                }
            }
        });
    </script>
    <script>
        document.getElementById("finishOrderButton").addEventListener("click", function() {
            // Get the table number
            var tableNumber = document.getElementById("tableNumber").textContent;

            // Get the customer name
            var customerName = document.getElementById("customerName").textContent;

            // Get the product, quantity, unit price, and total data
            var productData = [];
            var rows = document.getElementById("billdata").getElementsByTagName("tbody")[0].rows;

            for (var i = 0; i < rows.length; i++) {
                var productName = rows[i].cells[0].textContent;
                var quantity = rows[i].cells[1].getElementsByTagName("span")[0].textContent;
                var unitPrice = rows[i].cells[2].textContent;
                var total = rows[i].cells[3].textContent;

                // Push the data to the productData array
                productData.push({
                    productName: productName,
                    quantity: quantity,
                    unitPrice: unitPrice,
                    total: total,
                });
            }

            // Store the data in localStorage
            localStorage.setItem("tableNumber", tableNumber);
            localStorage.setItem("customerName", customerName);
            localStorage.setItem("productData", JSON.stringify(productData));
        });




        const tableNumber = localStorage.getItem('tableNumber');
        const customerName = localStorage.getItem('selectedCustomerName');

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
                        var items = data;

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

                            // Create an image element if item_image is available
                            if (itemData.item_image) {
                                var img = document.createElement('img');
                                img.className = 'img-fluid';

                                // Construct the complete image URL by adding the base URL
                                var imageUrl = 'http://127.0.0.1:8000/storage/' + itemData
                                .item_image; // Adjust the base URL as needed

                                img.src = imageUrl;

                                card.appendChild(img);
                            }

                            var cardBody = document.createElement('div');
                            cardBody.className = 'card-body';

                            var cardTitle = document.createElement('h4');
                            cardTitle.className = 'card-title mb-2';
                            cardTitle.textContent = itemData.item_name;

                            var cardText = document.createElement('p');
                            cardText.className = 'card-text';
                            cardText.textContent = 'Price: ' + itemData.item_default_sell_price;

                            // Create elements for displaying tax information (if available)
                            // if (itemData.tax_id && itemData.tax_status && itemData.tax_name) {
                            //     var taxInfo = document.createElement('p');
                            //     taxInfo.textContent = 'Tax ID: ' + itemData.tax_id + ' | Status: ' + itemData.tax_status + ' | Tax Name: ' + itemData.tax_name;
                            //     cardText.appendChild(taxInfo);
                            // }

                            cardBody.appendChild(cardTitle);
                            cardBody.appendChild(cardText);
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
    var totalAmountElement = document.getElementById('total-amount');
    var subtotalRow = document.getElementById('subtotalRow');
    var totalTaxesRow = document.getElementById('totalTaxesRow');
    var subtotalElement = document.getElementById('subtotal');
    var totalTaxesElement = document.getElementById('totalTaxes');

    billData.innerHTML = '';
    var totalAmount = 0;
    var subtotalAmount = 0;
    var totalTaxes = 0;

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

        // Calculate the total amount for each item
        var itemTotal = item.price * item.quantity;
        totalAmount += itemTotal;

        // Update the subtotal (before taxes) amount
        subtotalAmount += itemTotal;

        // Calculate taxes for each item (customize as per your tax logic)
        var taxAmount = calculateTax(itemTotal);
        totalTaxes += taxAmount;
    });

    // Display the subtotal amount
    subtotalElement.textContent = subtotalAmount;

    // Display the total amount
    totalAmountElement.textContent = totalAmount;

    // Display the total taxes
    totalTaxesElement.textContent = totalTaxes;

    // Show or hide the subtotal and taxes rows
    if (subtotalAmount > 0) {
        subtotalRow.style.display = 'table-row';
    } else {
        subtotalRow.style.display = 'none';
    }

    if (totalTaxes > 0) {
        totalTaxesRow.style.display = 'table-row';
    } else {
        totalTaxesRow.style.display = 'none';
    }
}

// This function calculates the tax for an item, you can customize it as per your tax rules
function calculateTax(itemTotal) {
    // Replace this with your tax calculation logic
    return itemTotal * 0.1; // 10% tax as an example
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
