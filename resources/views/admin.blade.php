
@extends('layouts.app')

@section('content')

<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>Extraswad POS</h3>          
    </div>

    <ul>     
      <li class="active">
        <a href="/admin" data-toggle="collapse" aria-expanded="false">Home</a>        
      </li>
      <li>     
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Point of sale</a>
        <ul id="pageSubmenu">
          <li><a href="/dailyregister">Register</a></li>
          <li><a href="#">Billing</a></li>
          <li><a href="#">Register Sessions</a></li>
          <li><a href="#">Bill History</a></li>
        </ul>
      </li>
      <!-- <li>
        <a href="#">Portfolio</a>
      </li>
      <li>
        <a href="#">Contact</a>
      </li> -->
    </ul>

    <!-- <ul class="list-unstyled CTAs">
      <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to the article</a></li>
    </ul> -->
  </nav>

  <!-- Page Content Holder -->
    <div id="content">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>                                
                    </button>

                            <hr>
                            <div class="container-fluid">
                               
                            
    <div>

    <div class="row">
    <div class="card" style="width: 100%;">
        <div class="row">
            
        </div>
    </div>
</div>
        
    </div>

    
      
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are in ADMIN Dashboard!
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection