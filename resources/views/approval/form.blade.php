<!-- Modal -->
<div class="modal fade" id="modal-form" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div>
                        <h6>No PBJ :</h6>
                    </div>
                    <div>
                        <h5 class="modal-no-permintaan"></h5>
                    </div>
                    <h5 hidden class="modal-title" id="modal-formLabel"></h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="approval_detail_item" class="table table-striped table-bordered">
                        <thead class="bg-secondary">
                            <tr>
                                <th hidden class="text-white">No Permintaan</th>
                                <th class="text-white">ID Barang</th>
                                <th class="text-white">Nama Barang</th>
                                <th class="text-white">Qty</th>
                                <th class="text-white">Harga</th>
                                <th class="text-white">Keterangan</th>
                                <th class="text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_approval_detail_item">
                        </tbody>

                    </table>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="" class="mb-md-0"><span>Note</span></label>
                        <div class="col-sm-12">
                            <textarea class="notes form-control" id="notes"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-11">
                        <button id="submit_approval_detail_item_approve"
                            class='reject col-md-1 btn btn-sm btn-flat btn-success text-white'>Approve</button>
                        <button id="submit_approval_detail_item_hold"
                            class='reject col-md-1 btn btn-sm btn-flat btn-warning text-white'>Hold</button>
                        <button id="submit_approval_detail_item_reject"
                            class='reject col-md-1 btn btn-sm btn-flat btn-danger text-white'>Reject</button>
                    </div>
                </div>
                {{-- <div id="submit_approval_detail_item_reject">
                </div>
                <div id="submit_approval_detail_item_hold">
                </div>
                <div id="submit_approval_detail_item_approve">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
