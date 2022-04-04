<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Data Barang</h1>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-receipt"></i> Tambah Data Barang
                    </button>
                    <a href="<?= base_url('admin/c_laporan/barang') ?>" type="button" class="btn btn-default">
                        <i class="far fa-file-alt"></i> Laporan Barang
                    </a>
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
                            <h3 class="card-title">Informasi Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Supplier</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Merek Barang</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang as $key => $value) {
                                    ?>

                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_toko ?></td>
                                            <td><?= $value->nama_barang ?></td>
                                            <td><?= $value->merek_barang ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn bg-olive" data-toggle="modal" data-target="#edit<?= $value->id_barang ?>">Edit</button>
                                                    <button type="button" class="btn bg-secondary" data-toggle="modal" data-target="#hapus<?= $value->id_barang ?>">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Supplier</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Merek Barang</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Action</th>
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
<form action="<?= base_url('admin/c_kelola_data/insert_barang') ?>" method="POST">
<?php
 $id_produk = strtoupper(random_string('alnum', 5));
?>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                                <select class="form-control" name="supplier" required>
                                    <option>---Pilih Supplier---</option>
                                    <?php
                                    foreach ($supplier as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_supplier ?>"><?= $value->nama_supplier ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Merek Barang</label>
                                <input type="text" name="merek" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Enter ..." required>
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

<?php
foreach ($barang as $key => $value) {
?>
    <form action="<?= base_url('admin/c_kelola_data/edit_barang/' . $value->id_barang) ?>" method="POST">
        <div class="modal fade" id="edit<?= $value->id_barang ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Supplier</label>
                                        <select class="form-control" name="supplier" required>
                                            <option>---Pilih Supplier---</option>
                                            <?php
                                            foreach ($supplier as $key) {
                                            ?>
                                                <option value="<?= $key->id_supplier ?>" <?php
                                                                                            if ($value->id_supplier == $key->id_supplier) {
                                                                                                echo 'selected';
                                                                                            }
                                                                                            ?>><?= $key->nama_toko ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" name="nama" value="<?= $value->nama_barang ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Merek Barang</label>
                                        <input type="text" name="merek" value="<?= $value->merek_barang ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
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
<?php
}
?>

<?php
foreach ($barang as $key => $value) {
?>
    <form action="<?= base_url('admin/c_kelola_data/hapus_barang/' . $value->id_barang) ?>" method="POST">
        <div class="modal fade" id="hapus<?= $value->id_barang ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Untuk Menghapus data <strong><?= $value->nama_barang ?></strong></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">OK</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>
    <!-- /.modal -->
<?php
}
?>