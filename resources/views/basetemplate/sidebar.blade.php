<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-3">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item container">
                    <hr class="my-0 p-0">
                    {{-- {{ auth()->user()->level }} --}}
                </li>
                @if (auth()->user()->level == 0 or auth()->user()->level >= 5)
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Master User</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu"> Create User </span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu"> Role User
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Master
                                Kategori </span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('kategori.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu"> Medis / Non Medis </span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('kategori.detail.store') }}" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu"> Kategori
                                    </span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('barang.index') }}"
                            aria-expanded="false"><i class="mdi mdi-cube"></i></i><span class="hide-menu">Master
                                Barang</span></a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('vendor.index') }}"
                            aria-expanded="false"><i class="mdi mdi-truck-delivery"></i><span class="hide-menu">Master
                                Vendor</span></a>
                    </li>
                    <li class="sidebar-item container">
                        <hr class="my-0 p-0">
                    </li>
                @endif
                @if (auth()->user()->level <= 2 or auth()->user()->level == 99)
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('pengajuan-master-barang.index') }}" aria-expanded="false"><i
                                class="mdi mdi-truck-delivery"></i><span class="hide-menu"></span></a>
                    </li> --}}

                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="mdi mdi-cursor-pointer"></i><span class="hide-menu">Pengajuan Master Barang</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('pengajuan-master-barang.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu">Pengajuan</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('pengajuan-master-barang.listrequest.inv') }}" class="sidebar-link"><i
                                        class="mdi mdi-clipboard"></i><span class="hide-menu">Nama Dari Inventory</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item container">
                        <hr class="my-0 p-0">
                    </li>
                @endif
                @if (auth()->user()->level == 99 or auth()->user()->level == 0)
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><i class="mdi mdi-comment-account"></i><span
                                class="hide-menu">Permintaan</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('form.permintaan.barang') }}" class="sidebar-link"><i
                                        class="mdi mdi-comment-text"></i><span class="hide-menu"> Buat Permintaan
                                    </span></a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('permintaan.index') }}" class="sidebar-link"><i
                                        class="mdi mdi-comment-text"></i><span class="hide-menu"> List Permintaan
                                    </span></a>
                            </li>

                        </ul>
                    </li>
                @endif
                <li class="sidebar-item container">
                    <hr class="my-0 p-0">
                </li>
                @if (auth()->user()->level >= 2 or auth()->user()->level == 0)
                    @if (auth()->user()->level != 99)
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('approval.index') }}" aria-expanded="false"><i
                                class="mdi mdi-comment-check"></i><span class="hide-menu">Approval PBJ</span></a>
                    </li>
                    @endif
                @endif
                @if (auth()->user()->level >= 5 or auth()->user()->level == 0)
                    @if (auth()->user()->level >= 6 or auth()->user()->level == 0)
                        @if (auth()->user()->level != 99)
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                    aria-expanded="false"><i class="mdi mdi-cart"></i><span
                                        class="hide-menu">Procurement</span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="{{ route('pemilihan-approval.index') }}" class="sidebar-link"><i
                                                class="mdi mdi-group"></i><span class="hide-menu"> Grouping Vendor
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="{{ route('selectvendor') }}" class="sidebar-link"><i
                                                class="mdi mdi-cursor-pointer"></i><span class="hide-menu"> Select Vendor
                                            </span></a>
                                    </li>
                                    {{-- <li class="sidebar-item">
                                    <a href="#" class="sidebar-link"><i class="mdi mdi-file-check"></i><span
                                            class="hide-menu"> Approval Vendor
                                        </span></a>
                                </li> --}}
                                </ul>
                            </li>
                        @endif
                    @endif
                    @if (auth()->user()->level != 99)
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('approvalvendor.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-file-check"></i><span class="hide-menu">Approval Vendor
                                </span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('verification-vendor.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-file-check"></i><span class="hide-menu">Verification Vendor</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('approved-vendor.index') }}" aria-expanded="false"><i
                                    class="mdi mdi-briefcase-check"></i><span class="hide-menu">Approved
                                    Vendor</span></a>
                        </li>
                    @endif
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
