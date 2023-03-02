@extends('basetemplate.base')
@section('judul-header')
    Pemilihan vendor
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
                                Pemilihan Vendor..
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
        <div class="form-body">
            {{-- @dd($permintaandetail) --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                {{-- <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="no_permintaan" class="mb-md-1"><span class="h6">No
                                                PBJ</span></label>
                                        <input class="bg-white form-control" type="text" id="no_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="no_permintaan"
                                            value="{{ $permintaandetail[0]->kode_permintaan . '#' . $permintaandetail[0]->split }}"
                                            readonly>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="nama_permintaan" class="mb-md-0"><span class="h6">Nama
                                                PBJ</span></label>
                                        <input class="bg-white form-control" type="text" id="nama_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="nama_permintaan"
                                            value="{{ $permintaan->nama_permintaan }}" readonly>
                                    </div>
                                </div> --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="no_permintaan" class="mb-md-1"><span class="h6">No
                                                PBJ</span></label>
                                        <input class="bg-white form-control" type="text" id="no_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="no_permintaan"
                                            value="{{ $permintaandetail[0]->kode_permintaan . '#' . $permintaandetail[0]->split }}"
                                            readonly>

                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <label for="nama_permintaan" class="mb-md-0"><span class="h6">Nama
                                                PBJ</span></label>
                                        <input class="bg-white form-control" type="text" id="nama_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="nama_permintaan"
                                            value="{{ $permintaan->nama_permintaan }}" readonly>

                                    </div>
                                    <div class="col-md-12 mt-md-3">
                                        <label for="nama_permintaan" class="mb-md-0"><span class="h6">Tanggal
                                                PBJ</span></label>
                                        <input class="bg-white form-control" type="text" id="nama_permintaan"
                                            data="{{ $permintaan->id_permintaan }}" name="nama_permintaan"
                                            value="{{ Carbon\Carbon::parse($permintaan->tanggal_permintaan)->format('d/m/Y') }}"
                                            readonly>

                                    </div>

                                </div>
                                {{-- @dd($permintaan) --}}
                                {{-- ================================================================================== --}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ================================ --}}
                <div class="col-md-8">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="" class="mb-md-1"><span class="h6">Ket
                                                PBJ</span></label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control bg-white" id="keterangan" disabled readonly>{{ $permintaan->deskripsi }}</textarea>
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
                    {{-- <button class="btn btn-lg btn-info btn-flat col-md-2"><i
                            class="mdi mdi-swap-horizontal text-white fw-normal"><span class="fst-normal">
                                Split</span></i>
                    </button> --}}
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <input class="form-control" type="text" name="id_user_input" hidden
                                value="{{ Auth::user()->id }}">
                            <input class="form-control" type="text" name="deskripsi" id="spbdeskripsi" hidden>
                            <input class="form-control" type="text" name="prioritas" id="prioritas" hidden>
                            <table id="zero_config" class="table table-bordered">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th width="5%" class="text-white fw-bold">No</th>
                                        <th class="text-white fw-bold">Kode barang</th>
                                        <th class="text-white fw-bold">Nama barang</th>
                                        <th width="10%" class="text-white fw-bold">Satuan</th>
                                        <th width="10%" class="text-white fw-bold">Harga</th>
                                        <th width="10%" class="text-white fw-bold">Qty</th>
                                        <th class="text-white fw-bold">Total</th>
                                        <th class="text-white fw-bold">Keterangan</th>
                                        {{-- <th width="10%" class="text-white fw-bold"><i class="fa fa-cog"></i> --}}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($permintaandetail as $pd)
                                        <tr class="{{ $pd->kode_barang }}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pd->kode_barang }}</td>
                                            <td>{{ $pd->nama_barang }}</td>
                                            <td>{{ $pd->nama_satuan_barang }}</td>
                                            <td>{{ format_uang($pd->harga_beli) }}</td>
                                            <td>{{ $pd->jumlah }}</td>
                                            <td>{{ format_uang($pd->subtotal) }}</td>
                                            <td>{{ $pd->deskripsi }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="100%"></td>
                                </tr>

                            </table>
                            <button class="btn btn-success btn-flat" hidden></button>
                            {{-- </form> --}}
                            {{-- @if ($pemilihanvendor->count() > 0) --}}
                            <div class="p-2">
                                <button
                                    onclick="pilihVendorItem(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->id_permintaan }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`)"
                                    id="saveAddVendor" class="btn btn-lg btn-success btn-flat col-md-2">Cari
                                    Vendor
                                </button>
                            </div>
                            {{-- @endif --}}
                        </div>
                    </div>


                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <input class="form-control" type="text" name="id_user_input" hidden
                                value="{{ Auth::user()->id }}">
                            <input class="form-control" type="text" name="deskripsi" id="spbdeskripsi" hidden>
                            <input class="form-control" type="text" name="prioritas" id="prioritas" hidden>
                            <table id="zero_config" class="table table-bordered">
                                <thead class="bg-secondary">

                                    {{-- @if (count($permintaandetail) > 0) --}}
                                    {{-- @dd($listvendor); --}}
                                    @if ($pemilihanvendor)
                                        <tr class="mb-2" style="background:#37bcff;">
                                            <th class="text-white py-4">No</th>
                                            <th class="text-white py-4">Nama Barang</th>
                                            <th class="text-white py-4">Kode Barang</th>
                                            @php
                                                $grup = [];
                                                $recordsKeyedByVendor = [];
                                            @endphp
                                            @foreach ($listvendor as $lv)
                                                <th class="text-white py-4">{{ $lv->nama_vendor }}</th>
                                                @php
                                                    // $recordsKeyedByVendor[$lv->nama_vendor][$lv->harga_beli] = $record->totalpricewithtax;
                                                    $recordsKeyedByVendor[$lv->id_vendor] = ['kode_barang'=>$lv->kode_barang,'nama_vendor'=>$lv->nama_vendor,'harga_beli'=>$lv->nilai_harga];
                                                    $grup = $lv->id_vendor;
                                                @endphp
                                            @endforeach

                                            {{-- @dd($recordsKeyedByVendor, $listvendor,$listbarang) --}}
                                        </tr>
                                    @endif
                                </thead>
                                {{-- @dd($listbarang); --}}
                                {{-- @dd($listvendor); --}}


                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($listbarang as $pv)
                                    @if ($grup == $pv->id_vendor)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{$pv->nama_barang}}</td>
                                        <td>{{$pv->kode_barang}}</td>
                                        @foreach ($listbarang as $lbr)
                                        @if ($pv->kode_barang == $lbr->kode_barang)
                                        <td>{{$lbr->harga_beli}}</td>
                                        <td>{{$lbr->nilai_harga}}</td>
                                        {{-- @break --}}
                                        @endif
                                        @endforeach

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>

                                <tr>
                                    <td colspan="100%"></td>
                                </tr>

                            </table>

                           {{-- BACKUP LOOPING  --}}
                           {{-- <tbody>
                            <?php $no = 1; ?>
                            @foreach ($listbarang as $pv)
                            @if ($grup == $pv->id_vendor)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$pv->nama_barang}}</td>
                                <td>{{$pv->kode_barang}}</td>
                                @foreach ($listbarang as $lbr)
                                @if ($pv->kode_barang == $lbr->kode_barang)
                                <td>{{$lbr->harga_beli}}</td>
                                <td>{{$lbr->nilai_harga}}</td>

                                @endif
                                @endforeach

                            </tr>
                            @endif
                            @endforeach
                        </tbody> --}}
                           {{-- END BACKUP LOOPING  --}}
                            <button class="btn btn-success btn-flat" hidden></button>
                            @if ($pemilihanvendor->count() > 0)
                                <div class="p-2">
                                    <button onclick="alert('berhasil di simpan')" id="saveAddVendor"
                                        class="btn btn-lg btn-success btn-flat col-md-2"><i
                                            class="mdi mdi-content-save text-white fw-normal"><span
                                                class="fst-normal">
                                            </span></i>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- @dd($permintaandetail) --}}
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('pemilihan-approval.form')
    {{-- @includeIf('pemilihan-approval.note-pemilihan-vendor')
    @includeIf('pemilihan-approval.list-note-pemilihan-vendor')
    @includeIf('permintaan.galeri-pdf-item')
    @includeIf('permintaan.form-edit-item') --}}
    {{-- @includeIf('pemilihan-approval.form-split') --}}
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

        $(".select2").select2();
    </script>

    <script>
        $('#saveAddVendor').on('click', function(e) {
            if (!e.preventDefault()) {

                $("#modal-split #zero_config tbody").empty();
                var currentRow = $('#zero_config tr');
                // console.log(currentRow);
                var checked = [];
                var kode_barang = [];
                var nama_barang = [];
                var satuan = [];
                var harga = [];
                var jumlah = [];
                var total = [];
                var keterangan = [];

                $('#modal-split').modal('show');
                $('#modal-split .modal-title').text($("#no_permintaan").val());

                let tablesplit = $("#modal-split table tbody:last-child");

                currentRow.find(".checked_id_produk:checked").each(function() {
                    checked.push($(this).val());
                    kode_barang.push($(this).closest('td').next('td').text());
                    nama_barang.push($(this).closest('td').next('td').next('td').text());
                    satuan.push($(this).closest('td').next('td').next('td').next('td').text());
                    harga.push($(this).closest('td').next('td').next('td').next('td').next('td')
                        .text());
                    jumlah.push($(this).closest('td').next('td').next('td').next('td').next('td').next(
                        'td').text());
                    total.push($(this).closest('td').next('td').next('td').next('td').next('td').next(
                        'td').next('td').text());
                    keterangan.push($(this).closest('td').next('td').next('td').next('td').text());
                });

                let len = $('input:checked').length;
                for (var i = 0; i < len; i++) {
                    var no = i + 1;
                    var id_permintaan_detail = checked[i];
                    var kode_barang_ = kode_barang[i];
                    var nama_barang_ = nama_barang[i];
                    var satuan_ = satuan[i];
                    var harga_ = harga[i];
                    var jumlah_ = jumlah[i];
                    var total_ = total[i];
                    var keterangan_ = keterangan[i];
                    var tr_str = "<tr>" +
                        "<td>" + no + "</td>" +
                        "<td hidden>" + id_permintaan_detail + "</td>" +
                        "<td>" + kode_barang_ + "</td>" +
                        "<td>" + nama_barang_ + "</td>" +
                        "<td>" + satuan_ + "</td>" +
                        "<td>" + harga_ + "</td>" +
                        "<td>" + jumlah_ + "</td>" +
                        "<td>" + total_ + "</td>" +
                        "<td>" + keterangan_ + "</td>" +
                        "</tr>";
                    $("#modal-split #zero_config tbody").append(tr_str);

                }
            }
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

            console.log(idpermintaan, idpermintaandetail);
            $('#fileexistpreview tbody tr').remove();
            let nopermintaan = $("#no_permintaan").val();
            $.get('/upload/' + idpermintaan + '/' + idpermintaandetail)
                .done((response) => {
                    if (response) {
                        console.log(response);
                        // return;
                        $.each(response, function(index, value) {

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
            $('#modal-galeri-pdf-item').modal('show');
            $('#modal-galeri-pdf-item .modal-title').text(kodebarang);
            $('#modal-galeri-pdf-item #spb_upload').val(nopermintaan);
            $('#modal-galeri-pdf-item #kode_barang_upload').val(kodebarang);
            $('#modal-galeri-pdf-item #nama_barang_upload').val(namabarang);
            $('#modal-galeri-pdf-item #idpermintaandetail').val(idpermintaandetail);
        }


        function pilihVendorItem(idpermintaandetail, idpermintaan, kodebarang, namabarang) {
            console.log(idpermintaan, idpermintaandetail, kodebarang, namabarang);
            // $('#fileexistpreview tbody tr').remove();
            // let nopermintaan = $("#no_permintaan").val();
            // $.get('/upload/' + idpermintaan + '/' + idpermintaandetail)
            //     .done((response) => {
            //         if (response) {
            //             console.log(response);
            //             // return;
            //             $.each(response, function(index, value) {

            //                 $('#fileexistpreview tbody').append('<tr><td><a target=_blank href="' +
            //                     value.file_path +
            //                     '">' + value.nama_file +
            //                     '</a></td><td>pdf</td></tr>');
            //             });
            //         }
            //     })
            //     .fail((errors) => {
            //         console.log(errors);
            //         return;
            //     });
            $('#modal-pilih-vendor').modal('show');
            $('#modal-pilih-vendor .modal-title').text(kodebarang);

            $('#modal-pilih-vendor [name="id_permintaan"]').val(idpermintaan);
            $('#modal-pilih-vendor [name="id_permintaan_detail"]').val(idpermintaandetail);
            $('#modal-pilih-vendor [name="kode_barang"]').val(kodebarang);
            $('#modal-pilih-vendor [name="nama_barang"]').val(namabarang);
            // $('#modal-galeri-pdf-item #kode_barang_upload').val(kodebarang);
            // $('#modal-galeri-pdf-item #nama_barang_upload').val(namabarang);
            // $('#modal-galeri-pdf-item #idpermintaandetail').val(idpermintaandetail);
        }

        // simpan
        $('#modal-pilih-vendor').on('submit', function(e) {
            if (!e.preventDefault()) {
                var currentRow = $('#modal-pilih-vendor tbody tr');

                // alert(currentRow.find("[name=harga_beli]").val());
                // alert(currentRow.find("[name=jumlah]").val());
                // alert(currentRow.find("[name=subtotal]").val());

                var kode_barang = [];
                var nama_barang = [];
                var nilai_harga = [];
                var jumlah = [];
                var subtotal = [];

                // currentRow.find(".datakodebarang").each(function() {
                //     kode_barang.push($(this).val());
                // });





                var files = $('#modal-pilih-vendor [name="file"]')[0].files;
                // var nama_file = $('#modal-pilih-vendor [name="nama_file"]').val();
                var id_vendor = $('#modal-pilih-vendor [name="id_vendor"]').val();
                // var kode_barang = $('#modal-pilih-vendor [name="kode_barang"]').val();
                // var nama_barang = $('#modal-pilih-vendor [name="nama_barang"]').val();

                var nama_vendor = $('#id_vendor option:selected').data('nama');
                var down_payment = $('#modal-pilih-vendor [name="dp"]').val();
                var token = $("meta[name='csrf-token']").attr("content");

                var kode_permintaan = $('#no_permintaan').val();
                var id_permintaan = $('#modal-pilih-vendor [name="id_permintaan"]').val();
                var id_permintaan_detail = $('#modal-pilih-vendor [name="id_permintaan_detail"]').val();

                // console.log(files[0]);
                // return;
                // let ini = $('#modal-pilih-vendor .modal-title').text();
                // $('.' + ini).after('<tr><td>Vendor</td><td>' + nama + '</td></tr>');
                // alert(nilai_harga);

                if (files.length > 0) {

                    var fd = new FormData();
                    // Append data
                    // var jumlahrow = currentRow.length-1;
                // for (i=0; i< jumlahrow; i++){
                    fd.append('file', files[0]);
                    // fd.append('nama_file', nama_file);
                    fd.append('kode_permintaan', kode_permintaan);
                    fd.append('id_permintaan', id_permintaan);
                    fd.append('id_permintaan_detail', id_permintaan_detail);
                    fd.append('id_vendor', id_vendor);
                    fd.append('nama_vendor', nama_vendor);
                    fd.append('down_payment', down_payment);

                    // fd.append(kode_barang, JSON.stringify(kode_barang));
                    // fd.append('nama_barang', JSON.stringify(nama_barang));
                    // fd.append('nilai_harga', JSON.stringify(nilai_harga));
                    // fd.append('jumlah', JSON.stringify(jumlah));
                    // fd.append('subtotal', JSON.stringify(subtotal));

                    fd.append('_token', token);
                // }
                currentRow.find(".datakodebarang").each(function() {
                    fd.append("kode_barang[]",$(this).val());
                });

                currentRow.find(".datanamabarang").each(function() {
                    fd.append("nama_barang[]",$(this).val());
                });

                currentRow.find(".datahargabeli").each(function() {
                    // nilai_harga.push($(this).val().split('.').join(""));
                    fd.append("nilai_harga[]",$(this).val().split('.').join(""));

                });

                currentRow.find(".datajumlah").each(function() {
                    fd.append("jumlah[]",$(this).val());
                });

                currentRow.find(".datasubtotal").each(function() {
                    fd.append("subtotal[]",$(this).val().split('.').join(""));
                });

                    // console.log(fd);
                    // Hide alert
                    $('#responseMsg').hide();


                    $.ajax({
                        url: "{{ route('pemilihan-approval.store') }}",
                        method: 'post',
                        data:fd,
                        // data: $('#modal-pilih-vendor form').serialize(),
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            // Hide error container
                            $('#err_file').text(response.message);
                            $('#err_file').removeClass('d-block');
                            $('#err_file').addClass('d-none');

                            if (response.success == 1) { // Uploaded successfully
                                console.log(response.success);
                                alert('data berhasil di simpan');
                                location.reload();

                                // Response message
                                // $('#responseMsg').removeClass("alert-danger");
                                // $('#responseMsg').addClass("alert-success");
                                // $('#responseMsg').html(response.message);
                                // $('#responseMsg').show();

                                // $('#fileexistpreview tbody').append(
                                //     '<tr><td><a target=_blank href="' +
                                //     response.filepath +
                                //     '">' + response.filename +
                                //     '</a></td><td>pdf</td></tr>');


                                // File preview
                                // $('#filepreview').show();
                                // $('#filepreview img,#filepreview a').hide();
                                // if (response.extension == 'jpg' || response.extension ==
                                //     'jpeg' || response.extension == 'png') {

                                //     $('#filepreview img').attr('src', response.filepath);
                                //     $('#filepreview img').show();
                                // } else {
                                //     $('#filepreview a').attr('href', response.filepath).show();
                                //     $('#filepreview a').text(response.filename);
                                //     $('#filepreview a').show();
                                // }
                            } else if (response.success == 2) { // File not uploaded
                                console.log(response.success, 2);
                                // Response message
                                // $('#responseMsg').removeClass("alert-success");
                                // $('#responseMsg').addClass("alert-danger");
                                // $('#responseMsg').html(response.message);
                                // $('#responseMsg').show();
                            } else {
                                // Display Error
                                // console.log(response);
                                $('#err_file').text(response.message);
                                $('#err_file').removeClass('d-none');
                                $('#err_file').addClass('d-block');
                            }
                        },
                        error: function(response) {
                            console.log("error : " + JSON.stringify(response));
                        }
                    });
                }
            }
        });

        $('#modal-edit-item [name=jumlah]').keyup(function() {
            let hargabeli = $('#modal-edit-item [name=harga_beli]').val();
            let jumlah = $(this).val();

            $('#modal-edit-item [name=total]').val(hargabeli * jumlah);
        });


        function addNoteApprove() {
            $('#modal-note-pemilihan-vendor').modal('show');
            $('#modal-note-pemilihan-vendor .notes').focus();
            alert(123);
        };

        function allNoteApprove() {
            $('#modal-list-note-pemilihan-vendor').modal('show');
        };
    </script>

    <script>
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        $(document).ready(function() {
            $("#modal-split").submit(function(e) {
                if (!e.preventDefault()) {
                    var currentRow = $('#modal-split tr');
                    if (currentRow) {
                        var id_permintaan_detail = [];
                        var kode_permintaan = $("#modal-split .modal-title").text();

                        currentRow.find("td:eq(1)").each(function() {
                            id_permintaan_detail.push($(this).text());
                        });

                        $.ajax({
                            url: '{{ route('save.split') }}',
                            type: "POST",
                            cache: false,
                            data: {
                                "id_permintaan_detail": id_permintaan_detail,
                                "kode_permintaan": kode_permintaan,
                                "_token": CSRF_TOKEN,
                            },
                            success: function(response) {
                                console.log(response);
                                $("#modal-split").modal('hide');
                                alert('split berhasil');
                                location.reload();
                            },
                            error: function(error) {
                                console.log(error, 1);
                                alert(error.message);
                            }
                        });
                    }


                }
            });
        });
    </script>
@endpush
