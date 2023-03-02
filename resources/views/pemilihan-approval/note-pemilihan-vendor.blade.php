<!-- Modal -->
<div class="modal fade" id="modal-note-pemilihan-vendor" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-formLabel">Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Card -->
                <div class="card">

                    <div class="chat-box scrollable" style="height: 475px">
                        <!--chat Row -->
                        <ul class="chat-list">
                            <!--chat Row -->
                            <li class="chat-item">
                                <div class="chat-img">
                                    <img src="{{ asset('matrix-admin/assets/images/users/1.jpg') }}" alt="user" />
                                </div>
                                <div class="chat-content">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <div class="box bg-light-info">
                                        Lorem Ipsum is simply dummy text of the printing
                                        &amp; type setting industry.
                                    </div>
                                </div>
                                <div class="chat-time">10:56 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="chat-item">
                                <div class="chat-img">
                                    <img src="{{ asset('matrix-admin/assets/images/users/1.jpg') }}" alt="user" />
                                </div>
                                <div class="chat-content">
                                    <h6 class="font-medium">Bianca Doe</h6>
                                    <div class="box bg-light-info">
                                        It's Great opportunity to work.
                                    </div>
                                </div>
                                <div class="chat-time">10:57 am</div>
                            </li>
                            <!--chat Row -->
                            <li class="chat-item">
                                <div class="chat-img">
                                    <img src="{{ asset('matrix-admin/assets/images/users/1.jpg') }}" alt="user" />
                                </div>
                                <div class="chat-content">
                                    <h6 class="font-medium">Angelina Rhodes</h6>
                                    <div class="box bg-light-info">
                                        Well we have good budget for the project
                                    </div>
                                </div>
                                <div class="chat-time">11:00 am</div>
                            </li>
                            <!--chat Row -->
                        </ul>
                    </div>

                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-9">
                                <div class="input-field mt-0 mb-0">
                                    <textarea id="textarea1" placeholder="Type and enter" class="form-control border-0"></textarea>
                                </div>
                            </div>
                            <div class="col-3">
                                <a class="btn-circle btn-lg btn-cyan float-end text-white" href="javascript:void(0)"><i
                                        class="mdi mdi-send fs-3"></i></a>
                            </div>
                            <div class="col-12">
                                <button
                                    onClick="editItemForm(`{{ $pd->id_permintaan_detail }}`, `{{ $pd->kode_barang }}`, `{{ $pd->nama_barang }}`, `{{ $pd->harga_beli }}`, `{{ $pd->jumlah }}`, `{{ $pd->id_permintaan }}`)"
                                    class="btn btn-xs text-center btn-warning btn-flat"><i
                                        class="mdi mdi-close text-dark">Close Chat</i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->

            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
