<!DOCTYPE html>
<html dir="ltr" lang="en">

@includeIf('basetemplate.head')

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @includeIf('basetemplate.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @includeIf('basetemplate.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-receipt"></i>
                                </h1>
                                <h6 class="text-white">Pemintaan</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-receipt"></i>
                                </h1>
                                <h6 class="text-white">Pemintaan</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-receipt"></i>
                                </h1>
                                <h6 class="text-white">Pemintaan</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-receipt"></i>
                                </h1>
                                <h6 class="text-white">Pemintaan</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- ============================================================== -->
                <!-- chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">2540</h5>
                                                    <small class="font-light">Total Permintaan</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-plus fs-3 font-16"></i>
                                                    <h5 class="mb-0 mt-1">120</h5>
                                                    <small class="font-light">Vendor</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">656</h5>
                                                    <small class="font-light">Total Permintaan</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">9540</h5>
                                                    <small class="font-light">Total Pemesanan</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">100</h5>
                                                    <small class="font-light">Pending Pemesanan</small>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                                    <h5 class="mb-0 mt-1">8540</h5>
                                                    <small class="font-light">Online Pemesanan</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by
                <a href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('matrix-admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('matrix-admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('matrix-admin/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="{{ asset('matrix-admin/dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('matrix-admin/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('matrix-admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('matrix-admin/dist/js/pages/chart/chart-page-init.js') }}"></script>
</body>

</html>
