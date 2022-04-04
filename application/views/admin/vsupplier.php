<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Data Supplier</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
                    </ol>
                </div>
            </div>
            <?php
            if ($this->session->userdata('pesan')) {
                echo ' <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-check"></i> Sukses!</h5>';
                echo $this->session->userdata('pesan');
                echo '</div>';
            }
            ?>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-store"></i> Tambah Data Supplier
            </button>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Nama Supplier</th>
                                        <th class="text-center">Nama Toko</th>
                                        <th class="text-center">Jenis Toko</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($supplier as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $value->id_supplier ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $value->id_supplier ?>">Hapus</button>
                                                </div>
                                            </td>
                                            <td><?= $value->nama_supplier ?></td>
                                            <td><?= $value->nama_toko ?></td>
                                            <td><?= $value->jenis_toko ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->no_telp ?></td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Nama Supplier</th>
                                        <th class="text-center">Nama Toko</th>
                                        <th class="text-center">Jenis Toko</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">No Telepon</th>
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
<form action="<?= base_url('admin/c_kelola_data/insert_supplier') ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Nama Supplier</label>
                                <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="toko" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Jenis Toko</label>
                                <input type="text" name="jenis" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" name="no_tlp" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Enter ..." required>
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
foreach ($supplier as $key => $value) {
?>
    <form action="<?= base_url('admin/c_kelola_data/edit_supplier/' . $value->id_supplier) ?>" method="POST">
        <div class="modal fade" id="edit<?= $value->id_supplier ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Perbaharui Data Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" name="nama" value="<?= $value->nama_supplier ?>" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="toko" value="<?= $value->nama_toko ?>" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Jenis Toko</label>
                                    <input type="text" name="jenis" value="<?= $value->jenis_toko ?>" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="text" name="no_tlp" value="<?= $value->no_telp ?>" class="form-control" placeholder="Enter ..." required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" placeholder="Enter ..." required>
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
foreach ($supplier as $key => $value) {
?>
    <form action="<?= base_url('admin/c_kelola_data/hapus_supplier/' . $value->id_supplier) ?>" method="POST">
        <div class="modal fade" id="hapus<?= $value->id_supplier ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda Yakin Menghapus Data Supplier <strong><?= $value->nama_supplier ?></strong></p>
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
        <!-- /.modal -->
    </form>
<?php
}
?>