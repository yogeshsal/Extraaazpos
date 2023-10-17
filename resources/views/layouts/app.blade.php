<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

  <head>

    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Layout config Js -->
    <script src="{{asset('js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    <style>
      /*
    DEMO STYLE
*/

      /* @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"; */

      /* body {
        font-family: 'Poppins', sans-serif;
        background: #F8F8F8;
      }

      .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
      }

      .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
      } */


      /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

      /* .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
      } */

      /* #sidebar {
        min-width: 250px;
        max-width: 250px; */
      /* background: #2b2b2b; */
      /* background: #1D2632;
        color: #fff;
        transition: all 0.3s;
        margin-top: 50px;
      } */

      /* li.sub:hover {
        background-color: #4A515B; */
      /* Change to the desired background color */
      /* color: #ffffff !important; */
      /* } */



      /* #navbar {
        background: #ADD8E6;
      }

      #sidebar.active {
        margin-left: -250px;
      }

      #sidebar .sidebar-header {
        padding: 20px;
        background: #1D2632;
      }

      #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid; */
      /* #47748b; */
      /* } */

      /* #sidebar ul p {
        color: #fff;
        padding: 10px;
      }

      #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
        color: #f89803;
      } */


      /* #sidebar ul li.active>a,
      a[aria-expanded="true"] {
       
        color: #f89803;
      }

      a[data-toggle="collapse"] {
        position: relative;
      }

      a[aria-expanded="false"]::before,
      a[aria-expanded="true"]::before {
        display: block;
        position: absolute;
        right: 20px;
        font-family: 'Glyphicons Halflings';
        font-size: 0.6em;
      }

      a[aria-expanded="true"]::before {}

      ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
      }

      ul.CTAs {
        padding: 20px;
      }

      ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
      } */




      /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

      /* #content {
        width: 100%;
        padding: 20px;
        width: 100%;
        min-height: 100vh;
        transition: all 0.3s;
        margin-top: 50px;
      }

      #content p a {
        color:
      } */


      /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

      /* @media (max-width: 768px) {
        #sidebar {
          margin-left: -250px;
        }

        #sidebar.active {
          margin-left: 0;
        }

        #sidebarCollapse span {
          display: none;
        }
      } */
    </style>





    <script>
      $(document).ready(function() {
        $("#sidebarCollapse").on("click", function() {
          $("#sidebar").toggleClass("active");
          $(this).toggleClass("active");
        });
      });
    </script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
      $(document).ready(function() {
        $('#sidebar .menu li a').click(function() {
          var submenu = $(this).closest('li').find('.submenu');
          if (submenu.length > 0) {
            // Close other open submenus
            $('#sidebar .menu li .submenu').not(submenu).slideUp();
            // Toggle the clicked submenu
            submenu.slideToggle();
            return false;
          }
        });
      });
    </script>
  </head>

<body>
  <div id="">
    <!-- <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto">

          </ul>

          <ul class="navbar-nav ms-auto">
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">`{{ __('Register') }}`</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav> -->


    <main class="py-0">
      @yield('content')
      <!-- @yield('script') -->
    </main>
  </div>
</body>

</html>