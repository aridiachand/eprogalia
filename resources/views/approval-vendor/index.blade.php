@extends('basetemplate.base')
@section('namepage')
    Approval Vendor
@endsection
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all"
                                type="button" role="tab" aria-controls="nav-all" aria-selected="true">Approval Vendor
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content border bg-light" id="nav-tabContent">

                        <div class="tab-pane fade active show" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                            <div class="table-responsive">
                                <table id="management_approve" class="table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white">No</th>
                                            {{-- <th width="15%" class="text-white">Tanggal</th> --}}
                                            <th class="text-white w-25">No SPB</th>
                                            <th class="text-white">Nama SPB</th>
                                            <th class="text-white">Peminta</th>
                                            <th class="text-white">Ket PBJ</th>
                                            @foreach ($listapproval as $la)
                                                <th width="3%" class="text-white bg-success">{{ $la->alias }}</th>
                                            @endforeach
                                            <th class="text-white text-center"><i class="fa fa-cog"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
{{--
                        <div class="tab-pane fade show" id="nav-approval" role="tabpanel"
                            aria-labelledby="nav-approval-tab">

                            <div class="table-responsive">
                                <table id="table-approval" class="table-approve table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white">No</th>
                                            <th class="text-white w-25">No PBJ</th>
                                            <th class="text-white w-25">Nama PBJ</th>
                                            <th class="text-white w-25">Cabang</th>
                                            <th class="text-white">Unit</th>
                                            <th class="text-white w-100">Peminta</th>
                                            <th class="text-white w-100">Ket PBJ</th>
                                            <th width="5%" class="text-white">Appv</th>
                                            <th width="5%" class="text-white"><i class="fa fa-cog"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div> --}}


                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('approval.form')
    @includeIf('approval.tglnote')
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
        /****************************************
         *       Basic Table                   *
         ****************************************/
        //  lengthChange,searching,paging,info
        let table;

        $(function() {
            table = $("#management_approve").DataTable({
                processing: true,
                autoWidth: false,
                lengthChange: true,
                searching: true,

                ajax: {
                    url: '{{ route('approvalvendor.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'joinsplit'
                    },
                    {
                        data: 'nama_permintaan'
                    },
                    {
                        data: 'nama_peminta'
                    },
                    {
                        data: 'deskripsi'
                    },
                    {
                        data: 'txp',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'gmh',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'fat',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'md',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'prsd',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'owner',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approve',
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

        function mApprove(kode_permintaan, split) {
            // alert(kode_permintaan);
            window.location = "{{ route('management.approve', '') }}" + "/" + kode_permintaan;
        }
    </script>
@endpush
