<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                        <label class="col-sm-4 text-end control-label col-form-label">Kategori</label>
                        <div class="col-sm-6">
                            <select class="select2 form-select shadow-none" name="id_kategori"
                                style="width: 100%; height: 36px">
                                <option>Select</option>
                                @foreach ($kategori as $kt)
                                    <option value="{{ $kt['id_kategori'] }}">{{ $kt['nama_kategori'] }}</option>
                                @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_kategori_detail"
                            class="col-sm-4 text-end control-label col-form-label">Kategori
                            detail</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama_kategori_detail"
                                name="nama_kategori_detail" autofocus required />
                            <span class="help-block with-errors"></span>
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
