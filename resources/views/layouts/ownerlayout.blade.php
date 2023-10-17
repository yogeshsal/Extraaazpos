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
#possetting,
#companyadmin {
    list-style-type: none;
    padding-left: 0;
    display: none;
}

/* Style for submenu items */
#pointofsale li,
#onlineorder li,
#catalogue li,
#rawmaterial li,
#possetting li,
#companyadmin li {
    margin-left: 10px;
}

/* Show submenu when the parent is hovered
    */
/* .nav-item:hover #pointofsale { display: block; } */
.btn-orange {
    background-color: darkorange;
    /* Change the
    background color to orange */
    border-color: darkorange;
    /* Change the border color to orange (optional) */
    color:
        white;
    /* Change the text color to white (optional) */
}

/* Hover effect (optional) */
.btn-orange:hover {
    background-color: orange;
    /* Change the background color on hover */
    border-color: orange;
    /* Change the border
    color on hover (optional) */
    color: black;
}
</style>
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="/owner" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="images/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="images/logo-dark.png" alt="" height="25">
                            </span>
                        </a>

                        <a href="/owner" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="images/logo-light.png" alt="" height="25">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                        id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <button type="button" class="btn btn-sm px-3 fs-15 text-muted header-item d-none d-md-block"
                        data-bs-toggle="modal" data-bs-target="#searchModal">
                        <span class="bi bi-search me-2"></span> Search for Extraaazpos...
                    </button>
                </div>

                <div class="d-flex align-items-center">

                    <div class="d-md-none topbar-head-dropdown header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            id="page-header-search-dropdown" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="bi bi-search fs-16"></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-grid fs-18'></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                            <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fw-semibold fs-15"> Browse by Apps </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="btn btn-sm btn-soft-info"> View All Apps
                                            <i class="ri-arrow-right-s-line align-middle"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/github.png" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/mail_chimp.png" alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="images/brands/slack.png" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="UNIQUE EXTRAAAZPOS ID">
                        {{$restaurant_id}}
                    </button>

                    @if (!empty($locationname))
                    <button type="button" class="btn btn-light m-4" data-bs-container="body" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-content="UNIQUE EXTRAAAZPOS ID">
                        <?php echo $locationname; ?>
                    </button>
                    @endif

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-toggle="fullscreen">
                            <i class='bi bi-arrows-fullscreen fs-16'></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-sun align-middle fs-20"></i>
                        </button>
                        <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                            <a href="#!" class="dropdown-item" data-mode="light"><i
                                    class="bi bi-sun align-middle me-2"></i> Defualt
                                (light mode)</a>
                            <a href="#!" class="dropdown-item" data-mode="dark"><i
                                    class="bi bi-moon align-middle me-2"></i>
                                Dark</a>
                            <a href="#!" class="dropdown-item" data-mode="auto"><i
                                    class="bi bi-moon-stars align-middle me-2"></i>
                                Auto (system defualt)</a>
                        </div>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bi bi-bell fs-18'></i>
                            <span
                                class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"><span
                                    class="notification-badge">4</span><span class="visually-hidden">unread
                                    messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head rounded-top">
                                <div class="p-3 border-bottom border-bottom-dashed">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="mb-0 fs-16 fw-semibold"> Notifications <span
                                                    class="badge badge-soft-danger fs-13 notification-badge">
                                                    4</span></h6>
                                            <p class="fs-14 text-muted mt-1 mb-0">You have <span
                                                    class="fw-semibold notification-unread">3</span> unread
                                                messages
                                            </p>
                                        </div>
                                        <div class="col-auto dropdown">
                                            <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                class="link-secondary fs-14"><i
                                                    class="bi bi-three-dots-vertical"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                <li><a class="dropdown-item" href="#">Mark all as read</a></li>
                                                <li><a class="dropdown-item" href="#">Archive All</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="py-2 ps-2" id="notificationItemsTabContent">
                                <div data-simplebar style="max-height: 300px;" class="pe-2">
                                    <h6 class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">
                                        New</h6>
                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                <span
                                                    class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                    <i class="bx bx-badge-check"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 fs-14 mb-2 lh-base">Your <b>Elite</b> author
                                                        Graphic
                                                        Optimization <span class="text-secondary">reward</span>
                                                        is
                                                        ready!
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec
                                                        ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check01">
                                                    <label class="form-check-label"
                                                        for="all-notification-check01"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="position-relative me-3 flex-shrink-0">
                                                <img src="images/users/avatar-2.jpg" class="rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <span
                                                    class="active-badge position-absolute start-100 translate-middle p-1 bg-success rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-14 fw-semibold">Angela Bernier</h6>
                                                </a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">Answered to your comment on the cash flow
                                                        forecast's graph 🔔.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                        ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check02">
                                                    <label class="form-check-label"
                                                        for="all-notification-check02"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="text-reset notification-item d-block dropdown-item position-relative unread-message">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                <span
                                                    class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                    <i class='bx bx-message-square-dots'></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-2 fs-14 lh-base">You have received <b
                                                            class="text-success">20</b> new messages in the
                                                        conversation
                                                    </h6>
                                                </a>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check03">
                                                    <label class="form-check-label"
                                                        for="all-notification-check03"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="text-overflow text-muted fs-13 my-2 text-uppercase notification-title">
                                        Read Before</h6>

                                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                                        <div class="d-flex">

                                            <div class="position-relative me-3 flex-shrink-0">
                                                <img src="images/users/avatar-8.jpg" class="rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <span
                                                    class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                </span>
                                            </div>

                                            <div class="flex-grow-1">
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="mt-0 mb-1 fs-14 fw-semibold">Maureen Gibson</h6>
                                                </a>
                                                <div class="fs-13 text-muted">
                                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                                </div>
                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                </p>
                                            </div>
                                            <div class="px-2 fs-15">
                                                <div class="form-check notification-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="all-notification-check04">
                                                    <label class="form-check-label"
                                                        for="all-notification-check04"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center align-items-center">
                                        Select <div id="select-content" class="text-body fw-semibold px-1">0
                                        </div>
                                        Result <button type="button" class="btn btn-link link-danger p-0 ms-2"
                                            data-bs-toggle="modal"
                                            data-bs-target="#removeNotificationModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" src="images/profile.jpg" alt="Profile">
                                <span class="text-start ms-xl-2">
                                    <span
                                        class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{Auth::user()->name}}</span>
                                    <span
                                        class="d-none d-xl-block ms-1 fs-13 text-muted user-name-sub-text">Admin</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Diana!</h6>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Profile</span></a>
                            <a class="dropdown-item" href="#!"><i
                                    class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Messages</span></a>
                            <a class="dropdown-item" href="#!"><i
                                    class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Taskboard</span></a>
                            <a class="dropdown-item" href="pages-faqs.html"><i
                                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Help</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Balance : <b>$8451.36</b></span></a>
                            <a class="dropdown-item" href="pages-profile-settings.html"><span
                                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Settings</span></a>
                            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                    class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Lock
                                    screen</span></a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="/owner" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="images/logo-sm.png" alt="" height="26">
                </span>
                <span class="logo-lg">
                    <img src="images/logo-dark.png" alt="" height="26">
                </span>
            </a>
            <a href="/owner" class="logo logo-light">
                <span class="logo-sm">
                    <img src="images/logo-sm.png" alt="" height="26">
                </span>
                <span class="logo-lg">
                    <img src="images/logo-light.png" alt="" height="26">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                    <li class="nav-item">
                        <a href="/owner" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                                data-key="t-dashboard">Dashboard</span> </a>
                    </li>

                    <!-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Point of sale</span></li> -->

                    <!-- <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAuth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="bi bi-person-circle"></i> <span data-key="t-authentication">Authentication</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAuth">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Sign In
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarSignIn">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-signin-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-signin-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-signin-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarSignUp" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignUp" data-key="t-signup"> Sign Up </a>
                                    <div class="collapse menu-dropdown" id="sidebarSignUp">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-signup-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-signup-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-signup-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarResetPass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarResetPass" data-key="t-password-reset">
                                        Password Reset
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarResetPass">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-pass-reset-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-pass-reset-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-pass-reset-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarchangePass" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarchangePass" data-key="t-password-create">
                                        Password Create
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarchangePass">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-pass-change-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-pass-change-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-pass-change-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarLockScreen" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLockScreen" data-key="t-lock-screen">
                                        Lock Screen
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarLockScreen">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-lockscreen-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-lockscreen-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-lockscreen-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="#sidebarLogout" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLogout" data-key="t-logout"> Logout
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarLogout">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-logout-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-logout-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-logout-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarSuccessMsg" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSuccessMsg" data-key="t-success-message"> Success Message
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarSuccessMsg">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-success-msg-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-success-msg-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-success-msg-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarTwoStep" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTwoStep" data-key="t-two-step-verification"> Two Step Verification
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarTwoStep">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-twostep-basic.html" class="nav-link" data-key="t-basic"> Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-twostep-basic-2.html" class="nav-link" data-key="t-basic-2"> Basic 2</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-twostep-cover.html" class="nav-link" data-key="t-cover"> Cover </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="#sidebarErrors" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarErrors" data-key="t-errors"> Errors
                                    </a>
                                    <div class="collapse menu-dropdown" id="sidebarErrors">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="auth-404-basic.html" class="nav-link" data-key="t-404-basic"> 404 Basic </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-404-cover.html" class="nav-link" data-key="t-404-cover"> 404 Cover </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-404-alt.html" class="nav-link" data-key="t-404-alt">
                                                    404 Alt </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-500.html" class="nav-link" data-key="t-500"> 500 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="auth-offline.html" class="nav-link" data-key="t-offline-page"> Offline Page </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#pos" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Point of sale</span>
                        </a>

                        <div class="collapse menu-dropdown" id="pos">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/dailyregister" class="nav-link" data-key="t-starter"> Register </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/billing" class="nav-link" data-key="t-starter"> Billing </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/session" class="nav-link" data-key="t-starter"> Register Sessions </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-starter"> Bill History </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#onlineorders" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Online Orders</span>
                        </a>

                        <div class="collapse menu-dropdown" id="onlineorders">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Order Tracker </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Pickup Display </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Order History </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Day Summary </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Logs </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="/owner" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                                data-key="t-dashboard">KDS</span> </a>
                    </li>

                    <li class="nav-item">
                        <a href="/customers" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                                data-key="t-dashboard">Customers</span> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#catalogues" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Catalogue</span>
                        </a>



                        <div class="collapse menu-dropdown" id="catalogues">

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/items" class="nav-link" data-key="t-starter"> Items </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link" data-key="t-starter"> Categories </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/category-timing" class="nav-link" data-key="t-starter"> Category
                                        Timings
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/modifiergroups" class="nav-link" data-key="t-starter"> Modifier Groups
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/taxes" class="nav-link" data-key="t-starter"> Taxes </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/charges" class="nav-link" data-key="t-starter"> Charges </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/discounts" class="nav-link" data-key="t-starter"> Discounts </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Billing Entities </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#rawmaterials" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Raw Materials</span>
                        </a>

                        <div class="collapse menu-dropdown" id="rawmaterials">
                            <ul class="nav nav-sm flex-column">

                                <li class="nav-item">
                                    <a href="/materials" class="nav-link" data-key="t-starter"> Materials </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/intermediates" class="nav-link" data-key="t-starter"> Intermediates
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/raw-categories" class="nav-link" data-key="t-starter"> Categories </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Modifier Groups </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Taxes </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#admin" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Company Admin</span>
                        </a>

                        <div class="collapse menu-dropdown" id="admin">
                            <ul class="nav nav-sm flex-column">


                                <li class="nav-item">
                                    <a href="/settings" class="nav-link" data-key="t-starter"> Settings </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/user-roles" class="nav-link" data-key="t-starter"> User Role </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/employees" class="nav-link" data-key="t-starter"> Employees </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/locations" class="nav-link" data-key="t-starter"> Location </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/brands" class="nav-link" data-key="t-starter"> Brands </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Print Templates </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/owner" class="nav-link" data-key="t-starter"> Integrations </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#posset" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarPages">
                            <i class="bi bi-journal-medical"></i> <span data-key="t-pages">POS Settings</span>
                        </a>

                        <div class="collapse menu-dropdown" id="posset">
                            <ul class="nav nav-sm flex-column">



                                <li class="nav-item">
                                    <a href="/add_floor" class="nav-link" data-key="t-starter"> Add Floor </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a href="/report" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span
                                data-key="t-dashboard">Report</span> </a>
                    </li>

                </ul>
            </div>



            <!-- Sidebar -->
        </div>
        <div class="sidebar-background"></div>
    </div>







    <main class="py-0">
        @yield('ownercontent')
        @extends('layouts.footer')
    </main>