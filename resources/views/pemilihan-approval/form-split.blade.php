<!-- Modal -->
<div class="modal fade" id="modal-split" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="bg-secondary">
                                <tr>
                                    <th width="5%" class="text-white fw-bold">No</th>
                                    <th class="text-white fw-bold">Kode barang</th>
                                    <th class="text-white fw-bold">Nama barang</th>
                                    <th class="text-white fw-bold">Satuan</th>
                                    <th class="text-white fw-bold">Harga</th>
                                    <th class="text-white fw-bold">Qty</th>
                                    <th class="text-white fw-bold">Total</th>
                                    <th class="text-white fw-bold">Keterangan</th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-success text-white">Konfirm Split</button>
                    <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
