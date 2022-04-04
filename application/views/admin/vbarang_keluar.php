<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Barang Keluar</h1>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-arrow-up"></i> Tambah Data Barang Keluar
                    </button>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Barang</li>
                    </ol>

                </div>
            </div>
            <?php
            if ($this->session->userdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo $this->session->userdata('pesan');
                echo '</div>';
            }
            ?>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-arrow-alt-circle-up"></i> Informasi Barang Keluar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tanggal Produksi</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang_keluar as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td class="text-center"><?= $value->nama_barang ?></td>
                                            <td class="text-center"><?= $value->tgl_produksi ?></td>
                                            <td class="text-center"><?= $value->jumlah ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tanggal Produksi</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<form action="<?= base_url('admin/c_barang/insert_keluar') ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Barang Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Barang*</label>
                                <select name="barang" id="barang" class="form-control">
                                    <option>---Pilih Barang Keluar---</option>
                                    <?php
                                    foreach ($barang as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_barang_masuk ?>" data-max=<?= $value->stok ?> data-stok="<?= $value->stok ?>"><?= $value->nama_barang ?> | Stok Tgl. <?= $value->tgl_masuk ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Stok Sebelumnya</label>
                                <input type="text" name="stok_sebelumnya" class="stok form-control" placeholder="Enter ..." readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <?php
                                    $hari_ini = date('Y-m-d');
                                    ?>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control" value="<?= $hari_ini ?>" readonly />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Produksi*</label>
                                <input type="number" name="jml" min="1" max="" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
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