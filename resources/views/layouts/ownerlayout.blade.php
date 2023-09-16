<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <h3>Extraswad POS</h3>          
    </div>

    <ul>     
      <li class="active">
        <a href="/owner" data-toggle="collapse" aria-expanded="false">Home</a>        
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



<main class="py-0">
            @yield('ownercontent')
        </main>
        
    </div>