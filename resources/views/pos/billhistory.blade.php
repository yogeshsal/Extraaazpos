@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
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

.page-content {
    height: 100vh;
}
</style>

<div class="main-content">
    <div class="page-content">
        <div class="card shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="p-0">Bill History</h3>
                </div>
                
            </div>

</div>
</div>