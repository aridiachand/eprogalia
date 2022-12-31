@extends('basetemplate.base')
@section('namepage')
    Permintaan
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
                        <button onclick="window.location = '{{ url('permintaan/form-permintaan-barang') }}'"
                            class="btn btn-success xs btn-flat text-white"><i class="fa fa-plus-circle"></i>
                            Tambah</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th width="5%" class="text-white fw-bold">No</th>
                                        <th class="text-white fw-bold">Entity</th>
                                        <th class="text-white fw-bold">Tanggal</th>
                                        <th class="text-white fw-bold">Kode</th>
                                        <th class="text-white fw-bold">Unit</th>
                                        <th class="text-white fw-bold">Petugas</th>
                                        <th class="text-white fw-bold">Status</th>
                                        <th width="15%" class="text-white fw-bold"><i class="fa fa-cog"></i></th>
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
    @includeIf('permintaan.form-permintaan-detail')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
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
            table = $("#zero_config").DataTable({
                processing: true,
                autoWidth: false,
                lengthChange: true,
                searching: true,

                ajax: {
                    url: '{{ route('permintaan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nama_branch'
                    },
                    {
                        data: 'tanggal_permintaan'
                    },
                    {
                        data: 'kode_permintaan'
                    },
                    {
                        data: 'nama_department'
                    },
                    {
                        data: 'nama_user_input'
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

            $('#modal-form').on('submit', function(e) {
                if (!e.preventDefault()) {
                    $.ajax({
                            url: $('#modal-form form').attr('action'),
                            type: 'post',
                            data: $('#modal-form form').serialize(),
                        })
                        .done((response) => {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                        })
                        .fail((errors) => {
                            alert('Tidak dapat menyimpan data');
                            return;
                        });
                }
            })
        });

        function addForm(url) {
            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Tambah Kategori');

            $('#modal-form form')[0].reset();
            $('#modal-form form').attr('action', url);
            $('#modal-form form [name=_method]').val('post');
            $('#modal-form form [name=nama_kategori]').val();
        }

        function detailData(url) {


            $('#modal-form').modal('show');
            $('#modal-form .modal-title').text('Detail Data');

            table = $("#zero_config_detail").DataTable({
                processing: true,
                autoWidth: false,
                paging: true,
                searching: true,

                ajax: {
                    url: url,
                },
                columns: [{
                        data: 'checklist',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_barang'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'jumlah'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },

                ]
            });

            $("#zero_config_detail").DataTable().destroy();
            // $.get(url)
            //     .done((response) => {
            //         console.log(response);
            //     })
            //     .fail((errors) => {
            //         console.log(errors);
            //         alert('Tidak dapat menampilkan data');
            //         return;
            //     });
        }

        function editForm(url) {
            // console.log(url);
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
                        console.log(response);
                        table.ajax.reload();
                        alert('Berhasil di hapus');
                    })
                    .fail((errors) => {
                        console.log(errors);
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
            $('#modal-form').modal('show');
            $('.form-group [name=nama_barang]').prop('readonly', true);
        }
    </script>
@endpush
