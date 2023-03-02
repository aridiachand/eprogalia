@extends('basetemplate.base')
@section('judul-header')
    Permintaan
@endsection
@section('judul-header-breadcrumb')
    <div class="page-breadcrumb p-0 m-0">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">@yield('namepage')</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="/">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">
                            {{ Str::ucfirst(Request::segment(1)) }}
                        </li>
                        @if (Request::segment(2) != null)
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ Str::ucfirst(Request::segment(2)) }}
                            </li>
                        @endisset
                        @if (Request::segment(3) != null)
                            <li class="breadcrumb-item active" aria-current="page">
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
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <div class="form-group row pt-0 mt-0">
                                <div class="col-md-3">
                                    <label for="" class="mb-md-0"><span>Branch</span></label>
                                    <input class="form-control" type="text" name="nama_branch"
                                        placeholder="Nama Branch" required readonly value="{{ $idBranch->nama }}">

                                </div>

                                <div class="col-md-3">
                                    <label for="" class="mb-md-0"><span>Department</span></label>
                                    <input class="form-control" type="text" name="nama_department"
                                        placeholder="Nama Department" required readonly
                                        value="{{ $idDepartment->department }}">
                                </div>

                                <div class="col-md-3">
                                    <label class="switch">
                                        <input type="checkbox" id="togBtn">
                                        <div class="slider"></div>
                                    </label>
                                </div>

                            </div>
                            <hr>
                            <div class="form-group row pt-0 mt-0">
                                {{-- <div class="col-md-3">
                                    <input type="radio" class="btn-check kategori_cito" name="kategori_cito[]"
                                        id="noncito" autocomplete="off" required value="non cito">
                                    <label class="btn btn-sm btn-outline-info col-md-4" for="noncito">Non
                                        Cito</label>
                                    <input type="radio" class="btn-check kategori_cito" name="kategori_cito[]"
                                        id="cito" autocomplete="off" required required value="cito">
                                    <label class="btn btn-sm btn-outline-danger col-md-4" for="cito">Cito</label>
                                    <div class="invalid-feedback mv-up">pilih kategori cito!</div>
                                </div> --}}
                                {{-- <div class="col-md-3">
                                    <label for="kategori_cito" class="mb-md-0"><span class="px-md-1">CITO / Non
                                            CITO</span></label>
                                    <select class="form-select select2 form-select shadow-none" required
                                        name="kategori_cito" id="kategori_cito">
                                        <option selected disabled value="">CITO / Non CITO</option>
                                        <option value="noncito">Non CITO</option>
                                        <option value="cito">CITO</option>
                                    </select>
                                    <div class="valid-feedback">You selected a position!</div>
                                    <div class="invalid-feedback">Please select a position!</div>
                                </div> --}}
                                <div class="col-md-3">
                                    {{-- <label for="kategori_tipe" class="mb-md-0"><span>Kategori
                                            Barang</span></label> --}}
                                    <select id="kategori_tipe" class="form-select select2 form-select shadow-none"
                                        required name="kategori_tipe">
                                        <option selected disabled value="">Kategori Barang</option>
                                        @foreach ($kategoriTipe as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">You selected a position!</div>
                                    <div class="invalid-feedback">Please select a position!</div>
                                </div>

                                {{-- <div class="col-md-3">
                                    <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang"
                                        required readonly>
                                    <div class="invalid-feedback">masukan nama barang!</div>
                                </div> --}}
                                <div class="col-md-4">
                                    <input type="radio" class="btn-check freetext" name="free_text[]"
                                        id="freetext" autocomplete="off" value="freetext" required>
                                    <label class="btn btn-sm btn-outline-success col-md-3" onclick="tambahItem()"
                                        for="freetext">Free Text</label>
                                    <input type="radio" class="btn-check freetext" name="free_text[]"
                                        id="search-barang" autocomplete="off" value="master" required>
                                    <label class="btn btn-sm btn-outline-info col-md-4" onclick="searchBarang()"
                                        for="search-barang">Master Barang</label>
                                    <div class="invalid-feedback mv-up">pilih jenis inputan!</div>
                                </div>
                            </div>

                            <div class="form-group row pt-0 mt-0">

                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="desk"
                                        placeholder="Deskripsi" required>
                                    <div class="invalid-feedback">masukan keterangan barang!</div>
                                </div>
                                {{-- <div class="col-md-1 ">
                                    <div class="form-button">
                                        <button onclick="tambahItem()" id="tambah"
                                            class="btn btn-success xs btn-flat text-white"><i class="fa fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div> --}}

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
                            <form action=" {{ route('store.all') }}" method="post" id="formsubmit">
                                @csrf
                                <input class="form-control" type="text" name="id_user_input" hidden
                                    value="{{ Auth::user()->id }}">
                                <input class="form-control" type="text" name="id_branch" hidden
                                    value="{{ $idBranch->id_branch }}">
                                <input class="form-control" type="text" name="id_department" hidden
                                    value="{{ $idDepartment->id_department }}">
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
                                            <th class="text-white fw-bold">Jumlah</th>
                                            <th class="text-white fw-bold">Keterangan</th>
                                            <th width="15%" class="text-white fw-bold"><i
                                                    class="fa fa-cog"></i></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>

                                </table>
                                <button class="btn btn-success btn-flat" hidden></button>
                            </form>
                            <div class="p-2">
                                <button id="btn-submit" class="btn btn-success btn-flat">Simpan</button>
                            </div>
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

                // ajax: {
                //     url: '{{ route('permintaan.data') }}',
                // },
                // columns: [{
                //         data: 'DT_RowIndex',
                //         searchable: false,
                //         sortable: false
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'nama_vendor'
                //     },
                //     {
                //         data: 'aksi',
                //         searchable: false,
                //         sortable: false
                //     },
                // ]
            });

            $('#btn-submit').on('click', function(e) {
                if ($('#togBtn').is(":checked") == true) {
                    $('#prioritas').val('cito');
                } else {
                    $('#prioritas').val('noncito');
                };
                $('#spbdeskripsi').val($('#desk').val());

                console.log($(".nama_barang").val());

                var TableData = [];
                $('#zero_config tbody tr').each(function(row, tr) {
                    var myNum = $(tr).find('td:eq(0)').text();
                    var myNB = $(tr).find('td:eq(2) input').val();
                    var myJB = $(tr).find('td:eq(3) input').val();

                    if (typeof myNB[row] === "undefined") {
                        alert('Nama Barang No.' + myNum + ' belum diisi / duplikat Nama Barang')
                    }

                    if (typeof myJB[row] === 0) {
                        alert('Isi Jumlah Barang No.' + myNum)
                    }
                    // TableData[row] = {
                    //     "no": $(tr).find('td:eq(0)').text(),
                    //     "kodebarang": $(tr).find('td:eq(1) input').val()
                    //     "jumlah": $(tr).find('td:eq(2) input').val()
                    //     "keterangan": $(tr).find('td:eq(3) input').val()
                    // }
                });

                // console.log(TableData);


                if ($('#zero_config tbody tr').length == 0) {
                    alert('isi data terlebih dahulu!')
                } else {
                    // $('#formsubmit').first().submit();
                }

            })


            $('.btnSelect').on('click', function() {
                var nom = $('#zero_config tbody tr').length + 1;

                let currentRow = $(this).closest("tr");
                let id_barang = currentRow.find("td:eq(0)").html();
                let kode_barang = currentRow.find("td:eq(1)").html();
                let nama_barang = currentRow.find("td:eq(2)").html();
                currentRow.find("td:eq(3) .btnSelect").prop('disabled', true);

                // var currentRow = $('#zero_config tbody tr');


                if (id_barang && kode_barang && nama_barang) {
                    $('#zero_config > tbody:last-child').append(
                        '<tr><td>' + nom + '</td><td><input type=text value=' + kode_barang +
                        ' name=kode_barang[] readonly></td><td><input class=nama_barang type=text value=' +
                        nama_barang +
                        ' name=nama_barang[] readonly></td><td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type=text name=jumlah[] value=1></td><td><input type=text name=keterangan[]></td><td><span title="Delete" class="btn btn-xs btn-danger btn-flat remove-row"><i class="mdi mdi-delete"></i></span></td><td hidden><input type=text value=' +
                        id_barang +
                        ' name=id_barang[] readonly></td></tr>'
                    );
                }
            });

            // $("#zero_config tbody").on("click", "button", function() {
            //     $(this).closest("tr").remove();
            // });

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

        function searchBarang() {
            // let kategori_cito = $('.kategori_cito:checked').val();
            let kategori_cito = $('.form-group [name=kategori_cito]').val();
            let kategori_tipe = $('.form-group [name=kategori_tipe]').val();

            // console.log(kategori_cito, kategori_tipe);
            if (1) {
                $('#modal-form').modal('show');
                $('.form-group [name=nama_barang]').prop('readonly', true);
                $('#modal-form .modal-title').text('Tambah Item');
            } else {
                alert('isi kategori cito & kategori tipe');
            }


        }

        // function getItem() {

        // }

        function tambahItem() {
            let freetext = $('.freetext:checked').val();
            if (1 == 1) {

                var currentRow = $('#zero_config tbody tr');
                var nom = currentRow.length + 1;

                if (currentRow.length > 0) {
                    console.log($('#zero_config tbody tr').children('td').eq(2).html());
                }
                $('#togBtn').attr('disabled', 'disabled').siblings().removeAttr('disabled');
                $('.form-group [name=kategori_tipe]').attr('disabled', 'disabled').siblings().removeAttr('disabled');

                var str_tr =
                    '<tr><td>' + nom +
                    '</td><td><input type=text value=free-text name=kode_barang[] readonly></td><td><input type=text class=inamabarang name=nama_barang[] required></td><td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type=text name=jumlah[] value=1 required></td><td><input type=text name=keterangan[]></td><td><span title="Delete" class="btn btn-xs btn-danger btn-flat remove-row"><i class="mdi mdi-delete"></i></span></td></tr><input name=input_tipe hidden type=text value=' +
                    freetext +
                    ' />';
                $('#zero_config > tbody:last-child').append(str_tr);
                setTimeout(function() {
                    $('#zero_config tbody .inamabarang').focus()
                }, 1000);
            }

        }
    </script>
@endpush
