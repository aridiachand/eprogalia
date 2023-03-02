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
                                Pemilihan Vendor
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
                                            {{-- <td>
                                                <button
                                                    onClick="pilihVendorItem(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->id_permintaan }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`)"
                                                    class="btn btn-xs btn-flat"><i
                                                        class="mdi mdi-truck-delivery text-dark fw-bold"
                                                        style="font-size: 14px;"></i>
                                                </button>
                                                <button
                                                    onClick="addNoteApprove(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->id_permintaan }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`)"
                                                    class="btn btn-xs btn-flat"><i
                                                        class="mdi mdi-comment-plus-outline text-dark fw-bold"
                                                        style="font-size: 14px;"></i>
                                                </button>
                                            </td> --}}
                                        </tr>

                                        {{-- @dd(count($pemilihanvendor)); --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- @dd($pemilihanvendor); --}}
                        {{-- TXP GMH FAT MD PRSD OWNER --}}
                        <table id="zero_config_vendor" class="table table-bordered">
                            @if (count($permintaandetail) > 0)
                                <thead class="bg-secondary">

                                    <tr class="mb-2" style="background:#37bcff;">
                                        <th class="text-white py-4">#</th>
                                        <th class="text-white py-4">Vendor</th>
                                        <th width="5%" class="text-white py-4">Attachment</th>
                                        <th class="text-white py-4">Nilai (Rp)</th>
                                        <th width="8%" class="text-white py-4">DP (%)</th>

                                        @if (Auth::user()->level > 4 or Auth::user()->level == 0)
                                            <th class="bg-success text-white" width="8%" class="text-white">
                                                TXP</th>

                                            @if (Auth::user()->level > 5)
                                                <th class="bg-success text-white" width="8%" class="text-white">
                                                    GMH
                                                </th>
                                                @if (Auth::user()->level > 6)
                                                    <th class="bg-success text-white" width="8%"
                                                        class="text-white">
                                                        FAT
                                                    </th>
                                                    @if (Auth::user()->level > 7)
                                                        <th class="bg-success text-white" width="8%"
                                                            class="text-white">
                                                            MD
                                                        </th>
                                                        @if (Auth::user()->level > 8)
                                                            <th class="bg-success text-white" width="8%"
                                                                class="text-white">
                                                                PRSD
                                                            </th>
                                                            @if (Auth::user()->level > 9 or Auth::user()->level == 0)
                                                                <th class="bg-success text-white" width="8%"
                                                                    class="text-white">
                                                                    OWNER
                                                                </th>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @dd($pemilihanvendor); --}}
                                    @foreach ($pemilihanvendor as $pv)
                                        <tr>
                                            <td><i class="mdi mdi-arrow-right-drop-circle-outline"></i></td>
                                            <td>{{ $pv->nama_vendor }}</td>
                                            <td><a href="{{ $pv->file_path }}" target="_blank">view</a></td>
                                            <td>{{ format_uang($pv->nilai_harga) }}</td>
                                            <td>{{ $pv->down_payment }}</td>
                                            {{-- <td>{{ $pv->selected_technical_expert == 1 ? 'checked' : 'gak' }}</td> --}}
                                            @if (Auth::user()->level > 4 or Auth::user()->level == 0)
                                                <td>
                                                    <div class="row">
                                                        <label class="customcheckbox col-3 mx-2">
                                                            <input autocomplete="off" type="radio"
                                                                class="checked_vendor" name="checked_txp"
                                                                value=""
                                                                {{ $pv->selected_technical_expert == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        @if ($pv->selected_technical_expert == 1)
                                                            <?php $btn = 'btn-success'; ?>
                                                        @elseif ($pv->selected_technical_expert == 3)
                                                            <?php $btn = 'btn-warning'; ?>
                                                        @else
                                                            <?php $btn = 'btn-secondary'; ?>
                                                        @endif
                                                        <button
                                                            onclick="viewNote(`{{ $pv->id }}`, 'selected_technical_expert','Technical Expert')"
                                                            class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                @if (Auth::user()->level > 5)
                                                    @if ($pv->selected_gm_ho == 1)
                                                        <?php $btn = 'btn-success'; ?>
                                                    @elseif ($pv->selected_gm_ho == 3)
                                                        <?php $btn = 'btn-warning'; ?>
                                                    @else
                                                        <?php $btn = 'btn-secondary'; ?>
                                                    @endif
                                                    <td>
                                                        <div class="row">
                                                            <label class="customcheckbox col-3 mx-2">
                                                                <input autocomplete="off" type="radio"
                                                                    class="checked_vendor" name="checked_gmh"
                                                                    value=""
                                                                    {{ $pv->selected_gm_ho == 1 ? 'checked' : '' }}
                                                                    disabled>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <button
                                                                onclick="viewNote(`{{ $pv->id }}`, 'selected_gm_ho','General Manager HO')"
                                                                class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                    class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    @if (Auth::user()->level > 6)
                                                        @if ($pv->selected_gm_fat == 1)
                                                            <?php $btn = 'btn-success'; ?>
                                                        @elseif ($pv->selected_gm_fat == 3)
                                                            <?php $btn = 'btn-warning'; ?>
                                                        @else
                                                            <?php $btn = 'btn-secondary'; ?>
                                                        @endif
                                                        <td>
                                                            <div class="row">
                                                                <label class="customcheckbox col-3 mx-2">
                                                                    <input autocomplete="off" type="radio"
                                                                        class="checked_vendor" name="checked_fat"
                                                                        value=""
                                                                        {{ $pv->selected_gm_fat == 1 ? 'checked' : '' }}
                                                                        disabled>
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                                <button
                                                                    onclick="viewNote(`{{ $pv->id }}`, 'selected_gm_fat','General Manager Finance Accounting & Tax')"
                                                                    class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                        class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        @if (Auth::user()->level > 7)
                                                            @if ($pv->selected_md == 1)
                                                                <?php $btn = 'btn-success'; ?>
                                                            @elseif ($pv->selected_md == 3)
                                                                <?php $btn = 'btn-warning'; ?>
                                                            @else
                                                                <?php $btn = 'btn-secondary'; ?>
                                                            @endif
                                                            <td>
                                                                <div class="row">
                                                                    <label class="customcheckbox col-3 mx-2">
                                                                        <input autocomplete="off" type="radio"
                                                                            class="checked_vendor" name="checked_md"
                                                                            value=""
                                                                            {{ $pv->selected_md == 1 ? 'checked' : '' }}
                                                                            disabled>
                                                                        <span class="checkmark"></span>
                                                                    </label>
                                                                    <button
                                                                        onclick="viewNote(`{{ $pv->id }}`, 'selected_md','Managing Director')"
                                                                        class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                            class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            @if (Auth::user()->level > 8)
                                                                @if ($pv->selected_presdir == 1)
                                                                    <?php $btn = 'btn-success'; ?>
                                                                @elseif ($pv->selected_presdir == 3)
                                                                    <?php $btn = 'btn-warning'; ?>
                                                                @else
                                                                    <?php $btn = 'btn-secondary'; ?>
                                                                @endif
                                                                <td>
                                                                    <div class="row">
                                                                        <label class="customcheckbox col-3 mx-2">
                                                                            <input autocomplete="off" type="radio"
                                                                                class="checked_vendor"
                                                                                name="checked_presdir" value=""
                                                                                {{ $pv->selected_presdir == 1 ? 'checked' : '' }}
                                                                                disabled>
                                                                            <span class="checkmark"></span>
                                                                        </label>
                                                                        <button
                                                                            onclick="viewNote(`{{ $pv->id }}`, 'selected_presdir','President Director')"
                                                                            class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                                class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                                @if (Auth::user()->level > 9)
                                                                    @if ($pv->selected_owner == 1)
                                                                        <?php $btn = 'btn-success'; ?>
                                                                    @elseif ($pv->selected_owner == 3)
                                                                        <?php $btn = 'btn-warning'; ?>
                                                                    @else
                                                                        <?php $btn = 'btn-secondary'; ?>
                                                                    @endif
                                                                    <td>
                                                                        <div class="row">
                                                                            <label class="customcheckbox col-3 mx-2">
                                                                                <input autocomplete="off"
                                                                                    type="radio"
                                                                                    class="checked_vendor"
                                                                                    name="checked_owner"
                                                                                    value=""
                                                                                    {{ $pv->selected_owner == 1 ? 'checked' : '' }}
                                                                                    disabled>
                                                                                <span class="checkmark"></span>
                                                                            </label>
                                                                            <button
                                                                                onclick="viewNote(`{{ $pv->id }}`, 'selected_owner','Owner Of Company')"
                                                                                class="btn {{ $btn }} btn-xs btn-flat col-4"><i
                                                                                    class="mdi mdi-comment-plus-outline text-white fw-bold"></i>
                                                                            </button>
                                                                        </div>
                                                                    </td>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                            @if (Auth::user()->level != 0)
                                                @for ($i = Auth::user()->level; $i < 11; $i++)
                                                    <td>
                                                        <div class="row">
                                                            <label class="customcheckbox col-3 mx-2">
                                                            </label>
                                                        </div>
                                                    </td>
                                                @endfor
                                            @endif

                                        </tr>
                                        {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        <button
                            class="btn
                                                            btn-success btn-flat"
                            hidden></button>
                        {{-- </form> --}}
                        @if ($pemilihanvendor->count() > 0)
                            <div class="p-2">
                                <button onclick="managementProceed()"
                                    class="btn btn-lg btn-success btn-flat col-md-2"><i
                                        class="mdi mdi-play text-white fw-normal"><span class="fst-normal">Proceed
                                        </span></i>
                                </button>
                                <button onclick="managementHold()" id="management_hold"
                                    class="btn btn-lg btn-warning btn-flat col-md-2"><i
                                        class="mdi mdi-pause text-white fw-normal"><span class="fst-normal">Hold
                                        </span></i>
                                </button>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('approval-vendor.form')
    @includeIf('approval-vendor.view-note')
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

        // management_proceed

        function managementProceed() {
            $('#modal-form-management').modal('show');
            $('#modal-form-management .notes').val('');
            $('#modal-form-management .modal-title').text('');
            $('#modal-form-management .modal-title').text('PROCEED');

        }

        function managementHold() {
            $('#modal-form-management').modal('show');
            $('#modal-form-management .notes').val('');
            $('#modal-form-management .modal-title').text('');
            $('#modal-form-management .modal-title').text('HOLD');
        }

        function updateSelected() {
            var valueUpdate = 0;
            var status = $('#modal-form-management .modal-title').text();
            status == 'PROCEED' ? valueUpdate = 1 : status == 'HOLD' ? valueUpdate = 3 : 0

            var token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var radios = document.getElementsByName('checked_vendor');
            var vcheck = 0;
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    // do whatever you want with the checked radio
                    var vcheck = radios[i].value;
                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }

            var message = $('#modal-form-management .notes').val();
            var userID = {{ Auth::user()->level }};
            var kodeSplit = $('#no_permintaan').val();

            var selected;
            switch (userID) {
                case 5:
                case 0:
                    selected = 'selected_technical_expert';
                    break;
                case 6:
                case 0:
                    selected = 'selected_gm_ho';
                    break;
                case 7:
                case 0:
                    selected = 'selected_gm_fat';
                    break;
                case 8:
                case 0:
                    selected = 'selected_dir_ho';
                    break;
                case 9:
                case 0:
                    selected = 'selected_md';
                    break;
                case 10:
                case 0:
                    selected = 'selected_presdir';
                    break;
                case 11:
                case 0:
                    selected = 'selected_owner';
                    break;
                default:
                    selected = 'error';
            }

            if (selected == 'error') {
                alert('no autoritation');
                return;
            }

            if (vcheck != 0 && message != '') {
                $.ajax({
                    url: "{{ route('updateselected') }}",
                    method: 'post',
                    data: {
                        "id_pilih_vendor": vcheck,
                        "user_id": userID,
                        "note": message,
                        "is_field_select": selected,
                        "kode_split": kodeSplit,
                        "value_update": valueUpdate,

                        "_token": token
                    },
                    success: function(response) {
                        console.log(response);
                        $('#modal-form-management').modal('hide');
                        location.reload();

                    },
                    error: function(response) {
                        alert('error');
                        console.log("error : " + JSON.stringify(response));
                    }
                });



            } else {

                if (vcheck == 0) {
                    alert('pilih vendor');
                    return;
                }


                if (message == '') {
                    alert('isi note');
                    return;
                }
            }

        }

        function viewNote(id, field, title) {
            console.log(id, field, title);

            $('#modal-note').modal('show');
            $('#modal-note .modal-title').text(title);

            $.ajax({
                url: "{{ route('viewselectednote') }}",
                data: {
                    "id": id,
                    "field": field,
                    // "_token": token
                },
                success: function(response) {
                    // var message = response.message;
                    // var data = response.data;
                    console.log(response.data.message);
                    $('#modal-note .tanggal').val(response.data.tgl_message);
                    $('#modal-note .notes').val(response.data.message);

                },
                error: function(response) {
                    alert('error');
                    console.log("error : " + JSON.stringify(response));
                }
            });


        }
    </script>
@endpush
