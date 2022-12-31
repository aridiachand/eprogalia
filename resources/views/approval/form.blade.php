<!-- Modal -->
<div class="modal fade" id="modal-form" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" style="height: 200px !important;">
                    <table id="zero_config_add" class="table table-striped table-bordered">
                        <thead class="bg-secondary">
                            <tr>
                                <th width="5%" class="text-white fw-bold">ID</th>
                                <th class="text-white fw-bold">Kode barang</th>
                                <th class="text-white fw-bold">Nama barang</th>
                                <th width="15%" class="text-white fw-bold"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($barang as $br)
                                <tr id="tr_barang">
                                    <td class="td_id_barang">{{ $br->id_barang }}</td>
                                    <td class="td_kode_barang">{{ $br->kode_barang }}</td>
                                    <td class="td_nama_barang">{{ $br->nama_barang }}</td>
                                    <td><button class="btn btn-success btn-flat xs btnSelect"><i
                                                class="fa fa-plus-circle text-white"></i></button></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
