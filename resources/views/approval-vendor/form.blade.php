<!-- Modal -->
<div class="modal fade" id="modal-form-management" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div>
                        {{-- <h6>No PBJ :</h6> --}}
                    </div>
                    <div>
                        {{-- <h5 class="modal-no-permintaan"></h5> --}}
                        <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="approval_detail_item" class="table table-striped table-bordered">
                        <thead class="bg-secondary">
                            <tr>
                                <th class="text-white py-4">#</th>
                                <th class="text-white py-4">Vendor</th>
                                <th width="5%" class="text-white py-4">Attachment</th>
                                <th class="text-white py-4">Nilai (Rp)</th>
                                <th width="8%" class="text-white py-4">DP (%)</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_approval_detail_item">
                            @foreach ($pemilihanvendor as $pv)
                                <tr>
                                    <td>
                                        <div class="row">
                                            <label class="customcheckbox col-3 mx-2">
                                                <input autocomplete="off" type="radio" class="checked_vendor"
                                                    name="checked_vendor" value="{{ $pv->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $pv->nama_vendor }}</td>
                                    <td><a href="{{ $pv->file_path }}" target="_blank">view</a></td>
                                    <td>{{ format_uang($pv->nilai_harga) }}</td>
                                    <td>{{ $pv->down_payment }}</td>
                                    {{-- <td>{{ $pv->selected_technical_expert == 1 ? 'checked' : 'gak' }}</td> --}}
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="" class="mb-md-0"><span>Note</span></label>
                        <div class="col-sm-12">
                            <textarea class="notes form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-11">
                        <button onclick="updateSelected()"
                            class='reject col-md-1 btn btn-sm btn-flat btn-success text-white'>Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
