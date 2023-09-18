<div class="wrapper">  
  <nav id="sidebar">
    <div class="sidebar-header">
      <!-- <h3>Extraswad POS</h3>           -->
      <img src="images/logo1.png" class="img-fluid" alt="...">
    </div>

    <ul>     
      <li class="nav-item">
        <a href="/owner"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a>        
      </li>
      <li class="nav-item">     
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Point of sale</a>
        <ul id="pageSubmenu">

       
          <li><a href="/dailyregister">Register</a></li>
          <li><a href="/billing">Billing</a></li>
          <li><a href="#">Register Sessions</a></li>
          <li><a href="#">Bill History</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/location">Add Location</a>
      </li>     
    </ul>   
  </nav>

  <!-- Page Content Holder -->
    <div id="content">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>                                
                    </button>

                            
                    <div class="container-fluid">
                    <div>    
    </div>



<main class="py-0">
            @yield('ownercontent')
        </main>
        
    </div>