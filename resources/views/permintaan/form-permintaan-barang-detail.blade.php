@extends('basetemplate.base')
@section('judul-header')
    Detail Permintaan
@endsection
@section('judul-header-breadcrumb')
    <div class="page-breadcrumb p-0 m-0">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">@yield('namepage')</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a class="text-dark" href="/">Home</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">
                            {{ Str::ucfirst(Request::segment(1)) }}
                        </li>
                        @if (Request::segment(2) != null)
                            <li class="breadcrumb-item text-dark" aria-current="page">
                                {{-- {{ Str::ucfirst(Request::segment(2)) }} --}}
                                Detail Permintaan
                            </li>
                        @endisset
                </ol>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="form-body permintaan-barang-detail">
            {{-- @dd($permintaandetail) --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-5">
                                        <label for="tanggal_permintaan" class="mb-md-0"><span>Tanggal PBJ</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-white"
                                                id="datepicker-autoclose"
                                                value="{{ date('d/m/Y', strtotime($permintaan->tanggal_permintaan)) }}"
                                                disabled readonly />
                                            <div class="input-group-append">
                                                <span class="input-group-text h-100"><i
                                                        class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7">
                                        <label for="no_permintaan" class="mb-md-0"><span>No PBJ</span></label>
                                        <input class="form-control bg-white" type="text" id="no_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="no_permintaan"
                                            value="{{ $permintaan->kode_permintaan }}" readonly>

                                    </div>
                                    {{-- <div class="col-md-1">
                                        <div class="form-button">
                                            <label class="mb-md-0"><span></span></label>
                                            <button id="cekNoPermintaan"
                                                class="btn btn-success xs btn-flat text-white"><i
                                                    class="mdi mdi-pencil"></i>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- @dd($permintaan) --}}
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-4">
                                        <label for="" class="mb-md-0"><span>Tipe Permintaan</span></label>
                                        <select class="form-select select2 form-select shadow-none bg-white" disabled
                                            readonly name="tipe_permintaan" id="tipe_permintaan">
                                            <option selected readonly value="{{ $permintaan->nama_tipe_permintaan }}">
                                                {{ $permintaan->nama_tipe_permintaan }}</option>
                                            {{-- <option value="nonrutin">Non Rutin</option>
                                            <option value="rutin">Rutin</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="mb-md-0"><span>Prioritas
                                                Permintaan</span></label>
                                        <select class="form-select select2 form-select shadow-none bg-white" disabled
                                            readonly name="prioritas" id="prioritas">
                                            <option selected disabled value="">
                                                {{ $permintaan->nama_prioritas_permintaan }}</option>
                                            </option>
                                            {{-- <option value="noncito">Non CITO</option>
                                            <option value="cito">CITO</option> --}}
                                        </select>
                                    </div>

                                    {{-- @dd($kategoriTipe) --}}
                                    <div class="col-md-4">
                                        <label for="" class="mb-md-0"><span>Kategori
                                                Barang</span></label>
                                        <select class="form-select select2 form-select shadow-none" required disabled
                                            name="kategori_barang" id="kategori_barang">
                                            <option selected disabled value="">
                                                {{ $permintaan->nama_kategori_barang }}</option>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pt-0 mt-0">

                                    <div class="col-md-12">
                                        <label for="nama_permintaan" class="mb-md-0"><span>Nama PBJ</span></label>
                                        <input class="form-control bg-white" type="text" id="nama_permintaan"
                                            name="nama_permintaan" disabled readonly
                                            value="{{ $permintaan->nama_permintaan }}">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================================ --}}
                <div class="col-md-5">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="" class="mb-md-0"><span>Keterangan PBJ</span></label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control bg-white" id="keterangan" disabled readonly>{{ $permintaan->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======================== --}}
                <div class="col-md-1 pt-md-2">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                </div>

                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <div class="form-button">
                                            {{-- ini untuk save --}}
                                            <button id="btn-submit" class="btn btn-secondary btn-lg btn-flat text-white"
                                                disabled><i class="mdi mdi-content-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <div class="form-button">

                                            <button id="toGaleriPdf"
                                                class="btn btn-warning btn-lg btn-flat text-white"><i
                                                    class="mdi mdi-paperclip"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <div class="form-button">

                                            <button onclick="print()" id="cekNoPermintaan"
                                                class="btn btn-warning btn-lg btn-flat text-white"><i
                                                    class="mdi mdi-printer"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

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
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            {{-- <form action="" method="post" id="formsubmit">
                                @csrf --}}
                            <input class="form-control" type="text" name="id_user_input" hidden
                                value="{{ Auth::user()->id }}">
                            {{-- <input class="form-control" type="text" id="id_branch" name="id_branch"
                                    hidden value="{{ $idBranch->id_branch }}"> --}}
                            {{-- <input class="form-control" type="text" name="id_department" hidden
                                    value="{{ $idDepartment->id_department }}"> --}}
                            <input class="form-control" type="text" name="deskripsi" id="spbdeskripsi" hidden>
                            <input class="form-control" type="text" name="prioritas" id="prioritas" hidden>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th width="5%" class="text-white fw-bold">No</th>
                                        <th class="text-white fw-bold">Kode barang</th>
                                        <th class="text-white fw-bold">Nama barang</th>
                                        <th width="5%" class="text-white fw-bold">Satuan</th>
                                        <th class="text-white fw-bold">Harga</th>
                                        <th width="5%" class="text-white fw-bold">Qty</th>
                                        <th class="text-white fw-bold">Total</th>
                                        <th class="text-white fw-bold">Ket barang</th>
                                        <th width="8%" class="text-white fw-bold"><i class="fa fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($permintaandetail as $pd)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pd->kode_barang }}</td>
                                            <td>{{ $pd->nama_barang }}</td>
                                            <td>{{ $pd->nama_satuan_barang }}</td>
                                            <td>{{ $pd->harga_beli }}</td>
                                            <td>{{ $pd->jumlah }}</td>
                                            <td>{{ $pd->subtotal }}</td>
                                            <td>{{ $pd->deskripsi }}</td>
                                            <td><button
                                                    onClick="editItemForm(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`, `{{ $pd->harga_beli }}`, `{{ $pd->jumlah }}`, `{{ $pd->id_permintaan }}`)"
                                                    class="btn btn-xs btn-info btn-flat"><i
                                                        class="mdi mdi-lead-pencil"></i></button><button
                                                    onClick="uploadPdfItem(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->id_permintaan }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`)"
                                                    class="btn btn-xs btn-warning btn-flat"><i
                                                        class="mdi mdi-paperclip"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <button class="btn btn-success btn-flat" hidden></button>
                            {{-- </form> --}}
                            {{-- <div class="p-2">
                                <button id="btn-submit" class="btn btn-success btn-flat">Simpan</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('permintaan.galeri-pdf')
    @includeIf('permintaan.galeri-pdf-item')
    @includeIf('permintaan.form-edit-item')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/libs/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/libs/quill/dist/quill.snow.css') }}" />

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
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script> --}}
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

    <script>
        jQuery("#datepicker-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // todayBtn: "linked",
            // language: "it",
        });

        //***********************************//
        // For select 2
        //***********************************//
        // $(".select2").select2();

        $(".select2").select2();
    </script>

    {{-- get data yang sudah upload pbj  --}}
    <script>
        // $(function() {
        $('#toGaleriPdf').click(function() {

            $('#fileexistpreview tbody tr').remove();
            $('#modal-galeri-pdf-item #file').val('');
            $('#filepreview').hide();
            $('.responseMsg').hide();
            // $('#modal-form form')[0].reset();
            let nopermintaan = $("#no_permintaan").val();
            let idpermintaan = $("#no_permintaan").attr("data");

            // console.log(idpermintaan);

            $('#modal-galeri-pdf [name=file]').val('');

            $.get('/upload/' + idpermintaan)
                .done((response) => {
                    console.log(response[0]);
                    if (response.success == 1) {
                        $.each(response[0], function(index, value) {

                            $('#fileexistpreview tbody').append('<tr><td><a target=_blank href="' +
                                value.file_path +
                                '">' + value.nama_file +
                                '</a></td><td>pdf</td></tr>');
                        });
                    }
                })
                .fail((errors) => {
                    console.log(errors);
                    return;
                });
            $('#modal-galeri-pdf').modal('show');
            $('#modal-galeri-pdf .modal-title').text('File Upload');
            $('#modal-galeri-pdf #spb_upload').val(nopermintaan);


        });

        function editItemForm(idpermintaandetail, kodebarang, namabarang, hargabeli, jumlah, idpermintaan) {

            $.get('/cek/barangonproses/' + idpermintaan)
                .done((response) => {
                    if (response == 1) {
                        alert('item sudah dalam proses Approval');
                        return;
                    } else {
                        $('#modal-edit-item').modal('show');
                        $('#modal-edit-item .modal-title').text('Edit Permintaan Barang');

                        // console.log(idpermintaandetail); ke form update
                        $('#modal-edit-item form [name=id_permintaan_detail]').val(idpermintaandetail);
                        $('#modal-edit-item form [name=kode_barang]').val(kodebarang);
                        $('#modal-edit-item [name=nama_barang]').val(namabarang);
                        $('#modal-edit-item [name=harga_beli]').val(hargabeli);
                        $('#modal-edit-item [name=jumlah]').val(jumlah);
                        $('#modal-edit-item [name=total]').val(hargabeli * jumlah);
                    }

                })
                .fail((errors) => {
                    console.log(errors);
                    return;
                });
        }

        function uploadPdfItem(idpermintaandetail, idpermintaan, kodebarang, namabarang) {
            $.get('/cek/barangonproses/' + idpermintaan)
                .done((response) => {
                    if (response == 1) {
                        alert('item sudah dalam proses Approval');
                        return;
                    } else {
                        $('.responseMsg').hide();
                        $('#fileexistpreview tbody tr').remove();
                        $('#modal-galeri-pdf-item #file').val('');
                        $('#filepreview').hide();
                        let nopermintaan = $("#no_permintaan").val();
                        $.get('/upload/' + idpermintaan + '/' + idpermintaandetail)
                            .done((response) => {
                                if (response) {
                                    console.log(response);
                                    // return;
                                    $.each(response, function(index, value) {

                                        $('#fileexistpreview tbody').append(
                                            '<tr><td><a target=_blank href="' +
                                            value.file_path +
                                            '">' + value.nama_file +
                                            '</a></td><td>pdf</td></tr>');
                                    });
                                }
                            })
                            .fail((errors) => {
                                console.log(errors);
                                return;
                            });
                        $('#modal-galeri-pdf-item').modal('show');
                        $('#modal-galeri-pdf-item .modal-title').text(kodebarang);
                        $('#modal-galeri-pdf-item #spb_upload').val(nopermintaan);
                        $('#modal-galeri-pdf-item #kode_barang_upload').val(kodebarang);
                        $('#modal-galeri-pdf-item #nama_barang_upload').val(namabarang);
                        $('#modal-galeri-pdf-item #idpermintaandetail').val(idpermintaandetail);
                    }
                })
                .fail((errors) => {
                    console.log(errors);
                    return;
                });
        }

        $('#modal-edit-item [name=jumlah]').keyup(function() {
            let hargabeli = $('#modal-edit-item [name=harga_beli]').val();
            let jumlah = $(this).val();

            $('#modal-edit-item [name=total]').val(hargabeli * jumlah);
        });
    </script>

    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        $(document).ready(function() {
            $('#modal-galeri-pdf #submit').click(function() {

                var files = $('#file')[0].files;
                var nama_file = $('#nama_file').val();
                var nopermintaan = $('#modal-galeri-pdf #spb_upload').val();
                if (files.length > 0) {
                    var fd = new FormData();

                    // Append data
                    fd.append('file', files[0]);
                    fd.append('nama_file', nama_file);
                    fd.append('nopermintaan', nopermintaan);
                    fd.append('_token', CSRF_TOKEN);

                    // Hide alert
                    $('#responseMsg').hide();

                    // AJAX request
                    $.ajax({
                        url: "{{ route('uploadFile') }}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {

                            // Hide error container
                            $('#err_file').removeClass('d-block');
                            $('#err_file').addClass('d-none');

                            if (response.success == 1) { // Uploaded successfully
                                console.log(response, 1);
                                // $('#fileexistpreview tbody').load();
                                // Response message
                                $('#responseMsg').removeClass("alert-danger");
                                $('#responseMsg').addClass("alert-success");
                                $('#responseMsg').html(response.message);
                                $('#responseMsg').show();

                                $('#fileexistpreview tbody').append(
                                    '<tr><td><a target=_blank href="' +
                                    response.filepath +
                                    '">' + response.filename +
                                    '</a></td><td>pdf</td></tr>');


                                // File preview
                                $('#filepreview').show();
                                $('#filepreview img,#filepreview a').hide();
                                if (response.extension == 'jpg' || response.extension ==
                                    'jpeg' || response.extension == 'png') {

                                    $('#filepreview img').attr('src', response.filepath);
                                    $('#filepreview img').show();
                                } else {
                                    $('#filepreview a').attr('href', response.filepath).show();
                                    $('#filepreview a').text(response.filename);
                                    $('#filepreview a').show();
                                }
                            } else if (response.success == 2) { // File not uploaded
                                console.log(2);

                                // Response message
                                $('#responseMsg').removeClass("alert-success");
                                $('#responseMsg').addClass("alert-danger");
                                $('#responseMsg').html(response.message);
                                $('#responseMsg').show();
                            } else {
                                console.log(response, 3);
                                // Display Error
                                $('#err_file').text(response.error);
                                $('#err_file').removeClass('d-none');
                                $('#err_file').addClass('d-block');
                            }
                        },
                        error: function(response) {
                            console.log("error : " + JSON.stringify(response));
                        }
                    });
                } else {
                    alert("Please select a file.");
                }

            });



            // simpan upload file per item
            $('#modal-galeri-pdf-item #submit').click(function() {

                var files = $('#modal-galeri-pdf-item .file')[0].files;
                var nama_file = $('#modal-galeri-pdf-item .nama_file').val();
                var nopermintaan = $('#modal-galeri-pdf-item .spb_upload').val();
                var idpermintaandetail = $('#modal-galeri-pdf-item .idpermintaandetail').val();

                if (files.length > 0) {
                    var fd = new FormData();
                    // Append data
                    fd.append('file', files[0]);
                    fd.append('nama_file', nama_file);
                    fd.append('nopermintaan', nopermintaan);
                    fd.append('idpermintaandetail', idpermintaandetail);
                    fd.append('_token', CSRF_TOKEN);

                    // Hide alert
                    $('#responseMsg').hide();

                    // AJAX request
                    $.ajax({
                        url: "{{ route('uploadFileItem') }}",
                        method: 'post',
                        data: fd,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            // Hide error container
                            console.log(response, 123);
                            $('#err_file').removeClass('d-block');
                            $('#err_file').addClass('d-none');

                            console.log(response.success);
                            if (response.success == 1) { // Uploaded successfully
                                // $('#fileexistpreview tbody').load();
                                // Response message
                                // console.log(response, 321);
                                $('.responseMsg').removeClass("alert-danger");
                                $('.responseMsg').addClass("alert-success");
                                $('.responseMsg').html(response.message);
                                $('.responseMsg').show();

                                $('#fileexistpreview tbody').append(
                                    '<tr><td><a target=_blank href="' +
                                    response.filepath +
                                    '">' + response.filename +
                                    '</a></td><td>pdf</td></tr>');


                                // File preview
                                $('#filepreview').show();
                                $('#filepreview img,#filepreview a').hide();
                                if (response.extension == 'jpg' || response.extension ==
                                    'jpeg' || response.extension == 'png') {

                                    $('#filepreview img').attr('src', response.filepath);
                                    $('#filepreview img').show();
                                } else {
                                    $('#filepreview a').attr('href', response.filepath).show();
                                    $('#filepreview a').text(response.filename);
                                    $('#filepreview a').show();
                                }
                            } else if (response.success == 2) { // File not uploaded

                                // Response message
                                $('.responseMsg').removeClass("alert-success");
                                $('.responseMsg').addClass("alert-danger");
                                $('.responseMsg').html(response.message);
                                $('.responseMsg').show();
                            } else {
                                // Display Error
                                $('#err_file').text(response.error);
                                $('#err_file').removeClass('d-none');
                                $('#err_file').addClass('d-block');
                            }
                        },
                        error: function(response) {
                            console.log("error : " + JSON.stringify(response));
                        }
                    });
                } else {
                    alert("Please select a file.");
                }

            });



            $('#modal-edit-item').on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('#modal-edit-item form').attr('action'),
                            type: 'put',
                            data: $('#modal-edit-item form').serialize(),
                        })
                        .done((response) => {
                            console.log(response);
                            $('#modal-edit-item').modal('hide');
                            alert(response.message);
                            location.reload();
                            // table.ajax.reload();
                        })
                        .fail((errors) => {
                            console.log(errors);
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            })
        });
    </script>
@endpush
