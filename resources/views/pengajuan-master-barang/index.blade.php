@extends('basetemplate.base')
@section('namepage')
    Pengajuan Master Barang
@endsection
@section('content')
    <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="box">
                        <button onclick="addForm('{{ route('pengajuan-master-barang.store') }}')"
                            class="btn btn-success xs btn-flat text-white"><i class="fa fa-plus-circle"></i>
                            Pengajuan</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config_pengajuan_master_barang" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">No PMB</th>
                                        <th>Pengajuan Master Barang</th>
                                        <th>Nama Barang (suggest)</th>
                                        <th width="8%">Status</th>
                                        <th width="8%"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('pengajuan-master-barang.form')
    @includeIf('pengajuan-master-barang.form-pmb-update')
    @includeIf('pengajuan-master-barang.form-pmb-check')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
    href="{{ asset('matrix-admin/assets/libs/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
    <style>
        .select2-selection__arrow {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
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

        $("#modal-form-pmb-check .select2").select2();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    </script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        let table;

        $(function() {
            table = $("#zero_config_pengajuan_master_barang").DataTable({
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('pengajuan-master-barang.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'no_pengajuan'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'suggest_nama_barang'
                    },
                    {
                        data: 'status',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

            $('#modal-form-pmb').on('submit', function(e) {
                if (!e.preventDefault()) {
                    // alert('simpan');
                    console.log($('#modal-form-pmb form').serialize());
                    $.ajax({
                            url: $('#modal-form-pmb form').attr('action'),
                            type: 'post',
                            data: $('#modal-form-pmb form').serialize(),
                        })
                        .done((response) => {
                            console.log(response);
                            $('#modal-form-pmb').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            console.log(errors);
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            })
        });

        function addForm(url) {
            // alert(url);
            $('#modal-form-pmb').modal('show');
            $('#modal-form-pmb .modal-title').text('Pengajuan Master Barang');

            $('#modal-form-pmb form')[0].reset();
            $('#modal-form-pmb form').attr('action', url);
            $('#modal-form form [name=_method]').val('post');
            // $('#modal-form form [name=nama_kategori]').val();
        }

        function editForm(url) {
            $('#modal-form-pmb-update').modal('show');
            $('#modal-form-pmb-update .modal-title').text('Suggest Master');

            // $('#modal-form-pmb-update form')[0].reset();
            // $('#modal-form-pmb-update form').attr('action', url);
            // $('#modal-form-pmb-update form [name=_method]').val('put');
            // $('#modal-form-pmb-update form [name=nama_kategori]').val();

            $.get(url)
                .done((response) => {
                    console.log(response);
                    // $('#modal-form form [name=nama_kategori]').val(response.nama_kategori);
                })
                .fail((errors) => {
                    console.log(errors);
                    alert('Tidak dapat menampilkan data');
                    return;
                });
        }



        function checkForm(url) {
            $('#modal-form-pmb-check').modal('show');
            $('#modal-form-pmb-check .modal-title').text('Check Master');

            $.get(url)
            .done((response) => {
                console.log(response);
                    $('#modal-form-pmb-check #nama_barang_permintaan').val(response.nama_barang);
                    $('#modal-form-pmb-check #id').val(response.id);
                })
                .fail((errors) => {
                    console.log(errors);
                    alert('Tidak dapat menampilkan data');
                    return;
                });


        }

        $('#modal-form-pmb-check .ajukan-inventory').on('click', function(e) {
                if (!e.preventDefault()) {

                    var id = $('#modal-form-pmb-check [name=id]').val();
                    var idbarangsuggest = $('#modal-form-pmb-check [name=livesearch]').val();
                    var nambarangsuggest = $('#modal-form-pmb-check [name=livesearch]').text();

                    // console.log(nambarangsuggest);

                    var hargabarangsuggest = $('#modal-form-pmb-check [name=harga_barang_suggest]').val();

                    $.ajax({
                            url: '{{ route('pengajuan-master-barang.toinventory.request') }}',
                            type: 'post',
                            cache: false,
                            data: {
                                "id":id,
                                "idbarangsuggest":idbarangsuggest,
                                "nambarangsuggest":nambarangsuggest,
                                "hargabarangsuggest":hargabarangsuggest,
                                "status":1,
                                "_token": CSRF_TOKEN
                            },
                        })
                        .done((response) => {
                            console.log(response);
                            // $('#modal-form-pmb').modal('hide');
                            // table.ajax.reload();
                        })
                        .fail((errors) => {
                            console.log(errors);
                            // alert('Tidak dapat menyimpan data');
                            // return;
                        });
                }
        });

        $('#modal-form-pmb-check .simpan-suggest').on('click', function(e) {
                if (!e.preventDefault()) {

                    var id = $('#modal-form-pmb-check [name=id]').val();
                    var idbarangsuggest = $('#modal-form-pmb-check [name=livesearch]').val();
                    var nambarangsuggest = $('#modal-form-pmb-check [name=livesearch]').text();

                    // console.log(nambarangsuggest);

                    var hargabarangsuggest = $('#modal-form-pmb-check [name=harga_barang_suggest]').val();

                    $.ajax({
                            url: '{{ route('pengajuan-master-barang.toinventory.simpan') }}',
                            type: 'post',
                            cache: false,
                            data: {
                                "id":id,
                                "idbarangsuggest":idbarangsuggest,
                                "nambarangsuggest":nambarangsuggest,
                                "hargabarangsuggest":hargabarangsuggest,
                                "status":1,
                                "_token": CSRF_TOKEN
                            },
                        })
                        .done((response) => {
                            console.log(response);
                            // $('#modal-form-pmb').modal('hide');
                            // table.ajax.reload();
                        })
                        .fail((errors) => {
                            console.log(errors);
                            // alert('Tidak dapat menyimpan data');
                            // return;
                        });
                }
        });





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

        function reqToInventory(url){
            // alert(url);
            if (confirm('Forward to inventory?')) {
                $.post(url, {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'post'
                    })
                    .done((response) => {
                        console.log(response);
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        console.log(errors);
                        return;
                    });
            }
        }


        $('#modal-form-pmb-check .livesearch').select2({
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
    </script>
@endpush
