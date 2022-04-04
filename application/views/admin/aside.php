<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Windu Sari</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/c_dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_dashboard') {
                                                                                        echo 'active';
                                                                                    }  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>DASHBOARD</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_kelola_data') {
                                                        echo 'menu-open';
                                                    }  ?>">
                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_kelola_data') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="fas fa-table nav-icon"></i>
                        <p>
                            DATA MASTER
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_kelola_data/admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_kelola_data' && $this->uri->segment(3) == 'admin') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_kelola_data/supplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_kelola_data' && $this->uri->segment(3) == 'supplier') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_kelola_data/barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_kelola_data' && $this->uri->segment(3) == 'barang') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/c_perencanaan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_perencanaan') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                        <i class="fas fa-hourglass-half nav-icon"></i>
                        <p>PERENCANAAN</p>
                    </a>
                </li>
                <li class="nav-header">Barang Masuk dan Keluar</li>
                <li class="nav-item has-treeview  <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_barang') {
                                                        echo 'menu-open';
                                                    }  ?>">
                    <a href="#" class="nav-link  <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_barang') {
                                                        echo 'active';
                                                    }  ?>">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            BARANG
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_barang/barang_masuk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_barang' && $this->uri->segment(3) == 'barang_masuk') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/c_barang/barang_keluar') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_barang' && $this->uri->segment(3) == 'barang_keluar') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/c_pemesanan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'c_pemesanan') {
                                                                                        echo 'active';
                                                                                    }  ?>">
                        <i class="fas fa-paste nav-icon"></i>
                        <p>PEMESANAN BARANG</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('c_login/logout') ?>" class="nav-link">
                        <i class="fas fa-hand-point-left nav-icon"></i>
                        <p>LogOut</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>