<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-formLabel" aria-hidden="true">
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
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Kategori</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="id_kategori"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>

                                <option value="2">Non Medis</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Kategori Bagian</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="id_kategori_detail"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($kategori_detail as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Kategori Tipe</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="id_kategori_tipe"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($kategori_tipe as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" autofocus
                                required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk_barang" class="col-sm-2 text-end control-label col-form-label">Merk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="merk_barang" name="merk_barang" autofocus
                                required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Rutin</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="rutin"
                                style="width: 100%; height: 36px">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
