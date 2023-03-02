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
                        <label class="col-sm-2 switch text-end control-label col-form-label">Pre Master</label>
                        <div class="col-sm-5 ">
                                <input type="checkbox" id="togBtn" name="premasterbarang">
                                <div class="slider"></div>
                            </div>
                        </label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Golongan Barang</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="id_kategori"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                <option value="2">Logistik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Kategori Barang</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="id_kategori_barang"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($kategori_barang as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Commodity</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="commodity"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($commodity as $cm)
                                    <option value="{{ $cm->id }}">{{ $cm->keterangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Material group</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="material_group"
                                style="width: 100%; height: 36px" required>
                                <option selected disabled value="">Select</option>
                                @foreach ($material_group as $mt)
                                    <option value="{{ $mt->id }}">{{ $mt->bentuk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-sm-2 text-end control-label col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_barang" placeholder='' name="nama_barang" autofocus
                                required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hna" class="col-sm-2 text-end control-label col-form-label">HNA</label>
                        <div class="col-sm-2">
                            <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text" class="form-control" id="hna" name="hna" autofocus
                                required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hnaplusppn" class="col-sm-2 text-end control-label col-form-label">HNA + PPN</label>
                        <div class="col-sm-2">
                            <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" type="text"
                                class="form-control" id="hnaplusppn" name="hnaplusppn" autofocus required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Rutin</label>
                        <div class="col-sm-5">
                            <select class="select2 form-select shadow-none" name="rutin"
                                style="width: 100%; height: 36px">
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                                </optgroup>
                            </select>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
