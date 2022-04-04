<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kelola Data User</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?>.</td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->username ?></td>
                                            <td><?= $value->password ?></td>
                                            <td class="text-center">
                                                <?php
                                                if ($value->level_user == '1') {
                                                    echo '<span class="badge bg-olive">Admin</span>';
                                                } else {
                                                    echo '<span class="badge bg-pink">Supplier</span>';
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-app btn-sm" data-toggle="modal" data-target="#modal-default<?= $value->id_user ?>">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a class="btn btn-app btn-sm" href="<?= base_url('admin/c_kelola_data/hapus_admin/' . $value->id_user) ?>">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-4">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Masukkan Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="<?= base_url('admin/c_kelola_data/admin') ?>" method="POST">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputError">
                                                Nama User*</label>
                                            <input type="text" name="nama" class="form-control  <?= form_error('nama'); ?>" id="inputError" placeholder="Enter ...">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputError">Username*</label>
                                            <input type="text" name="username" class="form-control" id="inputError" placeholder="Enter ...">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputError"> Password*</label>
                                            <input type="text" name="password" class="form-control" id="inputError" placeholder="Enter ...">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputError"> Password*</label>
                                            <select name="level_user" class="form-control">
                                                <option>---Pilih Level Member---</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Supplier</option>
                                            </select>
                                            <?= form_error('level_user', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">SAVE</button>
                            </form>
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
<?php
foreach ($admin as $key => $value) {
?>
    <form action="<?= base_url('admin/c_kelola_data/edit_admin/' . $value->id_user) ?>" method="POST">
        <div class="modal fade" id="modal-default<?= $value->id_user ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label class="col-form-label" for="inputError">
                                        Nama User*</label>
                                    <input type="text" name="nama" value="<?= $value->nama_user ?>" class="form-control" id="inputError" placeholder="Enter ...">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label class="col-form-label" for="inputError">Username*</label>
                                    <input type="text" name="username" value="<?= $value->username ?>" class="form-control" id="inputError" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputError"> Password*</label>
                                    <input type="text" name="password" value="<?= $value->password ?>" class="form-control" id="inputError" placeholder="Enter ...">

                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputError"> Password*</label>
                                    <select name="level_user" class="form-control">
                                        <option>---Pilih Level Member---</option>
                                        <option value="1" <?php if ($value->level_user == '1') {
                                                                echo 'selected';
                                                            } ?>>Admin</option>
                                        <option value="2" <?php if ($value->level_user == '2') {
                                                                echo 'selected';
                                                            } ?>>Supplier</option>
                                    </select>
                                    <?= form_error('level_user', '<small class="text-danger pl-3">', '</small>'); ?>
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
    </form>
    <!-- /.modal -->
<?php
}
?>