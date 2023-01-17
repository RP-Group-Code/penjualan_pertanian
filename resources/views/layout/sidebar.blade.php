<aside class="main-sidebar sidebar-light-primary bg-light elevation-4">
    {{-- <a href="{{ url('/') }}" class="brand-link" style="height: 6rem;">
        <img src="img/rp_logo.png" alt="AdminLTE Logo" class="brand-image"
            style="min-height: 7rem; margin-top: -30px; margin-left: 2.5rem">
    </a> --}}

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">User Login</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="uil uil-dashboard"
                            style="color: #4f98eb; font-size: 26px; padding-top: 10px; margin-right: 10px"></i>
                        <p style="margin-bottom: 5px">
                            Dashboard
                            <i class="right fas fa-angle-left" style="margin-top: 10px"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-5">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link" style="width: 180px">
                                <p>Analisis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index2.html" class="nav-link" style="width: 180px; font-size: 14px">
                                <p>Management</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="uil uil-server-alt"
                            style="color: #4f98eb; font-size: 26px; padding-top: 10px; margin-right: 10px"></i>
                        <p style="margin-bottom: 5px">
                            Master Data
                            <i class="right fas fa-angle-left" style="margin-top: 10px"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-5">
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Warehouse
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-3">
                                <li class="nav-item">
                                    <a href="{{ route('gudangs.index') }}" class="nav-link" style="width: 155px">
                                        <p>Gudang Utama</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('gudangd.index') }}" class="nav-link" style="width: 155px">
                                        <p>Gudang Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('gudangr.index') }}" class="nav-link" style="width: 155px">
                                        <p>Gudang Retur</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Principal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Customer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link" style="width: 180px">
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="uil uil-invoice"
                            style="color: #4f98eb; font-size: 26px; padding-top: 10px; margin-right: 10px"></i>
                        <p style="margin-bottom: 5px">
                            Order
                            <i class="right fas fa-angle-left" style="margin-top: 10px"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-5">
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Order Sold
                                    <i class="right fas fa-angle-left"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview ml-3">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="width: 155px">
                                        <p>Credit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('penjualans.index') }}" class="nav-link" style="width: 155px">
                                        <p>Cash</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Order Retur
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Purchase
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="uil uil-chart-bar"
                            style="color: #4f98eb; font-size: 26px; padding-top: 10px; margin-right: 10px"></i>
                        <p style="margin-bottom: 5px">
                            Report
                            <i class="right fas fa-angle-left" style="margin-top: 10px"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ml-5">
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Report Pembelian
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Report Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="width: 180px">
                                <p>
                                    Raw Data Stok
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
        </nav>
    </div>
</aside>
