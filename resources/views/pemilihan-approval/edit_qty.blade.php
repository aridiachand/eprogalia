<!-- Modal -->
<div class="modal fade" id="modal-edit-qty" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="modal-formLabel">Modal title</h5> --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Error -->
                    <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

                    <div class="form-group row">
                        <div class="card-body p-0 m-0">
                            <div class="table-responsive">
                                <input class="form-control" type="text" name="id_user_input" hidden
                                    value="{{ Auth::user()->id }}">
                                <input class="form-control" type="text" name="deskripsi" id="spbdeskripsi" hidden>
                                <input class="form-control" type="text" name="prioritas" id="prioritas" hidden>
                                {{-- @php
                                    $ctotnilai = 0;
                                @endphp
                                @foreach ($listbarang as $lbb)
                                    @php
                                        $ctotnilai = (intval($lbb->nilai_harga)*intval($lbb->qty)) + $ctotnilai;
                                    @endphp
                                @endforeach
                                {{$ctotnilai}} --}}
                                <table id="zero_config" class="table table-bordered">
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th width="5%" class="text-white fw-bold">No</th>
                                            <th class="text-white fw-bold">Kode barang</th>
                                            <th class="text-white fw-bold">Nama barang</th>
                                            <th width="10%" class="text-white fw-bold">Satuan</th>
                                            <th width="10%" class="text-white fw-bold">Harga</th>
                                            <th width="10%" class="text-white fw-bold">Qty</th>
                                            <th class="text-white fw-bold">Total</th>
                                            {{-- <th class="text-white fw-bold">Keterangan</th> --}}
                                            {{-- <th width="10%" class="text-white fw-bold"><i class="fa fa-cog"></i> --}}
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($permintaandetail as $pd)
                                            <tr class="{{ $pd->kode_barang }}">
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pd->kode_barang }}</td>
                                                <td>{{ $pd->nama_barang }}</td>
                                                <td>{{ $pd->nama_satuan_barang }}</td>
                                                <td>{{ format_uang($pd->harga_beli) }}</td>
                                                <td width="10%"><input type="text" class="form-input col-5" name="updateqty[]" value="{{ $pd->jumlah }}" ></td>
                                                <td>{{ format_uang($pd->subtotal) }}</td>
                                                {{-- <td>{{ $pd->deskripsi }}</td> --}}
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td width="10%"><input type="text" class="fw-bold form-input col-12 " value="grand total" disabled ></td>
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="100%"></td>
                                    </tr>

                                </table>

                            </div>
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
