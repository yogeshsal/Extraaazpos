@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<br>
<style>
.circle {
    width: 30px;
    height: 30px;
    background-color: grey;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f5f5f5;
    color: #646464;
    font-weight: 900;
    font-size: small;
}

tr {
    border-bottom: 2px solid #F5F5F5;
    /* Light grey border between rows */
}

.btn.btn-outline-secondary {
    border-color: #6c757d;
    /* Set the default border color */
}

.btn.btn-outline-secondary:hover {
    border-color: orange;
    /* Change the border color to orange on hover */
    background-color: transparent;
    color: orange;
}
</style>

<div class="main-content">
    <div class="page-content" style="background-color: #fff;">
        <div class="card mx-auto" style="width: 90%;">
            <div class="container">
                <div class="d-flex justify-content-between py-4">
                    <div>
                        <h4 class="text-dark">Sales Dashboard 1</h4>
                    </div>
                    <div class="d-flex">
                        <select class="form-control mx-2" id="location">
                            <option value="">Select Location</option>
                            <option value="new-york">New York</option>
                            <option value="los-angeles">Los Angeles</option>
                            <option value="chicago">Chicago</option>
                            <!-- Add more location options as needed -->
                        </select>

                        <input type="date" class="form-control" id="date" placeholder="Pick Date">
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Increasing Graph</h5>
                            <canvas id="increasingGraph" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Decreasing Graph</h5>
                            <canvas id="decreasingGraph" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        // Data for the increasing graph
        var increasingData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                label: "Increasing Data",
                data: [10, 20, 30, 40, 50, 60],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        // Data for the decreasing graph
        var decreasingData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
            datasets: [{
                label: "Decreasing Data",
                data: [60, 50, 40, 30, 20, 10],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };
        // Get the canvas elements
        var increasingCanvas = document.getElementById("increasingGraph").getContext('2d');
        var decreasingCanvas = document.getElementById("decreasingGraph").getContext('2d');
        // Create and render the charts
        var increasingChart = new Chart(increasingCanvas, {
            type: 'line',
            data: increasingData,
        });
        var decreasingChart = new Chart(decreasingCanvas, {
            type: 'line',
            data: decreasingData,
        });
        </script>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Today's Total Sales</h5>
                            <p class="card-text">
                                <span id="refundValue">998</span>
                                <span class="up-arrow mr-4" id="refundArrow">&uarr;</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Today's Net Sales</h5>
                            <p class="card-text">5,00,6788</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Today's Credit Sales</h5>
                            <p class="card-text">12345555</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Yesterday's Net Sales</h5>
                            <p class="card-text">6788788</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">This month Net sales</h5>
                            <p class="card-text">7897677</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Outstanding</h5>
                            <p class="card-text">86467777</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Customers this month</h5>
                            <p class="card-text">545466</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Products sold this month</h5>
                            <p class="card-text">56778888</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Refunds this month</h5>
                            <p class="card-text">998</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Voids This month</h5>
                            <p class="card-text">677888</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Inventory Cost</h5>
                            <p class="card-text">899000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12 mt-5">
                <h5>Top Selling Products</h5>
                <div class="table-responsive">
                    <table id="dataTable">
                        <thead>
                            <tr>
                                <th> </th>
                                <th class="col-8 ">Product</th>
                                <th class="col-8">Sold</th>
                                <th class="col-4">Revenue</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="product_a.jpg" class="product-image">
                                    Product A</td>
                                <td>100</td>
                                <td>$1,000</td>
                            </tr>
                            <tr>
                                <td><img src="product_a.jpg" class="product-image">
                                    Product B</td>
                                <td>75</td>
                                <td>$750</td>
                            </tr>
                            <tr>
                                <td><img src="product_a.jpg" class="product-image">
                                    Product c</td>
                                <td>120</td>
                                <td>$1,200</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
// Initialize the date picker
$(document).ready(function() {
    $('#date').datepicker({
        format: 'mm/dd/yyyy', // You can customize the date format
        todayHighlight: true
    });
});
</script>







@endsection