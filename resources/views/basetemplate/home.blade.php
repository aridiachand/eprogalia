@extends('basetemplate.base')
@section('namepage')
    Dashboard
@endsection
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-3">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-comment-account"></i>
                        </h1>
                        <h6 class="text-white">Pemintaan</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-6 col-xlg-3" onclick="window.location({{ route('approval.index') }})">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white">
                            <i class="mdi mdi-briefcase-check"></i>
                        </h1>
                        <h6 class="text-white">Approval</h6>
                    </div>
                </div>
            </div>
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
                            </div>
                        </div>
                        <div class="row">
                            <!-- column -->
                            <div class="col-lg-9">
                                <div class="row">
                                    <div id="placeholder" style="height: 370px"></div>
                                    <p id="choices" class="mt-3"></p>
                                </div>
                            </div>
                            <div class="col-lg-3 mt-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $user }}</h5>
                                            <small class="font-light">User</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-plus fs-3 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $vendor }}</h5>
                                            <small class="font-light">Vendor</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $permintaan }}</h5>
                                            <small class="font-light">Total Permintaan</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">{{ $barang }}</h5>
                                            <small class="font-light">Total Barang</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">0</h5>
                                            <small class="font-light">Pending Pemesanan</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="bg-dark p-10 text-white text-center">
                                            <i class="mdi mdi-web fs-3 mb-1 font-16"></i>
                                            <h5 class="mb-0 mt-1">0</h5>
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
@endsection

@push('styles')
    <!-- Custom CSS -->
    <link href="{{ asset('matrix-admin/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet" />
    <!-- Custom CSS -->
@endpush

@push('scripts')
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
    {{-- <script src="{{ asset('matrix-admin/assets/libs/chart/turning-series.js') }}"></script> --}}
    <script src="{{ asset('matrix-admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('matrix-admin/dist/js/pages/chart/chart-page-init.js') }}"></script>

    <script>
        $(function() {
            var datasets = {
                permintaan: {
                    label: "Permintaan",
                    data: [
                        [2022, 10],
                        [2023, 15],
                    ],
                },
                approve: {
                    label: "Approve",
                    data: [
                        [2022, 5],
                        [2023, 7],
                    ],
                },
            };
            /* var dataSet = [
                {label: "USA", color: "#005CDE" },
                {label: "Russia", color: "#005CDE" },
                { label: "UK", color: "#00A36A" },
                { label: "Germany", color: "#7D0096" },
                { label: "Denmark", color: "#992B00" },
                { label: "Sweden", color: "#DE000F" },
                { label: "Norway", color: "#ED7B00" }
            ];*/
            // hard-code color indices to prevent them from shifting as
            // countries are turned on/off
            var i = 0;
            $.each(datasets, function(key, val) {
                val.color = i;
                ++i;
            });

            // insert checkboxes
            var choiceContainer = $("#choices");
            $.each(datasets, function(key, val) {
                choiceContainer.append(
                    '<input type="checkbox" name="' +
                    key +
                    '" checked="checked" id="id' +
                    key +
                    '">' +
                    '<label for="id' +
                    key +
                    '">' +
                    val.label +
                    "</label>"
                );
            });
            choiceContainer.find("input").click(plotAccordingToChoices);

            function plotAccordingToChoices() {
                var data = [];

                choiceContainer.find("input:checked").each(function() {
                    var key = $(this).attr("name");
                    if (key && datasets[key]) data.push(datasets[key]);
                });

                if (data.length > 0)
                    $.plot($("#placeholder"), data, {
                        yaxis: {
                            min: 0
                        },
                        xaxis: {
                            tickDecimals: 0
                        },
                    });
            }

            plotAccordingToChoices();
        });
    </script>
@endpush
