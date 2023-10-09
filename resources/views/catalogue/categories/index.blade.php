
@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')

<style>
  /* Custom CSS class to increase modal size */
.large-modal {
    max-width: 800px; /* Adjust the maximum width as needed */
}
.form-row {
        margin-bottom: 20px; /* Add space below each row */
    } 
</style>
<style>
    .table-image {
        width: 100px; /* Set the desired width */
        height: auto; /* Auto-adjust the height to maintain the aspect ratio */
    }
    .table-row {
    display: flex;
    justify-content: space-between; 
    align-items: center; /* Vertically center the content */
    }
    .left-align {
    text-align: left; /* Left-align the content of the first two td elements */
    }

    .right-align {
        text-align: right; /* Right-align the content of the last td */
    }
</style>

<br>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h3>Categories</h3>        
        <div class="d-flex align-items-center">
            <div class="input-group mr-2">                
                <input type="search" id="searchInput" class="form-control rounded m-1" placeholder="Search by Name" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-secondary m-1"><i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filters</button>           
                <a href="" class="btn btn-orange m-1" data-toggle="modal" data-target="#add_category">+ Add Category</a>
            </div>        
        </div>       
    </div> 
</div>
<br>
<div class="card">
<table class="table" id="data-table">
    <thead></thead>
        <tbody>
        <div class="card">
            @foreach($category as $category)   
            <tr>
                <td class="left-align">
                    <div style="display: flex; align-items: center;"> <!-- Use flexbox to align image and text -->
                        @if ($category->cat_image)
                            <img src="{{ asset('storage/'.$category->cat_image) }}" alt="Image" class="table-image">
                        @else
                            <img src="{{ asset('storage/item_images/placeholder.png') }}" alt="Placeholder Image" class="table-image">
                        @endif
                        <div style="margin-left: 10px;"> <!-- Add margin for spacing between image and text -->
                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}">
                                {{$category->cat_name}}
                            </a><br>
                            <p>Handle: {{$category->cat_handle}}</p>
                        </div>
                    </div>
                </td>
                
                <td>
                    {{ $category->items->count() }} items
                </td>
            </tr>
            @endforeach
            
        </tbody>
    
</table>

</div>


<!-- create Modal -->
    <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-left modal-lg large-modal" role="document">
            <div class="modal-content p-3">
                <h5>New Category</h5>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_name">Name:</label>
                                <input type="text" name="cat_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_short_name">Short Name:</label>
                                <input type="text" name="cat_short_name" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_handle">Handle:</label>
                                <input type="text" name="cat_handle" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_timing_group">Category Timing Group:</label>
                                <select name="cat_timing_group" class="form-select" aria-label="Default select example">
                                    <option selected>Select Category timing</option>
                                    @foreach($timing as $t)
                                    <option value="{{$t->id}}">{{$t->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="row form-row">
                        <div class="form-group">
                            <label for="cat_desc">Description</label>
                            <textarea name="cat_desc" class="form-control mt-3" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                    </div>

                    
                
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-orange mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Function to filter the table based on user input
    function filterTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("data-table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0]; // Change the index to match the column you want to search
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

