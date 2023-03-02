<!-- Modal -->
<div class="modal fade" id="modal-form-pmb-check" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_barang_permintaan" class="col-sm-12 text-start control-label col-form-label">Nama Barang Permintaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="id" name="id" hidden readonly />
                            <input type="text" class="form-control" id="nama_barang_permintaan" name="nama_barang_permintaan" autofocus
                                required readonly />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 text-start control-label col-form-label">Nama Barang (suggest logistik)</label>
                            <select class="col-sm-12 livesearch form-control form-select select2 form-select shadow-none" name="livesearch" style="width: 80% !important;"></select>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 text-start control-label col-form-label">Harga (suggest logistik)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="harga_barang_suggest" name="harga_barang_suggest"
                                    required />
                                <span class="help-block with-errors"></span>
                            </div>
                    </div>
                </div>


                <div class="modal-footer-center text-center container">
                        <button class="btn btn-sm col-sm-3 btn-flat btn-success float-start text-white simpan-suggest">Simpan Suggest</button>
                        {{-- <button class="btn btn-sm col-sm-6 btn-flat btn-info float-end ajukan-inventory">Ajukan Inventory Control</button> --}}
                </div>

                <div class="modal-footer">
                </div>

            </div>
    </div>
</div>
