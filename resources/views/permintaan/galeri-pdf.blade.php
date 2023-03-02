<!-- Modal -->
<div class="modal fade" id="modal-galeri-pdf" aria-labelledby="modal-formLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post') --}}

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-formLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="form-group row col-md-12">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <!-- Form -->
                                <div class="form-group col-md-8">
                                    <label for="SPB" class="mb-md-0"><span>No Permintaan</span></label>
                                    <input type="text" class="form-control" id="spb_upload" disabled />
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="name">File <span
                                            class="required">*</span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type='file' id="file" name='file' class="form-control">
                                        <!-- Error -->
                                        <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
                                    </div>
                                </div>
                                {{-- <div class="form-group col-md-12">
                                    <label for="nama_file" class="mb-md-0"><span>Nama File</span></label>
                                    <input type="text" class="form-control" id="nama_file" name="nama_file" />
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input type="button" id="submit" value='Submit' class='btn btn-success'>
                                    </div>
                                </div>

                                <!-- Response message -->
                                <div class="alert displaynone responseMsg" id="responseMsg"></div>

                                <!-- File preview -->
                                <div id="filepreview" class="displaynone">
                                    <img src="" class="displaynone" with="200px" height="500px"><br>
                                    <a href="#" class="displaynone">Click Here..</a>
                                </div>

                                {{-- <div id="fileexistpreview">
                                    <ol style="list-style-type: decimal;">
                                        <li><a href="">sdasdasd</a></li>
                                        <li>asdasd</li>
                                        <li>asdasd</li>
                                    </ol>

                                </div> --}}
                                <div class="table-responsive">
                                    <table id="fileexistpreview" class="table table-striped table-bordered">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th class="text-white fw-bold">Kode barang</th>
                                                <th width="10%" class="text-white fw-bold"><i class="fa fa-cog"></i>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
