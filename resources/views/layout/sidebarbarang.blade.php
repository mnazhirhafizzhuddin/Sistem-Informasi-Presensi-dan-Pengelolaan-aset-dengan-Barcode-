<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Dashboard Ruangan</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/img/bpjs.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="{{asset('public/demo/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('public/demo/chartist-plugin-tooltip.css')}}">

    <!-- Template -->
    <link rel="stylesheet" href="{{asset('public/graindashboard/css/graindashboard.css')}}">

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="/panel/dashboardadmin">
                    <img class="side-nav-show-on-closed" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard" style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard" style="width: auto; height: 33px;">
                </a>
                <!-- End Logo For Desktop View -->
                <br>
                <br>
                <p style="margin-top: 1rem"> BPJS Kesehatan </p>
            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose" data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Notifications -->
                    <div class="dropdown ml-auto">

                    </div>

                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="sidebar-heading h6">Dashboard</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item {{request()->is ('panel/dashboardadmin') ?'active' : ''}}">
                    <a class="side-nav-menu-link media align-items-center " href="/dashboard/{{$ruanganku->noruangan}}/databarang">
                        <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-dashboard"></i>
              </span>
                        <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->



                <!-- Title -->
                <li class="sidebar-heading h6">Proses</li>
                <!-- End Title -->


                <!-- Users -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUsers">
                        <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-home"></i>
                  </span>
                        <span class="side-nav-fadeout-on-closed media-body">Master Barang</span>
                        <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                 </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Users: subUsers -->
                    <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">

                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="/noruangan/{{$ruanganku->noruangan}}/lihatbarang">Data Barang</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="/dataruangan">Kembali Kehalaman Ruangan</a>
                        </li>
                    </ul>


                    <!-- End Users: subUsers -->
                </li>

            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">

            @yield('contentbarang')
            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center mb-3 mb-lg-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-twitter-alt"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-facebook"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-github"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center text-lg-right">
                        &copy; 2023 BPJS Kesehatan. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>


    <script src="{{asset('public/graindashboard/js/graindashboard.js')}}"></script>
    <script src="{{asset('public/graindashboard/js/graindashboard.vendor.js')}}"></script>

    <!-- DEMO CHARTS -->
    <script src="{{asset('public/demo/resizeSensor.js')}}"></script>
    <script src="{{asset('public/demo/chartist.js')}}"></script>
    <script src="{{asset('public/demo/chartist-pl')}}ugin-tooltip.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-area.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-bar.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-donut.js"></script>
    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
    </script>
</body>

</html>
