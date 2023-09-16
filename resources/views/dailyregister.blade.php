
@extends('layouts.app')

@section('content')

<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3><a href="/">Extraswad POS</a></h3>      
    </div>

    <ul class="list-unstyled components">
     
      <li>
        <a href="/owner">Home</a>        
      </li>
      <li>
     
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Point of sale</a>
        <ul id="pageSubmenu">
          <li><a href="/">Register</a></li>
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
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>                               
                            </button>

                            <hr>
                            <div class="container-fluid">
                               
                            
    <div>

    
    <div class="row">
    <div class="card" style="width: 100%;">
        <div class="row">
            <div class="col-12">
            <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
            </div>
            
           
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