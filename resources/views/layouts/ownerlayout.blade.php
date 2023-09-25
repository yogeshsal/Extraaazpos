<style>
   /* Remove underline from anchor (link) */
   .nav-item a {
            text-decoration: none;
        }

        /* Style for the submenu */
        #pointofsale,
        #onlineorder,
        #catalogue,
        #rawmaterial,
        #possetting {
            list-style-type: none;
            padding-left: 0;
            display: none;
        } 

        /* Style for submenu items */
        #pointofsale li,
        #onlineorder li,
        #catalogue li,
        #rawmaterial li,
        #possetting li
        {
            margin-left: 10px;
        }
         

        /* Show submenu when the parent is hovered */
        /* .nav-item:hover #pointofsale {
            display: block;
        } */
        .btn-orange {
            background-color: darkorange; /* Change the background color to orange */
            border-color: darkorange; /* Change the border color to orange (optional) */
            color: white; /* Change the text color to white (optional) */
        }

        /* Hover effect (optional) */
        .btn-orange:hover {
            background-color: orange; /* Change the background color on hover */
            border-color: orange; /* Change the border color on hover (optional) */
            color: black;
        }
</style>


<div class="wrapper">  
  <nav id="sidebar">
    <div class="sidebar-header">
      <!-- <h3>Extraswad POS</h3>           -->
      <img src="images/logo1.png" class="img-fluid" alt="...">
    </div>

    <ul class="menu">
      <li class="nav-item">
        <a href="/owner"><i class="fa fa-fw fa-home"></i>&nbsp;Home</a>        
      </li>
      <li class="nav-item">
          <a class="nav-link" onclick="togglepointofsale()" href="#pointofsale" data-toggle="collapse" aria-expanded="false">
            <i class="fa-solid fa-store"></i>&nbsp;Point of sale&nbsp;
            <!-- <i class="fa-solid fa-caret-down"></i> -->
          </a>
          <ul id="pointofsale" class="submenu">
          <li class="sub"><a href="/dailyregister">Register</a></li>
          <li class="sub"><a href="/billing">Billing</a></li>
          <li class="sub"><a href="/session">Register Sessions</a></li>
          <li class="sub"><a href="#">Bill History</a></li>
          </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link"  onclick="toggleonlineorder()" href="#onlineorder" data-toggle="collapse" >
        <i class="fa-solid fa-cart-shopping"></i>&nbsp;Online Orders
        <!-- &nbsp; <i class="fa-solid fa-caret-down"></i> -->
        </a>
        <ul id="onlineorder" class="submenu">
            <li class="sub"><a href="/owner">Order Tracker</a></li>
            <li class="sub"><a href="/owner">Pickup Display</a></li>
            <li class="sub"><a href="/owner">Order History</a></li>
            <li class="sub"><a href="/owner">Day Summary</a></li>
            <li class="sub"><a href="/owner">Logs</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/owner"><i class="fa-solid fa-tv"></i>&nbsp;KDS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/customers"><i class="fa-solid fa-users"></i>&nbsp;Customers</a>
      </li>


      <li class="nav-item">
        <a class="nav-link"  onclick="togglecatalogue()" href="#catalogue" data-toggle="collapse" >
        <i class="fa-solid fa-utensils"></i>&nbsp;Catalogue &nbsp;
        <!-- <i class="fa-solid fa-caret-down"></i> -->
        </a>
        <ul id="catalogue" class="submenu">
            <li class="sub"><a href="/owner">Items</a></li>
            <li class="sub"><a href="/owner">Categories</a></li>
            <li class="sub"><a href="/owner">Category Timings</a></li>
            <li class="sub"><a href="/owner">Modifier Groups</a></li>
            <li class="sub"><a href="/owner">Taxes</a></li>
            <li class="sub"><a href="/owner">Charges</a></li>
            <li class="sub"><a href="/owner">Discounts</a></li>
            <li class="sub"><a href="/owner">Billing Entities</a></li>
        </ul>
      </li>  




      <li class="nav-item">
        <a class="nav-link"  onclick="togglerawmaterial()" href="#catalogue" data-toggle="collapse" >
        <i class="fa-solid fa-basket-shopping"></i>&nbsp;Raw Materials &nbsp;
        <!-- <i class="fa-solid fa-caret-down"></i> -->
        </a>
        <ul id="rawmaterial" class="submenu">
            <li class="sub"><a href="/owner">Materials</a></li>
            <li class="sub"><a href="/owner">Intermediates</a></li>
            <li class="sub"><a href="/owner">Categories</a></li>
            <li class="sub"><a href="/owner">Modifier Groups</a></li>
            <li class="sub"><a href="/owner">Taxes</a></li>            
        </ul>
      </li>  


      
      <!-- <li class="nav-item">
        
      </li>      -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="/add_floor">Floor Setting</a>
      </li> -->
      
      <!-- setting -->
      <li class="nav-item" >
        <a class="nav-link"  onclick="togglepossetting()" href="#rawmaterial" data-toggle="collapse" >
        <i class="fa-solid fa-gear"></i>&nbsp;POS Setting
        </a>
        <ul id="possetting" class="submenu">
            <li class="sub"><a class="nav-link" href="/location">Add Location</a></li>
            <li class="sub"><a href="/add_floor">Floor Plan</a></li>                        
        </ul>
      </li> 
    </ul>   
  </nav>

  <script>
        function togglepointofsale() {
            var submenu = document.getElementById("pointofsale");
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }

        function toggleonlineorder() {
            var submenu = document.getElementById("onlineorder");
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }

        function togglecatalogue() {
            var submenu = document.getElementById("catalogue");
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }
        
        function togglerawmaterial() {
            var submenu = document.getElementById("rawmaterial");
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }

        function togglepossetting() {
            var submenu = document.getElementById("possetting");
            if (submenu.style.display === "none" || submenu.style.display === "") {
                submenu.style.display = "block";
            } else {
                submenu.style.display = "none";
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('.nav-link').click(function () {
            // Close all submenus except the one clicked
            $('.submenu').not($(this).next('.submenu')).slideUp();

            // Toggle the submenu of the clicked menu item
            $(this).next('.submenu').slideToggle();
        });
    });
</script>

  <!-- Page Content Holder -->
    <div id="content">
                    <button type="button" id="sidebarCollapse" class="btn btn-orange navbar-btn">
                    <i class="fa fa-bars" aria-hidden="true"></i>                                
                    </button>

                            
                    <div class="container-fluid">
                    <div>    
    </div>

    

<main class="py-0">
            @yield('ownercontent')
        </main>
        
    </div>