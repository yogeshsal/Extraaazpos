@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')

@php
$date = date('Y-m-d');
@endphp

<div class="main-content">
    <div class="page-content">

        <div class="card alert alert-light shadow">
            <div class="d-flex justify-content-between align-content-center my-2">
                <div>
                    <h3>Sales Dashboard</h3>
                </div>
                <div class="d-flex">
                    <div class="mr-2">
                        <input class="form-control" list="locationList" id="locationDatalist"
                            placeholder="Search locations...">
                        <datalist id="locationList">
                            <option value="San Francisco">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                    </div>
                    <div>
                        <!-- <h4 class="text-dark">Sales Dashboard 1</h4> -->
                        <input type="date" id="booking_from_date" name="from_date" class="form-control"
                            value="{{$date}}">
                    </div>
                    <div>
                        <input type="date" id="booking_to_date" name="to_date" class="form-control" value="{{$date}}">
                    </div>
                </div>

            </div>
            <!-- chart card -->
            <div class="container-fluid">
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div id="chartcontainer1" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div id="chartcontainer2" style="width:100%; height:400px;"></div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title">Net Sales</h5>
                                <canvas id="increasingGraph" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title">Sales Count</h5>
                                <canvas id="decreasingGraph" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2 p-2">
                            <div class="card-body">
                                <h5> Total Sales</h5>
                                <p class="card-text">
                                    <span id="refundValue">99,098</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +89%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Today's Net Sales</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +59%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Today's Credit Sales</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-danger fw-bolder float-end"><i class="bi bi-caret-down-fill"></i>
                                        -88%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Yesterday's Net Sales</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +59%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>This month Net sales</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +59%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Total Outstanding</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-danger fw-bolder float-end"><i class="bi bi-caret-down-fill"></i>
                                        -39%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Customers this month</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +59%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Products sold this month</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +9%</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Refunds this month</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-danger fw-bolder float-end"><i
                                            class="bi bi-caret-down-fill"></i>39%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Voids This month</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-success fw-bolder float-end"><i class="bi bi-caret-up-fill"></i>
                                        +59%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow-lg p-2">
                            <div class="card-body">
                                <h5>Total Inventory Cost</h4>
                                    <span id="refundValue">50,0998</span>
                                    <span class=" text-danger fw-bolder float-end"><i class="bi bi-caret-down-fill"></i>
                                        -29%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <h4 class="p-3 mb-4">Top Selling Products </h4>
            <div class="container-fluid mb-4">
                <table class="table table-hover table-bordered table-condensed table-card" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="col-8">Product</th>
                            <th class="col-8">Sold</th>
                            <th class="col-4">Revenue</th>
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
                                Product D</td>
                            <td>120</td>
                            <td>$1,200</td>
                        </tr>
                        <tr>
                            <td><img src="product_a.jpg" class="product-image">
                                Product D</td>
                            <td>10</td>
                            <td>$100</td>
                        </tr>

                        <tr>
                            <td><img src="product_a.jpg" class="product-image">
                                Product E</td>
                            <td>110</td>
                            <td>$1,300</td>
                        </tr>
                        <tr>
                            <td><img src="product_a.jpg" class="product-image">
                                Product F</td>
                            <td>150</td>
                            <td>$1,500</td>
                        </tr>

                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// Data for the increasing graph
var increasingData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: "Increasing Data",
        data: [45, 20, 87, 40, 66, 60, 4, 12, 33, 0, 29, 11],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
};
// Data for the decreasing graph
var decreasingData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: "Decreasing Data",
        data: [90, 50, 10, 30, 20, 10, 40, 66, 60, 4, 12, 33],
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


<script>
document.addEventListener('DOMContentLoaded', function() {
    const chart1 = Highcharts.chart('chartcontainer1', {
        chart1: {
            type: 'line'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });

    const chart2 = Highcharts.chart('chartcontainer2', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Fruit Consumption'
        },
        xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
        },
        yAxis: {
            title: {
                text: 'Fruit eaten'
            }
        },
        series: [{
            name: 'Jane',
            data: [1, 0, 4]
        }, {
            name: 'John',
            data: [5, 7, 3]
        }]
    });
});
</script>

@endsection