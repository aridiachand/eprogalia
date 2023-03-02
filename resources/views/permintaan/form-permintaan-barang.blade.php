@extends('basetemplate.base')
@section('judul-header')
    Buat Permintaan
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
                                Buat Permintaan
                            </li>
                        @endisset
                        @if (Request::segment(3) != null)
                            <li class="breadcrumb-item text-dark" aria-current="page">
                                {{ Str::ucfirst(Request::segment(3)) }}
                            </li>
                        @endisset
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="form-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-6">
                                        <label for="tanggal_permintaan" class="mb-md-0"><span>Tanggal
                                                PBJ</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="datepicker-autoclose"
                                                value="{{ date('d/m/Y') }}" />
                                            <div class="input-group-append">
                                                <span class="input-group-text h-100"><i
                                                        class="mdi mdi-calendar"></i></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_permintaan" class="mb-md-0"><span>No
                                                PBJ</span></label>
                                        <input class="form-control bg-white" type="text" id="no_permintaan"
                                            name="no_permintaan" value="{{ $noSPB }}" required readonly>

                                    </div>


                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
{{-- @dd($branch) --}}
                                    <div class="col-md-6">
                                        <label for="no_permintaan" class="mb-md-0"><span>Cabang</span></label>
                                        <select class="form-select select2 form-select shadow-none" required
                                             name="id_branch" id="id_branch">
                                            <option selected disabled value="">Select</option>
                                            @foreach ($branch as $nama => $id)
                                            <option value="{{$id}}">{{$nama}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="no_permintaan" class="mb-md-0"><span>Unit</span></label>
                                        <select class="form-select select2 form-select shadow-none" required
                                        name="id_department" id="id_department">
                                       <option selected disabled value="">Select</option>
                                       @foreach ($department as $nama => $id)
                                       <option value="{{$id}}">{{$nama}}</option>
                                       @endforeach
                                   </select>

                                    </div>

                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-4">
                                        <label for="" class="mb-md-0"><span>Tipe Permintaan</span></label>
                                        <select class="form-select select2 form-select shadow-none" required
                                            disabled name="tipe_permintaan" id="tipe_permintaan">
                                            <option selected value="nonrutin">Non Rutin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="mb-md-0"><span>Prioritas</span></label>
                                        <select class="form-select select2 form-select shadow-none" required
                                            name="prioritas" id="prioritas">
                                            <option selected disabled value="">CITO / Non CITO</option>
                                            <option value="noncito">Non CITO</option>
                                            <option value="cito">CITO</option>
                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="" class="mb-md-0"><span>Kategori
                                                Barang</span></label>
                                        <select class="form-select select2 form-select shadow-none" required
                                            name="kategori_barang" id="kategori_barang">
                                            <option selected disabled value=""></option>
                                            @foreach ($kategoriBarang as $key => $value)
                                                <option value="{{ $key }}">{{ $key }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-11" style="padding-right:0px;">
                                        <div class="input-group style-cari-barang">
                                            <label for="" class="mb-md-0"><span>Cari Barang /
                                                    Jasa</span></label>
                                            <select class="livesearch form-control form-select select2 form-select shadow-none" name="livesearch"></select>
                                            {{-- <select class="form-select select2 form-select shadow-none" required
                                                name="nama_barang" id="nama_barang">
                                                <option selected disabled value="">Cari Barang / Jasa
                                                </option>

                                                @foreach ($barang as $br)
                                                    <option value="{{ $br->id_barang }}"
                                                        kode="{{ $br->kode_barang }}"
                                                        nama_satuan_item="{{ $br->nama_satuan }}"
                                                        id_satuan_item="{{ $br->id_satuan_kecil }}"
                                                        harga_beli_item="{{ $br->harga_beli }}">
                                                        {{ $br->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select> --}}

                                        </div>
                                    </div>
                                    <div class="col-md-1 px-0" style="padding-top:23px;">
                                        <label for="" class="py-3"><span></span></label>
                                        <div class="input-group-append px-0 my-0 float-start"
                                            onclick="tambahItem()">
                                            <span class="btn btn-success text-white"><i
                                                    class="fa fa-plus"></i></span>
                                        </div>
                                    </div>



                                    {{-- let kode_barang = $(".form-group #nama_barang option:selected").attr('kode');
                                    let nama_satuan_item = $(".form-group #nama_barang option:selected").attr('nama_satuan_item');
                                    let id_satuan_item = $(".form-group #nama_barang option:selected").attr('id_satuan_item');
                                    let harga_beli_item = $(".form-group #nama_barang option:selected").attr('harga_beli_item'); --}}

                                </div>

                           </div>
                        </div>
                    </div>
                </div>

                {{-- ================================ --}}
                <div class="col-md-6">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="nama_permintaan" class="mb-md-0"><span>Nama PBJ</span></label>
                                        <input class="form-control" type="text" id="nama_permintaan"
                                            name="nama_permintaan" required>

                                    </div>
                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <label for="" class="mb-md-0"><span>Keterangan PBJ</span></label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" id="keterangan" style="height:110px !important;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ======================== --}}
                <div class="col-md-1">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items ">
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-2 mt-0">
                                </div>

                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <div class="form-button">
                                            {{-- ini untuk save --}}
                                            <button id="btn-submit"
                                                class="btn btn-secondary btn-lg btn-flat text-white"><i
                                                    class="mdi mdi-content-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{-- ================================================================================== --}}
                                <div class="form-group row pt-0 mt-0">
                                    <div class="col-md-12">
                                        <div class="form-button">

                                            <button id="cekNoPermintaan"
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

                                            <button id="cekNoPermintaan"
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


        <!-- ============================================================== -->
        <!-- chart -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <form action="" method="post" id="formsubmit">
                                @csrf
                                <input class="form-control" type="text" name="id_user_input" hidden
                                    value="{{ Auth::user()->id }}">
                                {{-- <input class="form-control" type="text" id="id_branch" name="id_branch"
                                    hidden value="{{ $idBranch->id_branch }}"> --}}
                                {{-- <input class="form-control" type="text" name="id_department" hidden
                                    value="{{ $idDepartment->id_department }}"> --}}
                                <input class="form-control" type="text" name="deskripsi" id="spbdeskripsi"
                                    hidden>
                                <input class="form-control" type="text" name="prioritas" id="prioritas"
                                    hidden>
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white fw-bold">No</th>
                                            <th class="text-white fw-bold">Kode barang</th>
                                            <th class="text-white fw-bold">Nama barang</th>
                                            <th class="text-white fw-bold">Satuan</th>
                                            <th class="text-white fw-bold">Harga</th>
                                            <th class="text-white fw-bold">Kuantitas</th>
                                            <th class="text-white fw-bold">Total</th>
                                            <th class="text-white fw-bold">Ket barang</th>
                                            <th width="10%" class="text-white fw-bold"><i
                                                    class="fa fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                                </table>
                                <button class="btn btn-success btn-flat" hidden></button>
                            </form>
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
    @includeIf('permintaan.form')
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
        // var quill = new Quill("#editor", {
        //     theme: "snow",
        // });
    </script>

    <script>
        //***********************************//
        // For select 2
        //***********************************//
        // $(".select2").select2();

        $(".select2").select2();
    </script>

    <script>
        (function() {
            'use strict'
            const forms = document.querySelectorAll('.requires-validation')
            Array.from(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>


    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        //  lengthChange,searching,paging,info
        let table;

        $(function() {
            table = $("#zero_config_add").DataTable({
                processing: true,
                autoWidth: false,
                lengthChange: true,
                searching: true,


            });

            $('#btn-submit').on('click', function(e) {

                if (!$('#nama_permintaan').val()) {
                    alert('isi data nama permintann!');
                    return
                }

                if (!$('#keterangan').val()) {
                    alert('isi data nama permintann!');
                    return
                }

                // collect data==============
                if ($('#zero_config tbody tr').length == 0) {
                    alert('isi data terlebih dahulu!');
                    console.log('isi data terlebih dahulu!');
                    return
                } else {
                    $('#spbdeskripsi').val($('#keterangan').val());

                    let token = $("meta[name='csrf-token']").attr("content");
                    let tanggal_permintaan = $('#datepicker-autoclose').val();

                    // datauser
                    // let id_branch = $('#id_branch').val();
                    let id_branch = $('.form-group [name=id_branch]').val();
                    let id_department = $('.form-group [name=id_department]').val();

                    // nopermintaan
                    let kode_permintaan = $('.form-group [name=no_permintaan]').val();

                    let nama_branch = $('.form-group [name=nama_branch]').val();
                    let nama_unit = $('.form-group [name=nama_unit]').val();

                    let tipe_permintaan = $(".form-group #tipe_permintaan").val();
                    let prioritas_permintaan = $(".form-group #prioritas").val();
                    let kategori_barang = $(".form-group #kategori_barang").val();
                    // let nama_barang = $(".form-group #nama_barang option:selected").text().trim();

                    let nama_permintaan = $(".form-group #nama_permintaan").val();
                    let keterangan_spb = $('#keterangan').val();

                    let kode_barang = [];
                    let nama_barang = [];
                    let nama_satuan_item = [];
                    let harga_barang = [];
                    let jumlah = [];
                    let total = [];
                    let keterangan_item = [];
                    let id_satuan_item = [];

                    var currentRow = $('#zero_config tbody tr');

                    currentRow.find("td:eq(1) input").each(function() {
                        kode_barang.push($(this).val());
                    });

                    currentRow.find("td:eq(2) input").each(function() {
                        nama_barang.push($(this).val());
                    });

                    currentRow.find("td:eq(3) input").each(function() {
                        nama_satuan_item.push($(this).val());
                    });

                    currentRow.find("td:eq(4) input").each(function() {
                        harga_barang.push($(this).val());
                    });

                    currentRow.find("td:eq(5) input").each(function() {
                        jumlah.push($(this).val());
                    });

                    currentRow.find("td:eq(6) input").each(function() {
                        total.push($(this).val());
                    });

                    currentRow.find("td:eq(7) input").each(function() {
                        keterangan_item.push($(this).val());
                    });

                    currentRow.find("td:eq(9) input").each(function() {
                        id_satuan_item.push($(this).val());
                    });


                    $.ajax({
                        url: '{{ route('store.all') }}',
                        type: "POST",
                        cache: false,
                        data: {
                            "id_branch": id_branch,
                            "id_department": id_department,
                            "tanggal_permintaan": tanggal_permintaan,
                            "kode_permintaan": kode_permintaan,
                            "tipe_permintaan": tipe_permintaan,
                            "prioritas_permintaan": prioritas_permintaan,
                            "kategori_barang": kategori_barang,
                            "nama_permintaan": nama_permintaan,
                            "keterangan_spb": keterangan_spb,

                            "kode_barang": kode_barang,
                            "nama_barang": nama_barang,
                            "jumlah": jumlah,
                            "nama_satuan_item": nama_satuan_item,
                            "id_satuan_item": id_satuan_item,
                            "keterangan_item": keterangan_item,
                            "harga_barang": harga_barang,
                            "total": total,
                            "_token": token
                        },
                        success: function(response) {
                            // console.log(response);
                            alert('data berhasil di simpan');
                            window.location.reload();

                        },
                        error: function(error) {
                            console.log(error, 1);


                        }
                    });
                }
            })


            // baru yg form master
            $("#zero_config tbody").on("click", ".remove-row", function() {
                if (confirm('Yakin ingin menghapus item?')) {
                    $(this).closest("tr").remove();
                }
            });


        });


        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Kategori');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form form [name=_method]').val('post');
            $('#modal-form form [name=nama_kategori]').val();
        }

        function editForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Edit Kategori');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form form [name=_method]').val('put');
            $('#modal-form form [name=nama_kategori]').val();

            $.get(url)
                .done((response) => {
                    $('#modal-form form [name=nama_kategori]').val(response.nama_kategori);
                })
                .fail((errors) => {
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }

        function deleteData(url) {
            if (confirm('Yakin ingin menghapus data?')) {
                $.post(url, {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'delete'
                    })
                    .done((response) => {
                        table.ajax.reload();
                        alert('Berhasil di hapus');
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        }

        function addFreetext() {
            $('.form-group [name=nama_barang]').prop('readonly', false);
            $('.form-group [name=nama_barang]').focus();
        }

        $('#searchBarang').on('keyup',function(){
            let kategori_cito = $('.form-group [name=kategori_cito]').val();
            let kategori_barang = $('.form-group [name=kategori_barang]').val();

            var that = this,
            value = $(that).val();

            if(this.value.length < 3){
                return;
            }

            if(value != ''){
                $.ajax({
                        url: '{{ route('autocomplete.search') }}',
                        type: "get",
                        cache: false,
                        data: {
                           'search':value,
                        },
                        success: function(response) {
                            // console.log(response);
                            // alert('data berhasil di simpan');
                            // window.location.reload();

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
            }

        });


        $('.livesearch').select2({
        placeholder: 'Select Barang',
        ajax: {
            url: '{{ route('autocomplete.search2') }}',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                // console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id_barang,
                            text: item.nama_barang,
                        }
                    })

                };
            },
            cache: true,
            minimumInputLength: 3,
        }

        // console.log($('.livesearch').find(':selected'));
        });




        function getdatabarang(id_barang){
            // return 1234;

        }

        function tambahItem() {
            // alert($('.livesearch').find(':selected').val());
            // alert($('.livesearch').find(':selected').val());
            // alert($('.livesearch').find(':selected').data('custom-attribute'));
            let id_branch = $('.form-group [name=id_branch]').val();
            let id_department = $('.form-group [name=id_department]').val();


            let no_permintaan = $('.form-group [name=no_permintaan]').val();
            let tipe_permintaan = $(".form-group #tipe_permintaan").val();
            let prioritas_permintaan = $(".form-group #prioritas").val();
            let kategori_barang = $(".form-group #kategori_barang").val();

            let nama_barang = $('.livesearch').find(':selected').text().trim();
            var id_barang = $('.livesearch').find(':selected').val();



            if (!id_branch) {
                alert('Pilih branch name');
                return
            }

            if (!id_department) {
                alert('Pilih unit');
                return
            }

            if (!prioritas_permintaan) {
                alert('Pilih prioritas permintaan');
                return
            }

            if (!kategori_barang) {
                alert('Pilih kategori barang');
                return
            }

            if (!$('.livesearch').find(':selected').val()) {
                alert('Pilih barang terlebih dahulu');
                return
            }

            // console.log(nama_barang);

            if (tipe_permintaan, prioritas_permintaan, kategori_barang) {
                var nom = $('#zero_config tbody tr').length + 1;

                $.ajax({
                        url: '{{ route('autocomplete.search') }}',
                        type: "get",
                        cache: false,
                        data: {
                           'search':id_barang,
                        },
                        success: function(response) {
                            var kode_barang = response[0].kode_barang;
                            var nama_satuan_item = response[0].nama_satuan_barang;
                            var id_satuan_item = response[0].id_satuan_kecil;
                            var harga_beli_item = response[0].harga_beli;

                            // console.log(response[0].kode_barang);

                            var tr_td = "<tr>" +
                            "<td>" + nom + "</td>" +
                            "<td><input style='width:110px;' type=text value=" + kode_barang +
                            " name=kode_barang[] readonly></td>" +
                            "<td><input type=text value='" + nama_barang + "' name=nama_barang[] readonly></td>" +
                            "<td><input style='width:70px;' type=text value=" + nama_satuan_item +
                            " name=nama_satuan_item[] readonly></td>" +
                            "<td><input style='width:70px;' type=text value=" + harga_beli_item + " name=harga[]></td>" +
                            "<td><input style='width:50px;' type=text value=0 name=jumlah[] onkeypress='return event.charCode >= 48 && event.charCode <= 57'></td>" +
                            "<td><input style='width:80px;' type=text value=0 name=total[] readonly></td>" +
                            "<td><input type=text name=keterangan_item[]></td>" +
                            "<td><span title='Delete' class='btn btn-xs btn-danger btn-flat remove-row'><i class='mdi mdi-delete'></i></span></td>" +
                            "<td hidden><input type=text value=" + id_satuan_item + " name=id_satuan_item[]></td>" +
                            "</tr>";

                        var insertRow = $('#zero_config > tbody:last-child').append(tr_td);

                        if (insertRow) {
                            // no_permintaan = $('.form-group [name=no_permintaan]').val();
                            // $(".form-group #tipe_permintaan").prop('readonly', true);
                            $(".form-group #tipe_permintaan").attr('disabled', 'disabled')
                                .siblings().removeAttr('disabled');
                            $(".form-group #prioritas").attr('disabled', 'disabled')
                                .siblings().removeAttr('disabled');
                            $(".form-group #kategori_barang").attr('disabled', 'disabled')
                                .siblings().removeAttr('disabled');
                            $(".form-group #nama_barang").val('');

                            $(".livesearch").val(0);
                            $(".livesearch").text('');
                            // $(".livesearch").click;
                        }

                        var currentRow = $('#zero_config tbody tr');
                        currentRow.find("td:eq(5) input").keyup(function() {
                            // console.log($(this).val());
                            if ($(this).val()) {
                                let mythis = $(this).val();
                                let prev = $(this).closest('td').prev('td').find('input').val();
                                let total = parseInt(mythis) * parseInt(prev);
                                // console.log(mythis, prev, total);

                                $(this).closest('td').next('td').find('input').val(total);
                            }
                        });
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });



                // let kode_barang = $(".attrkode").val();
                // let nama_satuan_item = $(".attrnama_satuan_item").val();
                // let id_satuan_item = $(".attrid_satuan_item").val();
                // let harga_beli_item = $(".attrharga_beli_item").val();




            }

        }



    </script>

@endpush
