@extends('basetemplate.base')
@section('judul-header')
    Verification Vendor
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
                                Verification Vendor
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
            {{-- @dd($pemilihanvendor[0]) --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="no_permintaan" class="mb-md-0"><span>No PBJ</span></label>
                                        <input class="form-control bg-white" type="text" id="no_permintaan"
                                            data="{{ $pemilihanvendor[0]->kode_permintaan }}" name="no_permintaan"
                                            value="{{ $pemilihanvendor[0]->kode_permintaan_split }}" readonly>
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
                            {{-- @dd($pemilihanvendor) --}}
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
                            <div class="alert alert-warning text-center" role="alert">
                                <h6 class="pt-2">APPROVED</h6>
                            </div>
                            <table id="zero_config" class="table table-bordered">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th width="3%" class="text-white fw-bold">No</th>
                                        <th width="8%" class="text-white fw-bold">Kode barang</th>
                                        <th class="text-white fw-bold">Nama barang</th>
                                        <th class="text-white fw-bold">Update Nama barang</th>
                                        <th width="5%" class="text-white fw-bold">Satuan</th>
                                        <th width="8%" class="text-white fw-bold">Harga</th>
                                        <th width="5%" class="text-white fw-bold">Qty</th>
                                        <th width="8%" class="text-white fw-bold">Total</th>
                                        {{-- <th width="5%" class="text-white fw-bold">Update</th> --}}
                                        {{-- <th width="10%" class="text-white fw-bold"><i class="fa fa-cog"></i> --}}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="trtd">
                                    <?php $no = 1;
                                    $subtotal = 0; ?>
                                    @foreach ($permintaandetail as $pd)
                                        <tr class="{{ $pd->kode_barang }}">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pd->kode_barang }}</td>
                                            <td>{{ $pd->nama_barang }}</td>
                                            <td class="col-md-4">
                                                <select
                                                    class="col-md-12 form-select select2 form-select shadow-none update_nama_barang"
                                                    required name="update_nama_barang[]">
                                                    <option selected value="">==Pilih Master Barang==
                                                    </option>
                                                    @foreach ($masterbarang as $mb)
                                                        <option value="{{ $mb->id_barang }}"
                                                            kode="{{ $mb->kode_barang }}" nama_satuan_item="PCS"
                                                            id_satuan_item="{{ $mb->id_satuan_kecil }}"
                                                            harga_beli_item="{{ $mb->harga_beli }}">
                                                            {{ $mb->nama_barang }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </td>
                                            <td>{{ $pd->nama_satuan_barang }}</td>
                                            <td><input type="text" class="uang col-md-12"
                                                    value="{{ $pd->harga_beli }}">
                                            </td>
                                            <td>{{ $pd->jumlah }}</td>
                                            <td>
                                                <input type="text"
                                                    class="uang subtotal col-md-12 bg-white text-dark"
                                                    value="{{ $pd->subtotal }}" disabled>
                                            </td>
                                            {{-- <td width="5%"><button class="btn btn-xs btn-success btn-flat"><i
                                                        class="mdi mdi-pencil"></i></button></td> --}}
                                        </tr>
                                        <?php
                                        $subtotal = $subtotal + $pd->subtotal;
                                        ?>
                                    @endforeach
                                <tbody>
                                    <tr class="{{ $pd->kode_barang }}">
                                        <td colspan="7"></td>
                                        <td class="fw-bold">
                                            <input class="uang grandtotal col-md-12 bg-white text-dark" type="text"
                                                value="{{ format_uang($subtotal) }}" disabled>
                                        </td>
                                    </tr>
                                </tbody>
                                </tbody>
                            </table>
                        </div>

                        <table id="zero_config_vendor" class="table table-bordered">

                            <thead class="bg-secondary">

                                <tr class="mb-2" style="background:#37bcff;">
                                    <th width="3%" class="text-white">#</th>
                                    <th width="37%">Vendor</th>
                                    <th width="5%" class="text-white py-4">Attachment</th>
                                    <th width="10%" class="text-white py-4">Nilai (Rp)</th>
                                    <th width="5%" class="text-white py-4">DP (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dd($pemilihanvendor); --}}
                                @foreach ($pemilihanvendor as $pv)
                                    <tr>
                                        <td><i class="mdi mdi-arrow-right-drop-circle-outline"></i></td>
                                        <td class="nama_vendor">{{ $pv->nama_vendor }}</td>
                                        <td><a href="{{ $pv->file_path }}" target="_blank">view</a></td>
                                        <td class="nilai_vendor">{{ format_uang($pv->nilai_harga) }}</td>
                                        <td class="dp_vendor">{{ $pv->down_payment }}</td>
                                        <td>
                                            <div class="row">
                                                <label class="customcheckbox col-3 mx-2">
                                                </label>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <input hidden type="text" class="id_vendor" name="id_vendor"
                            value="{{ $pv->id_vendor }}">
                        <button class="btn btn-success btn-flat" hidden></button>
                        {{-- </form> --}}

                        <div class="p-2">
                            <button onclick="finishInternal()" class="btn btn-lg btn-success btn-flat col-md-2"><i
                                    class="mdi mdi-play text-white fw-normal"><span class="fst-normal">Proceed
                                    </span></i>
                            </button>
                            {{-- <button onclick="managementHold()" id="management_hold"
                                class="btn btn-lg btn-warning btn-flat col-md-2"><i
                                    class="mdi mdi-pause text-white fw-normal"><span class="fst-normal">Hold
                                    </span></i>
                            </button> --}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    {{-- @includeIf('approval-vendor.form')
    @includeIf('approval-vendor.view-note') --}}
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
    {{-- //     < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" >
    //  --}}
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>


    <script>
        $(document).ready(function() {
            // Format mata uang.
            $('.uang').mask('0.000.000.000', {
                reverse: true
            });
        });

        var currentRow = $('#zero_config tbody tr');
        currentRow.find("td:eq(5) input").keyup(function() {
            // console.log($(this).val(), prev);
            if ($(this).val()) {
                let mythis = $(this).val();
                let mythisrpl = mythis.replaceAll('.', '');
                let prev = $(this).closest('td').next('td').text();
                let total = parseInt(mythisrpl) * parseInt(prev);
                //     $(this).closest('td').next('td').find('input').val(total);
                $(this).closest('td').next('td').next('td').find('input').val(total);

                var grandtotal = 0;
                // var grandtotal = [];
                // console.log(currentRow.find(".subtotal").val());
                var thisval = 0;
                var mythisval = 0;
                currentRow.find(".subtotal").each(function() {
                    thisval = $(this).val();
                    mythisval = thisval.replaceAll('.', '');
                    grandtotal = grandtotal + parseInt(mythisval);
                });

                console.log(mythisval, grandtotal);
                $('.grandtotal').val(grandtotal);

            }
        });


        jQuery("#datepicker-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            // todayBtn: "linked",
            // language: "it",
        });

        $(".select2").select2();

        // management_proceed

        // function managementProceed() {
        //     $('#modal-form-management').modal('show');
        //     $('#modal-form-management .notes').val('');
        //     $('#modal-form-management .modal-title').text('');
        //     $('#modal-form-management .modal-title').text('PROCEED');

        // }

        // function managementHold() {
        //     $('#modal-form-management').modal('show');
        //     $('#modal-form-management .notes').val('');
        //     $('#modal-form-management .modal-title').text('');
        //     $('#modal-form-management .modal-title').text('HOLD');
        // }

        function finishInternal() {
            var grandtotal = $('.grandtotal').val();
            var nilaivendor = $('.nilai_vendor').text();
            nilaivendor = nilaivendor.replaceAll('.', '');

            if (grandtotal != nilaivendor) {
                console.log(grandtotal, nilaivendor, 'Total Harus Sesuai');
                alert('Total Harus Sesuai Nilai Vendor ');
                return;
            } else {
                console.log(grandtotal, nilaivendor, 'Tatal Sama');
                var token = $("meta[name='csrf-token']").attr("content");

                var kode_permintaan = $('.form-group [name=no_permintaan]').attr('data');
                var kode_permintaan_split = $('.form-group [name=no_permintaan]').val();

                var id_vendor = $('[name=id_vendor]').val();
                var nama_vendor = $('.nama_vendor').text().trim();
                var nilai_vendor = $('.nilai_vendor').text().trim();
                nilai_vendor = nilai_vendor.replaceAll('.', '');


                var dp_vendor = $('.dp_vendor').text().trim();

                // console.log(id_vendor, 123);

                var kode_barang = [];
                var nama_barang = [];


                var update_id_barang = [];
                var update_kode_barang = [];
                var update_nama_barang = [];
                var update_harga_jual = [];
                var update_nilai_barang = [];
                var total = [];

                var unb = [];

                var grandtotalitems = 0;

                // console.log(kode_permintaan, kode_permintaan_split);

                var currentRow = $('#zero_config .trtd tr');
                // console.log(currentRow.html());
                if (currentRow) {

                    currentRow.find("td:eq(1)").each(function() {
                        kode_barang.push($(this).text());
                    });

                    currentRow.find("td:eq(2)").each(function() {
                        nama_barang.push($(this).text());
                    });

                    currentRow.find("td:eq(3) select option:selected").each(function() {
                        update_id_barang.push($(this).val());
                    });

                    currentRow.find("td:eq(3) select option:selected").each(function() {
                        if ($(this).attr('kode')) {
                            update_kode_barang.push($(this).attr('kode'));
                        } else {
                            update_kode_barang.push('');
                        }
                    });

                    currentRow.find("td:eq(3) select option:selected").each(function() {
                        var mythismb = $(this).text().trim();
                        var mythisrplmb = '';
                        (mythismb == '==Pilih Master Barang==') ? mythisrplmb = '': mythisrplmb = mythismb;
                        update_nama_barang.push(mythisrplmb);
                    });

                    currentRow.find("td:eq(5) input").each(function() {
                        var mythis = $(this).val();
                        var mythisrpl = mythis.replaceAll('.', '');
                        update_nilai_barang.push(mythisrpl);

                    });

                    currentRow.find("td:eq(7)").each(function() {
                        total.push($(this).val());
                    });
                }

                console.log(update_kode_barang, kode_barang, 123123);

                $.ajax({
                    url: "{{ route('verification-vendor.store') }}",
                    method: 'post',
                    data: {
                        "_token": token,
                        "kode_permintaan": kode_permintaan,
                        "kode_permintaan_split": kode_permintaan_split,
                        "id_vendor": id_vendor,
                        "nama_vendor": nama_vendor,
                        "nilai_vendor": nilai_vendor,
                        "dp_vendor": dp_vendor,

                        "kode_barang": kode_barang,
                        "nama_barang": nama_barang,
                        "update_id_barang": update_id_barang,
                        "update_kode_barang": update_kode_barang,
                        "update_nama_barang": update_nama_barang,
                        "update_harga_jual": update_harga_jual,
                        "update_nilai_barang": update_nilai_barang,
                        "total": total,
                    },
                    success: function(response) {
                        console.log(response);
                        alert('berhasil update');
                        // location.reload();

                    },
                    error: function(response) {
                        alert('error');
                        console.log("error : " + JSON.stringify(response));
                    }
                });

            }

        }

        function updateSelected() {
            // var valueUpdate = 0;
            // var status = $('#modal-form-management .modal-title').text();
            // status == 'PROCEED' ? valueUpdate = 1 : status == 'HOLD' ? valueUpdate = 3 : 0

            // var token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            // var radios = document.getElementsByName('checked_vendor');
            // var vcheck = 0;
            // for (var i = 0, length = radios.length; i < length; i++) {
            //     if (radios[i].checked) {
            //         // do whatever you want with the checked radio
            //         var vcheck = radios[i].value;
            //         // only one radio can be logically checked, don't check the rest
            //         break;
            //     }
            // }

            // var message = $('#modal-form-management .notes').val();
            // var userID = {{ Auth::user()->level }};
            // var kodeSplit = $('#no_permintaan').val();

            // var selected;
            // switch (userID) {
            //     case 5:
            //     case 0:
            //         selected = 'selected_technical_expert';
            //         break;
            //     case 6:
            //     case 0:
            //         selected = 'selected_gm_ho';
            //         break;
            //     case 7:
            //     case 0:
            //         selected = 'selected_gm_fat';
            //         break;
            //     case 8:
            //     case 0:
            //         selected = 'selected_dir_ho';
            //         break;
            //     case 9:
            //     case 0:
            //         selected = 'selected_md';
            //         break;
            //     case 10:
            //     case 0:
            //         selected = 'selected_presdir';
            //         break;
            //     case 11:
            //     case 0:
            //         selected = 'selected_owner';
            //         break;
            //     default:
            //         selected = 'error';
            // }

            // if (selected == 'error') {
            //     alert('no autoritation');
            //     return;
            // }

            // if (vcheck != 0 && message != '') {
            //     $.ajax({
            //         url: "{{ route('updateselected') }}",
            //         method: 'post',
            //         data: {
            //             "id_pilih_vendor": vcheck,
            //             "user_id": userID,
            //             "note": message,
            //             "is_field_select": selected,
            //             "kode_split": kodeSplit,
            //             "value_update": valueUpdate,

            //             "_token": token
            //         },
            //         success: function(response) {
            //             console.log(response);
            //             $('#modal-form-management').modal('hide');
            //             location.reload();

            //         },
            //         error: function(response) {
            //             alert('error');
            //             console.log("error : " + JSON.stringify(response));
            //         }
            //     });



            // } else {

            //     if (vcheck == 0) {
            //         alert('pilih vendor');
            //         return;
            //     }


            //     if (message == '') {
            //         alert('isi note');
            //         return;
            //     }
            // }

        }

        // function viewNote(id, field, title) {
        //     console.log(id, field, title);

        //     $('#modal-note').modal('show');
        //     $('#modal-note .modal-title').text(title);

        //     $.ajax({
        //         url: "{{ route('viewselectednote') }}",
        //         data: {
        //             "id": id,
        //             "field": field,
        //             // "_token": token
        //         },
        //         success: function(response) {

        //             console.log(response.data.message);
        //             $('#modal-note .tanggal').val(response.data.tgl_message);
        //             $('#modal-note .notes').val(response.data.message);

        //         },
        //         error: function(response) {
        //             alert('error');
        //             console.log("error : " + JSON.stringify(response));
        //         }
        //     });


        // }
    </script>
@endpush
