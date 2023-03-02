@extends('basetemplate.base')
@section('namepage')
    Approval
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
                            <button onClick="window.location.reload();" class="nav-link active" id="nav-all-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab"
                                aria-controls="nav-all" aria-selected="true">Semua</button>
                            @if (Auth::user()->level == 2)
                                <button onclick="getDataApprove('manager_peminta','Manager Peminta')" class="nav-link"
                                    id="nav-approval-tab" data-bs-toggle="tab" data-bs-target="#nav-approval" type="button"
                                    role="tab" aria-controls="nav-approval" aria-selected="true">Manager
                                    Peminta</button>
                                <button onclick="getDataApprove('technical_expert','Technical Expert')" class="nav-link"
                                    id="nav-approval-tab" data-bs-toggle="tab" data-bs-target="#nav-approval" type="button"
                                    role="tab" aria-controls="nav-approval" aria-selected="false">Technical
                                    Expert</button>
                            @endif
                            @if (Auth::user()->level == 3)
                                <button onclick="getDataApprove('manager_keuangan_unit','Manager Keuangan Unit')"
                                    class="nav-link" id="nav-approval-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-approval" type="button" role="tab"
                                    aria-controls="nav-approval" aria-selected="false">Manager Keuangan
                                    Unit</button>
                            @endif
                            @if (Auth::user()->level == 4)
                                <button onclick="getDataApprove('direktur_rs','Direktur Rumah Sakit')" class="nav-link"
                                    id="nav-approval-tab" data-bs-toggle="tab" data-bs-target="#nav-approval" type="button"
                                    role="tab" aria-controls="nav-approval" aria-selected="false">Direktur
                                    RS</button>
                            @endif
                            @if (Auth::user()->level == 5)
                                <button onclick="getDataApprove('technical_expert','Technical Expert')" class="nav-link"
                                    id="nav-approval-tab" data-bs-toggle="tab" data-bs-target="#nav-approval" type="button"
                                    role="tab" aria-controls="nav-approval" aria-selected="false">Technical
                                    Expert</button>
                            @endif
                            @if (Auth::user()->level == 6)
                                <button onclick="getDataApprove('gm_ho','GM HO')" class="nav-link" id="nav-approval-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-approval" type="button" role="tab"
                                    aria-controls="nav-approval" aria-selected="false">General Manager Holding</button>
                            @endif
                            @if (Auth::user()->level == 7)
                                <button onclick="getDataApprove('gm_fat','GM FAT')" class="nav-link" id="nav-approval-tab"
                                    data-bs-toggle="tab" data-bs-target="#nav-approval" type="button" role="tab"
                                    aria-controls="nav-approval" aria-selected="false">General Manager Finance and
                                    Tax</button>
                            @endif

                        </div>
                    </nav>
                    <div class="tab-content border bg-light" id="nav-tabContent">
                        {{-- semua  --}}
                        {{-- {{ Auth::user()->level }} --}}
                        <div class="tab-pane fade active show" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                            <div class="table-responsive mt-3">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white">No</th>
                                            <th width="15%" class="text-white">Tanggal</th>
                                            <th class="text-white w-25">No SPB</th>
                                            <th class="text-white w-50">Nama SPB</th>
                                            <th class="text-white">MP</th>
                                            <th class="text-white">MKU</th>
                                            <th class="text-white">DRS</th>
                                            <th class="text-white">TXP</th>
                                            <th class="text-white">GMH</th>
                                            <th class="text-white">FAT</th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="nav-approval" role="tabpanel"
                            aria-labelledby="nav-approval-tab">

                            <div class="table-responsive">
                                <table id="table-approval" class="table-approve table table-striped table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white">No</th>
                                            <th width="50%" class="text-white">No PBJ</th>
                                            <th class="text-white w-25">Nama PBJ</th>
                                            <th class="text-white w-10">Cabang</th>
                                            <th class="text-white">Unit</th>
                                            <th class="text-white" hidden>Peminta</th>
                                            <th class="text-white">Ket PBJ</th>
                                            <th width="5%" class="text-white">Appv</th>
                                            <th width="5%" class="text-white text-center"><i class="fa fa-cog"></i>
                                            </th>
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
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
    </div>
    @includeIf('approval.form')
    @includeIf('approval.tglnote')
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('matrix-admin/assets/extra-libs/multicheck/multicheck.css') }}" />
    <link href="{{ asset('matrix-admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="{{ asset('matrix-admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
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

        // $('#nav-tabContent tab-pane').on('click', function() {
        //     alert(123);
        // });
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
                    url: '{{ route('approval.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 't_permintaan'
                    },
                    {
                        data: 'kode_permintaan'
                    },
                    {
                        data: 'nama_permintaan'
                    },
                    {
                        data: 'approved_manager_peminta',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approved_manager_keuangan_unit',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approved_direktur_rs',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approved_technical_expert',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approved_gm_ho',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'approved_gm_fat',
                        searchable: false,
                        sortable: false
                    },
                    // {
                    //     data: 'approved_manager_peminta',
                    //     searchable: false,
                    //     sortable: false
                    // },

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

        function tglNotesView(id, approval, tanggal, notes) {
            $('#modal-tglnote').modal('show');
            $('#modal-tglnote .modal-title').text(id);
            $('#modal-tglnote .tanggal').val(tanggal);
            $('#modal-tglnote .notes').val(notes);

        }



        // detail masuk approval
        function approvalDetailData(id) {
            console.log($('#modal-form .modal-title').text());
            $('#modal-form').modal('show');

            $.get(id, function(response) {
                console.log(id, response);
                $('#modal-form .modal-no-permintaan').text(response['data'][0]['kode_permintaan']);
                createRows(response);
            })
        }

        function createRows(response) {
            var len = 0;
            $('#approval_detail_item > tbody').empty(); // Empty <tbody>
            // $("#submit_approval_detail_item_approve").empty(); // Empty <tbody>
            // $("#submit_approval_detail_item_reject").empty(); // Empty <tbody>
            // $("#submit_approval_detail_item_hold").empty(); // Empty <tbody>

            if (response['data'] != null) {
                len = response['data'].length;
            }

            var sumtotal = 0;
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    var id = response['data'][i].id;
                    var kode_permintaan = response['data'][i].kode_permintaan;
                    var kode_barang = response['data'][i].kode_barang;
                    var nama_barang = response['data'][i].nama_barang;
                    var jumlah = response['data'][i].jumlah;
                    var harga = response['data'][i].harga_beli;
                    var deskripsi = response['data'][i].deskripsi;
                    var idpermintaandetail = response['data'][i].id_permintaan_detail;

                    var tr_str = "<tr>" +
                        "<td hidden>" + kode_permintaan + "</td>" +
                        "<td>" + kode_barang + "</td>" +
                        "<td>" + nama_barang + "</td>" +
                        "<td contenteditable=true onkeypress='return event.charCode >= 48 && event.charCode <= 57'>" +
                        jumlah + "</td>" +
                        "<td>" + harga + "</td>" +
                        "<td>" + deskripsi + "</td>" +
                        "<td><button onclick='updateItem(`reject`," + idpermintaandetail +
                        ")' class='btn btn-xs text-center btn-danger btn-flat fw-bold'><i class='mdi mdi-close text-white fw-bold'></i></button></td>" +
                        "</tr>";

                    var button_approve =
                        "<button class='col-md-1 btn btn-sm btn-flat btn-success text-white'>Approve</button>";

                    var button_reject =
                        "<button  class='reject col-md-1 btn btn-sm btn-flat btn-danger text-white'>Reject</button>";

                    var button_hold =
                        "<button  class='hold col-md-1 btn btn-sm btn-flat btn-warning text-white'>Hold</button>";

                    $("#approval_detail_item > tbody").append(tr_str);

                    var sum = harga;
                    sumtotal = sum + sumtotal;


                }

                var tr_total = "<tr>" +
                    "<td hidden></td>" +
                    "<td></td>" +
                    "<td></td>" +
                    "<td class='fw-bold'>Total</td>" +
                    "<td class='fw-bold'>" + sumtotal + "</td>" +
                    "<td></td>" +
                    "<td></td>" +
                    "</tr>";
                $("#approval_detail_item > tbody").append(tr_total);
                // $("#submit_approval_detail_item_approve").append(button_approve);
                // $("#submit_approval_detail_item_reject").append(button_reject);
                // $("#submit_approval_detail_item_hold").append(button_hold);
            } else {
                var tr_str = "<tr>" +
                    "<td align='center' colspan='6'>No record found.</td>" +
                    "</tr>";

                $("#approval_detail_item > tbody").append(tr_str);
            }
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

        // $("#table-manager-peminta").DataTable().destroy();
        //         var tableId = "#table-manager-peminta";
        // // clear first
        // if(tableObj!=null){
        // tableObj.clear();
        // tableObj.destroy();
        // }

        // //2nd empty html
        // $(tableId + " tbody").empty();
        // $(tableId + " thead").empty();

        // //3rd reCreate Datatable object
        // tableObj= $(tableId).DataTable({
        // ...
        // });

        function getDataApprove(id, levelapprove = null) {

            var tableId = $(".table-approve");
            $('#modal-form .modal-title').text(levelapprove);

            // $('.nav-link').removeClass('active');

            if (tableId.DataTable()) {
                tableId.DataTable().destroy();
            }

            table = tableId.DataTable({
                processing: true,
                autoWidth: false,
                lengthChange: true,
                searching: true,

                ajax: {
                    url: "{{ route('approval.data') }}" + '/' + id,
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'kode_permintaan'
                    },
                    {
                        data: 'nama_permintaan'
                    },
                    {
                        data: 'nama_branch'
                    },
                    {
                        data: 'nama_department'
                    },
                    // {
                    //     data: 'nama_user_input'
                    // },
                    {
                        data: 'deskripsi'
                    },
                    {
                        data: 'status',
                        searchable: true,
                        sortable: false
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });

        }

        function approvePermintaanItem() {
            // var currentRow = $(this).closest("tr");
            var currentRow = $('#tbody_approval_detail_item tr');
            if (currentRow) {
                var col1 = currentRow.find("td:eq(0)").text();
                var col2 = currentRow.find("td:eq(1)").text();
                var col3 = currentRow.find("td:eq(2)").text();
                var col4 = currentRow.find("td:eq(3)").text();
                var col5 = currentRow.find("td:eq(4)").text();
                console.log(col1, col2, col3, col4);
            }
            //  var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
            //  var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
            //  var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
            //  var data=col1+"\n"+col2+"\n"+col3;

            //  alert(data);
        }

        $('#submit_approval_detail_item_approve').click(function(e) {
            e.preventDefault();

            if (!$('#modal-form #notes').val()) {
                alert('input note terlebih dahulu');
                return;
            }

            var currentRow = $('#tbody_approval_detail_item tr');
            if (currentRow) {
                let title = $('#modal-form .modal-title').text();
                let token = $("meta[name='csrf-token']").attr("content");
                let notes = $('#modal-form #notes').val();

                var kode_permintaan = [];
                var kode_barang = [];
                var nama_barang = [];
                var jumlah = [];
                var deskripsi = [];

                currentRow.find("td:eq(0)").each(function() {
                    kode_permintaan.push($(this).text());
                });

                currentRow.find("td:eq(1)").each(function() {
                    kode_barang.push($(this).text());
                });

                currentRow.find("td:eq(2)").each(function() {
                    nama_barang.push($(this).text());
                });

                currentRow.find("td:eq(3)").each(function() {
                    jumlah.push($(this).text());
                });

                currentRow.find("td:eq(4)").each(function() {
                    deskripsi.push($(this).text());
                });

                //ajax
                $.ajax({
                    url: '{{ route('approved.data.save') }}',
                    type: "POST",
                    cache: false,
                    data: {
                        "title": title,
                        "kode_permintaan": kode_permintaan,
                        "kode_barang": kode_barang,
                        "nama_barang": nama_barang,
                        "jumlah": jumlah,
                        "deskripsi": deskripsi,
                        "_token": token,
                        "action": 1,
                        "notes": notes
                    },
                    success: function(response) {
                        console.log(response);
                        table.ajax.reload();
                        $('#modal-form').modal('hide');
                        alert(response.message);
                    },
                    error: function(error) {
                        console.log(error, 1);
                        alert(error.message);
                        // if (error.responseJSON.title[0]) {
                        //     $('#alert-title').removeClass('d-none');
                        //     $('#alert-title').addClass('d-block');
                        //     $('#alert-title').html(error.responseJSON.title[0]);
                        // }

                        // if (error.responseJSON.content[0]) {

                        //     $('#alert-content').removeClass('d-none');
                        //     $('#alert-content').addClass('d-block');
                        //     $('#alert-content').html(error.responseJSON.content[0]);
                        // }

                    }

                });
            } else {
                alert('data tidak ada');
                return;
            }
        });

        $('#submit_approval_detail_item_reject').click(function(e) {
            e.preventDefault();

            if (!$('#modal-form #notes').val()) {
                alert('input note terlebih dahulu');
                return;
            }

            var currentRow = $('#tbody_approval_detail_item tr');
            if (currentRow) {
                let title = $('#modal-form .modal-title').text();
                let token = $("meta[name='csrf-token']").attr("content");
                let notes = $('#modal-form #notes').val();

                var kode_permintaan = [];
                var kode_barang = [];
                var nama_barang = [];
                var jumlah = [];
                var deskripsi = [];

                currentRow.find("td:eq(0)").each(function() {
                    kode_permintaan.push($(this).text());
                });

                currentRow.find("td:eq(1)").each(function() {
                    kode_barang.push($(this).text());
                });

                currentRow.find("td:eq(2)").each(function() {
                    nama_barang.push($(this).text());
                });

                currentRow.find("td:eq(3)").each(function() {
                    jumlah.push($(this).text());
                });

                currentRow.find("td:eq(4)").each(function() {
                    deskripsi.push($(this).text());
                });

                //ajax
                $.ajax({
                    url: '{{ route('approved.data.save') }}',
                    type: "POST",
                    cache: false,
                    data: {
                        "title": title,
                        "kode_permintaan": kode_permintaan,
                        "kode_barang": kode_barang,
                        "nama_barang": nama_barang,
                        "jumlah": jumlah,
                        "deskripsi": deskripsi,
                        "_token": token,
                        "action": 2,
                        "notes": notes
                    },
                    success: function(response) {
                        console.log(response);
                        table.ajax.reload();
                        $('#modal-form').modal('hide');
                        alert(response.message);
                    },
                    error: function(error) {
                        console.log(error, 1);

                        // if (error.responseJSON.title[0]) {
                        //     $('#alert-title').removeClass('d-none');
                        //     $('#alert-title').addClass('d-block');
                        //     $('#alert-title').html(error.responseJSON.title[0]);
                        // }

                        // if (error.responseJSON.content[0]) {

                        //     $('#alert-content').removeClass('d-none');
                        //     $('#alert-content').addClass('d-block');
                        //     $('#alert-content').html(error.responseJSON.content[0]);
                        // }

                    }

                });
            } else {
                alert('data tidak ada');
                return;
            }
        });

        $('#submit_approval_detail_item_hold').click(function(e) {
            e.preventDefault();

            if (!$('#modal-form #notes').val()) {
                alert('input note terlebih dahulu');
                return;
            }

            var currentRow = $('#tbody_approval_detail_item tr');
            if (currentRow) {
                let title = $('#modal-form .modal-title').text();
                let token = $("meta[name='csrf-token']").attr("content");
                let notes = $('#modal-form #notes').val();

                var kode_permintaan = [];
                var kode_barang = [];
                var nama_barang = [];
                var jumlah = [];
                var deskripsi = [];

                currentRow.find("td:eq(0)").each(function() {
                    kode_permintaan.push($(this).text());
                });

                currentRow.find("td:eq(1)").each(function() {
                    kode_barang.push($(this).text());
                });

                currentRow.find("td:eq(2)").each(function() {
                    nama_barang.push($(this).text());
                });

                currentRow.find("td:eq(3)").each(function() {
                    jumlah.push($(this).text());
                });

                currentRow.find("td:eq(4)").each(function() {
                    deskripsi.push($(this).text());
                });

                //ajax
                $.ajax({
                    url: '{{ route('approved.data.save') }}',
                    type: "POST",
                    cache: false,
                    data: {
                        "title": title,
                        "kode_permintaan": kode_permintaan,
                        "kode_barang": kode_barang,
                        "nama_barang": nama_barang,
                        "jumlah": jumlah,
                        "deskripsi": deskripsi,
                        "_token": token,
                        "action": 3,
                        "notes": notes
                    },
                    success: function(response) {
                        console.log(response);
                        table.ajax.reload();
                        $('#modal-form').modal('hide');
                        alert(response.message);
                        // Swal.fire({
                        //     type: 'success',
                        //     icon: 'success',
                        //     title: `${response.message}`,
                        //     showConfirmButton: false,
                        //     timer: 3000
                        // });
                    },
                    error: function(error) {
                        console.log(error, 1);

                        // if (error.responseJSON.title[0]) {
                        //     $('#alert-title').removeClass('d-none');
                        //     $('#alert-title').addClass('d-block');
                        //     $('#alert-title').html(error.responseJSON.title[0]);
                        // }

                        // if (error.responseJSON.content[0]) {

                        //     $('#alert-content').removeClass('d-none');
                        //     $('#alert-content').addClass('d-block');
                        //     $('#alert-content').html(error.responseJSON.content[0]);
                        // }

                    }

                });
            } else {
                alert('data tidak ada');
                return;
            }
        });

        function updateItem(proses, iddetailitem) {
            // alert(proses + iddetailitem);
            if (proses == 'reject') {
                var action = 2;
                var currentRow = $('#tbody_approval_detail_item tr');
                if (currentRow) {
                    let title = $('#modal-form .modal-title').text();
                    let token = $("meta[name='csrf-token']").attr("content");
                    let notes = $('#modal-form #notes').val();
                    // var kode_permintaan = [];
                    //     var kode_barang = [];
                    //     var nama_barang = [];
                    //     var jumlah = [];
                    //     var deskripsi = [];

                    //     currentRow.find("td:eq(0)").each(function() {
                    //         kode_permintaan.push($(this).text());
                    //     });

                    //     currentRow.find("td:eq(1)").each(function() {
                    //         kode_barang.push($(this).text());
                    //     });

                    //     currentRow.find("td:eq(2)").each(function() {
                    //         nama_barang.push($(this).text());
                    //     });

                    //     currentRow.find("td:eq(3)").each(function() {
                    //         jumlah.push($(this).text());
                    //     });

                    //     currentRow.find("td:eq(4)").each(function() {
                    //         deskripsi.push($(this).text());
                    //     });

                    //     //ajax
                    $.ajax({
                        url: '{{ route('approval.detaildata.update') }}',
                        type: "POST",
                        cache: false,
                        data: {
                            "title": title,
                            "_token": token,
                            "action": action,
                            "notes": notes,
                            "id_permintaan_item": iddetailitem,
                            "id_user_approve_reject": {{ Auth::user()->id }}
                        },
                        success: function(response) {
                            console.log(response);
                            table.ajax.reload();
                            // $('#modal-form').modal('hide');
                            alert(response.message);
                        },
                        error: function(error) {
                            console.log(error, 1);

                            // if (error.responseJSON.title[0]) {
                            //     $('#alert-title').removeClass('d-none');
                            //     $('#alert-title').addClass('d-block');
                            //     $('#alert-title').html(error.responseJSON.title[0]);
                            // }

                            // if (error.responseJSON.content[0]) {

                            //     $('#alert-content').removeClass('d-none');
                            //     $('#alert-content').addClass('d-block');
                            //     $('#alert-content').html(error.responseJSON.content[0]);
                            // }

                        }

                    });
                } else {
                    alert('data tidak ada');
                    return;
                }

            }

        }
    </script>
@endpush
