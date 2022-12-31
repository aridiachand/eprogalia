<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a>
                </li>
                <li class="sidebar-item container">
                    <hr class="my-1 p-0">
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Master
                            Kategori </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('kategori.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Kategori </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('kategori.detail.store') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Kategori detail
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
                    <hr class="my-1 p-0">
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                            class="hide-menu">Permintaan</span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('permintaan.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Barang
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('form.permintaan.barang') }}" class="sidebar-link"><i
                                    class="mdi mdi-note-outline"></i><span class="hide-menu"> Tambah
                                </span></a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('approval.index') }}"
                        aria-expanded="false"><i class="mdi mdi-cart-plus"></i><span
                            class="hide-menu">Approval</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html"
                        aria-expanded="false"><i class="mdi mdi-file-pdf"></i><span class="hide-menu">Laporan</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
