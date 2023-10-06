<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/css/main.css" />
        <title>@yield('title')</title>

    </head>
    <body>
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            TheMarketMonitor
        </div>

        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <!-- <img src="images/profile.jpg" alt="" class="profile" /> -->
        </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title"></div>
                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                <!-- start -->
                <li class="item">
                    <div href="#" class="nav_link submenu_item">
                        <span class="navlink_icon">
                            <i class="bx bx-home-alt"></i>
                        </span>
                        <span class="navlink">Home</span>
                    </div>
                </li>
                <!-- end -->

                <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
                <!-- start -->
                <!-- <li class="item">
                  <div href="#" class="nav_link submenu_item">
                    <span class="navlink_icon">
                      <i class="bx bx-grid-alt"></i>
                    </span>
                    <span class="navlink">Overview</span>
                    <i class="bx bx-chevron-right arrow-left"></i>
                  </div>

                  <ul class="menu_items submenu">
                    <a href="#" class="nav_link sublink">Nav Sub Link</a>
                    <a href="#" class="nav_link sublink">Nav Sub Link</a>
                    <a href="#" class="nav_link sublink">Nav Sub Link</a>
                    <a href="#" class="nav_link sublink">Nav Sub Link</a>
                  </ul>
                </li> -->
                <!-- end -->

                <!--<ul class="menu_items"> -->
                <!-- <div class="menu_title"></div> -->
                <!-- duplicate these li tag if you want to add or remove navlink only -->
                <!-- Start -->
                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-loader-circle"></i>
                        </span>
                        <span class="navlink">Ranking</span>
                    </a>
                </li>
                <!-- End -->

                <li class="item">
                    <a href="#" class="nav_link">
                        <span class="navlink_icon">
                            <i class="bx bx-loader-circle"></i>
                        </span>
                        <span class="navlink">Faturamento</span>
                    </a>
                </li>


                <!-- Sidebar Open / Close -->
                <div class="bottom_content">
                    <div class="bottom expand_sidebar">
                        <span> Expand</span>
                        <i class='bx bx-log-in' ></i>
                    </div>
                    <div class="bottom collapse_sidebar">
                        <span> Collapse</span>
                        <i class='bx bx-log-out'></i>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Content Section (Not competing with the sidebar) -->
    <div class="content">
        @yield('content')
    </div>
    <script src="/js/main.js"></script>
    </body>
</html>
