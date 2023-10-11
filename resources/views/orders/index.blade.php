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

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Cards</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
                                <li class="breadcrumb-item active">Cards</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <!-- Simple card -->
                    <div class="card">
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
                                    <input type="text" class="form-control" placeholder="Search by name or POS code" style="color: #000; height:29px; width: 250px;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row" id="result">
                                <div class="col-xl-3 custom-col">
                                    <div class="card">
                                        <img class="img-fluid" src="images/small/img-4.jpg" alt="Card image cap">
                                        <div class="card-body" id="card-body-${itemData.id}">
                                            <h4 class="card-title mb-2" id="card-title-${itemData.id}">${itemData.item_name}</h4>
                                            <p class="card-text" id="card-text-${itemData.id}"> Price: ${itemData.item_default_sell_price}</p>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 custom-col">
                                    <div class="card">
                                        <img class="img-fluid" src="images/small/img-4.jpg" alt="Card image cap">
                                        <div class="card-body" id="card-body-${itemData.id}">
                                            <h4 class="card-title mb-2" id="card-title-${itemData.id}">${itemData.item_name}</h4>
                                            <p class="card-text" id="card-text-${itemData.id}"> Price: ${itemData.item_default_sell_price}</p>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 custom-col">
                                    <div class="card">
                                        <img class="img-fluid" src="images/small/img-4.jpg" alt="Card image cap">
                                        <div class="card-body" id="card-body-${itemData.id}">
                                            <h4 class="card-title mb-2" id="card-title-${itemData.id}">${itemData.item_name}</h4>
                                            <p class="card-text" id="card-text-${itemData.id}"> Price: ${itemData.item_default_sell_price}</p>

                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col-xl-3 custom-col">
                                    <div class="card">
                                        <img class="img-fluid" src="images/small/img-4.jpg" alt="Card image cap">
                                        <div class="card-body" id="card-body-${itemData.id}">
                                            <h4 class="card-title mb-2" id="card-title-${itemData.id}">${itemData.item_name}</h4>
                                            <p class="card-text" id="card-text-${itemData.id}"> Price: ${itemData.item_default_sell_price}</p>

                                        </div>
                                    </div>
                                </div><!-- end col -->

                            </div><!-- end row -->




                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-sm-6 col-xl-3">
                    <div class="card">
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
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary">Note</button>
                                    <button type="button" class="btn btn-secondary">Hold</button>
                                    <button type="button" class="btn btn-danger">Finish Order
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
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->

</div>









<div class="row">
    <div class="col-sm-8">
        <div class="row no-gutters">
            <div class="col-sm-3">
                <div class="card shadow" style="background-color: #F5F5F5;">
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
                </div>
            </div>
            
        </div>










    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var listItems = document.querySelectorAll('.list-group-item');

                listItems.forEach(function(item) {
                    item.addEventListener('click', function() {
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

                                var cardRow = document.createElement('p');
                                cardRow.className = ''; // Create a Bootstrap row

                                items.forEach(function(itemData) {
                                    var cardCol = document.createElement('p');
                                    cardCol.innerHTML = `
                                        <div class="col-sm-3 custom-col">
                                        <div class="card">
                                        <img class="img-fluid" src="images/small/img-4.jpg" alt="Card image cap">
                                                <div class="card-body" id="card-body-${itemData.id}">
                                                    <h4 class="card-title mb-2"id="card-title-${itemData.id}">${itemData.item_name}</h4>
                                                    <p class="card-text"id="card-text-${itemData.id}"> Price: ${itemData.item_default_sell_price}</p>

                                                </div>
                                            </div>
                                        </div><!-- end col -->
                    `;
                                    // <
                                    //                 div class = "card shadow mb-3 m-1 "
                                    //                 style = "width:150px;" >
                                    //                     <
                                    //                     img src = "http://127.0.0.1:8000/storage/${itemData.item_image}"
                                    //                 class = "card-img-top"
                                    //                 alt = "${itemData.item_name}"
                                    //                 id = "card-img-${itemData.id}" >
                                    //                     <
                                    //                     div class = "card-body"
                                    //                 id = "card-body-${itemData.id}" >
                                    //                     <
                                    //                     h6 class = "card-title"
                                    //                 id = "card-title-${itemData.id}" > $ {
                                    //                         itemData.item_name
                                    //                     } < /h6> <
                                    //                     p class = "card-text"
                                    //                 id = "card-text-${itemData.id}" > Price: $ {
                                    //                         itemData.item_default_sell_price
                                    //                     } < /p> <
                                    //                     /div> <
                                    //                     /div>

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