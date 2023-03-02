<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/libs/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('matrix-admin/assets/libs/quill/dist/quill.snow.css') }}" />

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 36px;
            top: 20px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #2ab934;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 6px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 34px;
            width: 32px;
            top: 1px;
            left: 1px;
            right: 1px;
            bottom: 1px;
            background-color: white;
            transition: 0.4s;
            border-radius: 6px;
        }

        input:checked+.slider {
            background-color: #ca2222;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(55px);
        }

        .slider:after {
            content: 'Non CITO';
            color: white;
            display: block;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 65%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
        }

        input:checked+.slider:after {
            content: 'CITO';
            left: 30%;
        }

        .select2-selection__arrow {
            display: none;
        }

        /* =============file upload  */

        .displaynone {
            display: none;
        }

        #zero_config_penetapan td {
            max-width: 100% !important;
            width: 100% !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="form-body">
            {{-- @dd($permintaandetail) --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                <div class="form-group row">
                                    <div class="logo-icon ps-2">
                                        <img src="{{ asset('img/logo-icon.png') }}" alt="homepage" class="light-logo"
                                            width="110">
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <table id="zero_config_penetapan">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    SURAT PENETAPAN
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    PANITIA PENGADAAN BARANG DAN JASA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {nama rumah sakit}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    No. {nomer}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div>
                                        <p>Berdasarkan langkah - langkah yang telah diambil oleh Panitia Pengadaan
                                            melalui</p>
                                        <p>Seleksi Sederhana: <b>{nama pbj}</b> di {nama RS}</p>
                                        <p>efektif {tanggal approve terakhir}, dengan ini kami menunjuk kepada
                                            <b>{Vendor yg terpilih}</b>
                                        </p>

                                        <p>Untuk proses selanjutnya, akan diteruskan dengan penyerahan <i>Purchase
                                                Order</i>["PO"]</p>
                                        <p>dengan ruang lingkup pekerjaan sebagaimana terlampir dalam surat</p>
                                        <p>penawaran harga tanggal {tgl quotation}.</p>

                                        <p>Demikian surat penetapan ini dibuat untuk dapat dipergunakan sebagaimana
                                            mestinya.</p>

                                        <p>Jakarta,{tgl cetak}</p>
                                        <p>{Branch sesuai yg melakukan approve}</p>

                                        <p>{nama pengapprove}</p>
                                        <p>{posisi}</p>


                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <center>
                        <h4>SURAT PENETAPAN PANITIA PENGADAAN BARANG DAN JASA</h4>
                        <h5><a target="_blank" href="">test</a>
                        </h5>
                    </center>
                    <h3>SURAT PENETAPAN<br>
                        PANITIA PENGADAAN BARANG DAN JASA<br>
                        {nama rumah sakit}
                    </h3>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Isi panel kepala</b>
                        </div>
                        <div class="panel-body">
                            <p>Isi panel body</p>
                        </div>
                        <div class="panel-footer">
                            <b>Isi panel footer</b>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <a href="http://"></a> --}}
    <!-- ============================================================== -->
    <!-- chart -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <button class="btn btn-lg btn-info btn-flat col-md-2"><i
                                class="mdi mdi-swap-horizontal text-white fw-normal"><span class="fst-normal">
                                    Split</span></i>
                        </button> --}}
                <div class="card-body p-0 m-0">

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    </div>
</body>


<!-- jQuery -->
<script src="{{ asset('matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Validator -->
<script src="{{ asset('js/validator.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('matrix-admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('matrix-admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('matrix-admin/dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('matrix-admin/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('matrix-admin/dist/js/custom.min.js') }}"></script>
<!-- this page js -->
<script src="{{ asset('matrix-admin/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('matrix-admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
</script>

</html>
