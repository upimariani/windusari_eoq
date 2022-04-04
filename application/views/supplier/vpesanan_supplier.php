<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Informasi Pesanan Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pesanan Masuk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Pesanan Masuk</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="pesanan table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Id Pemesanan</th>
                                        <th class="text-center">Tanggal Pesan</th>
                                        <th class="text-center">Konfirmasi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pesanan as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->id_pemesanan ?></td>
                                            <td class="text-center">
                                                <small class="text-success mr-1">
                                                    <i class="fas fa-arrow-up"></i>
                                                    <?= $value->tgl_pesan ?>
                                                </small>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                if ($value->status_order == '0') {
                                                    echo '<span class="badge badge-danger">Belum Bayar</span>';
                                                } else if ($value->status_order == '1') {
                                                    echo '<span class="badge badge-danger">Belum Bayar</span><br>';
                                                ?>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default<?= $value->id_pemesanan ?>">
                                                        <i class="fas fa-clipboard-check"></i>
                                                    </button>
                                                <?php
                                                } else if ($value->status_order == '2') {
                                                    echo '<span class="badge badge-warning">Sedang Diproses</span><br>';
                                                ?>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#kirim<?= $value->id_pemesanan ?>">
                                                        <i class="fas fa-truck-moving"></i>
                                                    </button>
                                                <?php
                                                } else if ($value->status_order == '3') {
                                                    echo '<span class="badge bg-olive">Dikirim</span>';
                                                } else if ($value->status_order == '4') {
                                                    echo '<span class="badge badge-success">Selesai</span>';
                                                }
                                                ?>

                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info" data-id="<?= $value->id_pemesanan ?>">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div id="data-pemesan" class="card-header border-0">
                            <h3 class="card-title">List Detail Pemesanan</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="list-detail">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($pesanan as $key => $value) {
    ?>

        <form action="<?= base_url('supplier/c_pemesanansupplier/konfirmasi/' . $value->id_pemesanan) ?>" method="POST">
            <div class="modal fade" id="modal-default<?= $value->id_pemesanan ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi Pemesanan </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda Yakin Mengkonfirmasi Pesanan <?= $value->id_pemesanan ?></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
    <?php
    }
    ?>
    <?php
    foreach ($pesanan as $key => $value) {
    ?>

        <form action="<?= base_url('supplier/c_pemesanansupplier/kirim/' . $value->id_pemesanan) ?>" method="POST">
            <div class="modal fade" id="kirim<?= $value->id_pemesanan ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Kirim Pesanan </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Kirim Pesanan <?= $value->id_pemesanan ?></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>
    <?php
    }
    ?>