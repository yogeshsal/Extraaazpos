@extends('layouts.ownerlayout')
@extends('layouts.app')
@section('ownercontent')
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
        <div class="col-12">
          <div class="justify-content-between d-flex align-items-center mt-3 mb-4">
            <!-- <h5 class="mb-0 pb-1 text-decoration-underline">Card Header and Footer</h5> -->
          </div>
          <div class="row">
            <div class="col-xxl-12 col-lg-6">
              <div class="card">
                <!-- <div class="card-header">
                                            <button type="button" class="btn-close float-end fs-11" aria-label="Close"></button>
                                            <h6 class="card-title mb-0">Hi, Erica Kernan</h6>
                                        </div> -->
                <div class="card-body">

                  <form id="category-form" method="POST" action="{{ route('tax.items', ['id' => Route::current()->parameter('id')]) }}"> @csrf

                    <div class="col-lg-6">
                      <div class="input-group">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-orange" type="submit" id="button-addon2">Button</button>
                      </div>
                    </div>
                    <!-- <input type="text" class="form-control"> -->
                    <!-- Your checkboxes and table here -->

                    <!-- <button class="btn btn-orange m-1" type="submit">Save</button> -->

                </div>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th scope="col">Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Selling Price</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($items as $i)
                    <tr>
                      <!-- <td><input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$i->id}}"></td>         -->
                      <td>
                        <input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$i->id}}" @if(in_array($i->id, $ids)) checked @endif
                      </td>
                      <td>{{$i->item_name}}</td>
                      <td>{{$i->cat_name}}</td>
                      <td>{{$i->item_default_sell_price}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </form>
              </div>
              <div class="card-footer">
                <a href="javascript:void(0);" class="link-success float-end">Read More <i class="ri-arrow-right-s-line align-middle ms-1 lh-1"></i></a>
                <p class="text-muted mb-0">1 days Ago</p>
              </div>
            </div>
          </div><!-- end col -->

        </div><!-- end row -->
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


<!-- <div class="row card shadow p-3">
  <h3>Select items</h3>
  <div class="row">
    <div class="col-lg-5">
      <input type="text" class="form-control">
    </div>

    <div class="col-lg-7">
      <form id="category-form" method="POST" action="{{ route('tax.items', ['id' => Route::current()->parameter('id')]) }}"> @csrf

        <button class="btn btn-orange m-1" type="submit">Save</button>

    </div>
    <br><br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th></th>
          <th scope="col">Name</th>
          <th scope="col">Category</th>
          <th scope="col">Selling Price</th>
        </tr>
      </thead>
      <tbody>

        @foreach($items as $i)
        <tr>
          <td>
            <input value="{{$i->id}}" class="items-checkbox" type="checkbox" name="selected_items[]" id="items-{{$i->id}}" @if(in_array($i->id, $ids)) checked @endif
          </td>
          <td>{{$i->item_name}}</td>
          <td>{{$i->cat_name}}</td>
          <td>{{$i->item_default_sell_price}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </form>
  </div> -->



  @endsection