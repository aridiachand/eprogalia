<!-- Modal -->
<div class="modal fade" id="modal-tglnote" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nama_kategori" class="control-label col-form-label">Tanggal</label>
                    <div class="col-sm-5">
                        <input type="text" class="tanggal form-control" readonly />

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="" class="mb-md-0"><span>Note</span></label>
                        <div class="col-sm-12">
                            <textarea class="notes form-control" id="note" disabled></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
