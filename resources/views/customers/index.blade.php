@extends('layouts.ownerlayout')
@extends('layouts.app')

@section('ownercontent')
<style>
    .grey-background {
        background-color: grey;
    }
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

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr {
        border-bottom: 2px solid #F5F5F5; /* Light grey border between rows */
    }
    .btn.btn-outline-secondary {
        border-color: #6c757d; /* Set the default border color */
    }

    .btn.btn-outline-secondary:hover {
        border-color: orange; /* Change the border color to orange on hover */
        background-color: transparent;
        color:orange;
    }
</style>

<br>
<div class="card">
<div class="card-body d-flex justify-content-between align-items-center">
    <h3>Customers</h3>
    <div class="d-flex align-items-center">
        <div class="input-group mr-2">
            <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
            <!-- <button type="button" class="btn btn-outline-primary m-1">Search</button> -->
            <button type="button" class="btn btn-outline-secondary m-1">Filters</button>
        <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#exampleModal">+ Add Customer</a>
        </div>
        
    </div>
</div>

    <!-- <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Customers</h3>
        <div>
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
                    <button type="button" class="btn btn-outline-secondary">Filters</button>
                    <a href="" class="btn btn-orange" data-toggle="modal" data-target="#exampleModal">+ Add Customer</a>            
        </div>
    </div> -->
    
    <table id="dataTable">
    <thead>
        <tr >
            <th class="grey-background">No.</th>
            <th class="grey-background">#</th>
            <th class="grey-background">Name</th>
            <th class="grey-background">Mobile</th>
            <th class="grey-background">Outstanding</th>
            <th class="grey-background">Total Spent</th>
            <th class="grey-background">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>
                    <div class="circle">
                        {{ strtoupper(substr($data->name, 0, 1)) }}
                    </div>
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->mobile }}</td>
                <td></td> 
                <td></td>                
                <td><a href="/customers/{{ $data->id }}/edit"><button type="button" class="btn btn-outline-secondary">Edit Customer</button></a>
            </tr>
        @endforeach
    </tbody>
</table>
</div>






<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Create Customer</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
        <div class="modal-body"> 
            <div class="container">                
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile">Date of Birth:</label>
                                <input type="date" name="date_of_birth" class="form-control">
                            </div>
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tax_number">Tax Number:</label>
                        <input type="text" name="tax_number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="credit_limit">Credit Limit:</label>
                        <input type="number" name="credit_limit" class="form-control" step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="note">Notes:</label>
                        <textarea name="note" class="form-control" rows="4"></textarea>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Create</button>
                    </div>
                </form>
            </div>
        </div>        
    </div>
</div>




<!-- edit modal -->
  







<script>
    // Function to filter the table based on user input
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2]; // Change the index to match the column you want to search
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Add an event listener to the search input
    document.getElementById("searchInput").addEventListener("keyup", filterTable);
</script>






@endsection