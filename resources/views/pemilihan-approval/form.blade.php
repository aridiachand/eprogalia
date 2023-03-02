<!-- Modal -->
{{-- modal use  --}}
<div class="modal fade" id="modal-pilih-vendor" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Error -->
                    <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">Cari Vendor</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" name="id_vendor" id="id_vendor"
                                style="width: 100%; height: 36px">
                                <option slk hidden value="0">Select</option>
                                @foreach ($vendor as $vd)
                                    <option data-nama="{{ $vd['nama_vendor'] }}" value="{{ $vd['id_vendor'] }}">
                                        {{ $vd['nama_vendor'] }}</option>
                                @endforeach
                                </optgroup>
                            </select>
                            <small class="text-success" style="cursor: pointer;"><a
                                    href="{{ route('vendor.index') }}">master vendor</a></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_kategori" class="col-sm-2 text-end control-label col-form-label">Tgl
                            Quotation</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control" id="datepicker-autoclose"
                                    name="tanggal_quotation" value="{{ date('d/m/Y') }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_kategori"
                            class="col-sm-2 text-end control-label col-form-label">Attachment</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='file' name='file' class="file form-control">
                            <!-- Error -->
                            <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <table id="zero_config" class="table table-bordered">
                            <thead class="bg-secondary">
                                <tr>
                                    <th width="3%" class="text-white fw-bold">No</th>
                                    <th width="10%" class="text-white fw-bold">Kode barang</th>
                                    <th class="text-white fw-bold">Nama barang</th>
                                    <th width="7%" class="text-white fw-bold">Satuan</th>
                                    <th width="10%" class="text-white fw-bold">Harga</th>
                                    <th width="5%" class="text-white fw-bold">Dsc %</th>
                                    <th width="6%" class="text-white fw-bold">Qty</th>
                                    <th width="13%" class="text-white fw-bold">Total</th>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; $subtotal = 0; ?>
                                @foreach ($permintaandetail as $pd)
                                    <tr class="{{ $pd->kode_barang }}">
                                        <td>{{ $no++ }}</td>
                                        {{-- <td hidden><input type="text" name="id_barang[]" class="dataidbarang bg-white w-100"
                                                value="{{ $pd->id_barang }}"></td> --}}
                                        <td><input type="text" name="kode_barang[]" class="form-control datakodebarang bg-white w-100"
                                                value="{{ $pd->kode_barang }}" disabled></td>
                                        <td><input type="text" name="nama_barang[]" class="form-control datanamabarang bg-white w-100"
                                                value="{{ $pd->nama_barang }}" disabled></td>
                                        <td><input type="text" name="nama_satuan_barang[]" class="form-control datanamasatuanbarang bg-white w-100"
                                                value="{{ $pd->nama_satuan_barang }}" disabled></td>
                                        {{-- <td>{{ $pd->nama_barang }}</td> --}}
                                        {{-- <td>{{ $pd->nama_satuan_barang }}</td> --}}

                                        <td><input type="text" name="harga_beli[]" class="datahargabeli bg-white w-100" value="{{ format_uang($pd->harga_beli) }}"></td>
                                        <td><input type="text" name="diskon_peritem[]" class="datadiskonperitem bg-white w-100" onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
                                        <td><input type="text" name="jumlah[]" style="bg-white" value="{{ $pd->jumlah }}" class="form-control datajumlah bg-white w-75" disabled></td>
                                        <td><input type="text" name="total[]" disabled style="bg-white" value="{{ format_uang($pd->subtotal) }}" class="form-control datatotal bg-white w-100"></td>
                                    </tr>
                                    <?php $subtotal = $subtotal+$pd->subtotal ?>
                                @endforeach
                            </tbody>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">Total</td>
                                <td><input type="text" name="total" style="bg-white" class="form-control" value="{{format_uang($subtotal) }}"></td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">Diskon</td>
                                <td><input type="text" name="diskon_nominal" style="bg-white" class="form-control" value=""></td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">Sub Total</td>
                                <td><input type="text" name="subtotal" disabled style="bg-white" class="form-control" value="{{format_uang($subtotal) }}"></td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">
                                        <input class="form-check-input" type="checkbox" name="checkedvat" value="" id="flexCheckChecked">  Vat</td>
                                <td><input type="text" name="vat" disabled style="bg-white" class="form-control" value=""></td>
                                {{-- if checketvat  --}}
                            </tr>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">Ongkir</td>
                                <td><input type="text" name="ongkir" style="bg-white" class="form-control" value=""></td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan=7 style="text-align: right;" class="align-middle">Grand Total</td>
                                <td><input type="text" name="grandtotal" disabled style="bg-white" class="form-control" value="{{format_uang($subtotal) }}"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group row">
                        <label for="nilai_harga" class="col-sm-2 text-end control-label col-form-label">Down
                            Payment</label>
                        <div class="col-sm-9">
                            <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                class="form-control" id="dp" name="dp" autofocus required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 text-end control-label col-form-label">TOP</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none dataidtop" name="id_top" id="id_top"
                                style="width: 100%; height: 36px">
                                <option hidden value="">Select</option>
                                @foreach ($top as $t)
                                    <option value="{{$t->id}}">{{$t->nama_top}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nilai_harga" class="col-sm-2 text-end control-label col-form-label">Ket
                            TOP</label>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                                <textarea class="form-control bg-white kettop" readonly id="keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="delivery_time" class="col-sm-2 text-end control-label col-form-label">Delivery Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control delivery_time" id="delivery_time" name="delivery_time" required />
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>


                </div>

                <input type="text" name="id_permintaan" hidden>
                <input type="text" name="id_permintaan_detail" hidden>
                <input type="text" name="kode_barang" hidden>
                <input type="text" name="nama_barang" hidden>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary">Simpan</button>
                    <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
