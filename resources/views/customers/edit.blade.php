@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
<style>
    .text-danger {
        color: red;
    }
</style>
<br>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->

            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-12">
                    <h5 class="mb-3">Edit Taxes</h5>
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="NameInput" class="form-label"> Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="{{ $customer->name }}">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="Description" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" value="{{ $customer->mobile }}">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="handle" class="form-label">Email</label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{$customer->email}}" placeholder="Enter Email">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="handle" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$customer->date_of_birth}}" placeholder="Enter Date of Birth">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="handle" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{$customer->address}}" placeholder="Enter Address">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="handle" class="form-label">Tax Number</label>
                                            <input type="text" class="form-control" id="tax_number" name="tax_number" value="{{$customer->tax_number}}" placeholder="Enter Tax Number">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="handle" class="form-label">Credit Limit</label>
                                            <input type="text" class="form-control" id="credit_limit" name="credit_limit" value="{{$customer->credit_limit}}" placeholder="Enter Credit Limit">
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-6">
                                        <!-- Example Textarea -->
                                        <div>
                                            <label for="cat_desc" class="form-label">Notes</label>
                                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                        </div>
                                        <!-- <div class="mb-3">
                                                    <label for="cat_desc" class="form-label">Description </label>
                                                    <textarea name="cat_desc" id="cat_desc" rows="3"></textarea>
                                                </div> -->



                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <a href="/taxes">
                                                    <button type="button" class="btn btn-secondary">Cancel</button></a>
                                                <button type="submit" class="btn btn-orange">Submit</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                            </form>

                            <!-- Tab panes -->

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    © Hybrix.
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




<!-- ------------------------------------------------------------- -->


<!-- <div class="container">
    <div class="card card shadow p-3">
        <h3>Edit Customer</h3>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $customer->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Mobile<span class="text-danger">*</span></label>
                        <input type="text" id="mobile" name="mobile" class="form-control" value="{{ $customer->mobile }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $customer->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ $customer->date_of_birth }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $customer->address }}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tax_number">Tax Number</label>
                        <input type="text" id="tax_number" name="tax_number" class="form-control" value="{{ $customer->tax_number }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="credit_limit">Credit Limit</label>
                        <input type="text" id="credit_limit" name="credit_limit" class="form-control" value="{{ $customer->credit_limit }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <textarea id="note" name="note" class="form-control">{{ $customer->note }}</textarea>
            </div>


            <div class="form-group">
                <a href="/customers" class="btn btn-secondary m-2">Back</a>
                <button type="submit" class="btn btn-orange m-2">Update</button>
            </div>
        </form>
    </div>
</div> -->
@endsection