@extends('basetemplate.base')
@section('namepage')
    Permintaan
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
                                    <input class="form-control" type="text" name="nama_branch" placeholder="Nama Branch"
                                        required readonly value="{{ $idBranch->nama }}">

                                </div>

                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="nama_department"
                                        placeholder="Nama Department" required readonly
                                        value="{{ $idDepartment->department }}">
                                </div>

                            </div>
                            <hr>
                            <div class="form-group row pt-0 mt-0">
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check kategori_cito" name="kategori_cito[]"
                                        id="noncito" autocomplete="off" required value="non cito">
                                    <label class="btn btn-sm btn-outline-info col-md-4" for="noncito">Non
                                        Cito</label>
                                    <input type="radio" class="btn-check kategori_cito" name="kategori_cito[]"
                                        id="cito" autocomplete="off" required required value="cito">
                                    <label class="btn btn-sm btn-outline-danger col-md-4" for="cito">Cito</label>
                                    <div class="invalid-feedback mv-up">pilih kategori cito!</div>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-select select2 form-select shadow-none" required
                                        name="kategori_tipe">
                                        <option selected disabled value="">Kategori Barang</option>
                                        @foreach ($kategoriTipe as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">You selected a position!</div>
                                    <div class="invalid-feedback">Please select a position!</div>
                                </div>
                            </div>

                            <div class="form-group row pt-0 mt-0">
                                {{-- <div class="col-md-3">
                                    <select class="form-select select2 form-select shadow-none" required name="department">
                                        <option selected disabled value="">Department</option>
                                        @foreach ($department as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">You selected a position!</div>
                                    <div class="invalid-feedback">Please select a position!</div>
                                </div> --}}

                                <div class="col-md-3">
                                    <input class="form-control" type="text" name="nama_barang" placeholder="Nama Barang"
                                        required readonly>
                                    <div class="invalid-feedback">masukan nama barang!</div>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check freetext" name="free_text[]" id="freetext"
                                        autocomplete="off" value="freetext" required>
                                    <label class="btn btn-sm btn-outline-success col-md-3" onclick="addFreetext()"
                                        for="freetext">Free
                                        Text</label>
                                    <input type="radio" class="btn-check freetext" name="free_text[]" id="search-barang"
                                        autocomplete="off" value="master" required>
                                    <label class="btn btn-sm btn-outline-info col-md-3" onclick="searchBarang()"
                                        for="search-barang">Search</label>
                                    <div class="invalid-feedback mv-up">pilih jenis inputan!</div>
                                </div>
                            </div>


                            <div class="form-group row pt-0 mt-0">

                                <div class="col-md-5">
                                    <input class="form-control" type="text" name="keterangan" id="desk"
                                        placeholder="Keterangan" required>
                                    <div class="invalid-feedback">masukan keterangan barang!</div>
                                </div>
                                <div class="col-md-1 mx-md-0 px-md-0">
                                    <div class="form-button">
                                        <button onclick="tambahItem()" id="tambah"
                                            class="btn btn-success xs btn-flat text-white"><i class="fa fa-plus-circle"></i>
                                        </button>
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
                            <form action=" {{ route('store.all') }}" method="post" id="formsubmit">
                                @csrf
                                <input class="form-control" type="text" name="id_user_input" hidden
                                    value="{{ Auth::user()->id }}">
                                <input class="form-control" type="text" name="id_branch" hidden
                                    value="{{ $idBranch->id_branch }}">
                                <input class="form-control" type="text" name="id_department" hidden
                                    value="{{ $idDepartment->id_department }}">
                                <input class="form-control" type="text" name="deskripsi" hidden value="deskripsi">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white fw-bold">No</th>
                                            <th class="text-white fw-bold">Kode barang</th>
                                            <th class="text-white fw-bold">Nama barang</th>
                                            <th class="text-white fw-bold">Jumlah</th>
                                            <th class="text-white fw-bold">Keterangan</th>
                                            <th width="15%" class="text-white fw-bold"><i class="fa fa-cog"></i></th>
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
                console.log($('#zero_config tbody tr').length);
                if ($('#zero_config tbody tr').length == 0) {
                    alert('isi data terlebih dahulu!')
                } else {
                    $('#formsubmit').first().submit();
                }
            })


            $('.btnSelect').on('click', function() {
                let currentRow = $(this).closest("tr");
                let id_barang = currentRow.find("td:eq(0)").html();
                let kode_barang = currentRow.find("td:eq(1)").html();
                let nama_barang = currentRow.find("td:eq(2)").html();
                currentRow.find("td:eq(3) .btnSelect").prop('disabled', true);;

                if (id_barang && kode_barang && nama_barang) {
                    $('#zero_config > tbody:last-child').append(
                        '<tr><td><input type=text value=' + id_barang +
                        ' name=kode_barang[] readonly></td><td><input type=text value=' + kode_barang +
                        ' name=kode_barang[] readonly></td><td><input type=text value=' +
                        nama_barang +
                        ' name=nama_barang[] readonly></td><td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type=text name=jumlah[]></td><td><input type=text name=keterangan[]></td><td><span class="btn btn-xs btn-danger btn-flat remove-row"><i class="mdi mdi-delete"></i></span></td></tr>'
                    );
                }
            });

            // $("#zero_config tbody").on("click", "button", function() {
            //     $(this).closest("tr").remove();
            // });

            $("#zero_config tbody").on("click", ".remove-row", function() {
                $(this).closest("tr").remove();
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
            let kategori_cito = $('.kategori_cito:checked').val();
            let kategori_tipe = $('.form-group [name=kategori_tipe]').val();

            // console.log(kategori_cito, kategori_tipe);
            if (kategori_cito && kategori_tipe) {
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

            let namaBarang = $('.form-group [name=nama_barang]').val();
            let branch = $('.branch').val();
            let department = $('.department').val();
            let freetext = $('.freetext:checked').val();
            let kategori_cito = $('.kategori_cito:checked').val();
            let kodebarang = 'free-text';

            console.log(namaBarang, branch, kodebarang, freetext);

            if (namaBarang && freetext && kategori_cito) {
                $('#zero_config > tbody:last-child').append('<tr><td>1</td><td><input type=text value=' + kodebarang +
                    ' name=kode_barang[] readonly></td><td><input type=text value=' + namaBarang +
                    ' name=nama_barang[]></td><td><input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type=text name=jumlah[]></td><td><input type=text value=1 name=keterangan[]></td><td><button class="btn btn-xs btn-danger btn-flat"><i class="mdi mdi-delete"></i></button></td></tr><input name=input_tipe hidden type=text value=' +
                    freetext +
                    ' />'
                );
            }

        }
    </script>
@endpush
