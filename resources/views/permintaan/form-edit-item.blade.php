<!-- Modal -->
<div class="modal fade" id="modal-edit-item" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <input type="text" name="id_permintaan_detail" hidden>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kode_barang" class="col-md-3 control-label col-form-label">Kode Barang</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="kode_barang" readonly />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-md-3 control-label col-form-label">Nama Barang</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="nama_barang" readonly />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga_beli" class="col-md-3 control-label col-form-label">Harga Beli</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="harga_beli" readonly />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-md-3 control-label col-form-label">Jumlah</label>
                        <div class="col-md-6">
                            <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text"
                                class="form-control" name="jumlah" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total" class="col-md-3 control-label col-form-label">Total</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="total" readonly />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-success">Simpan</button>
                    <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
