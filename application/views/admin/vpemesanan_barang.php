<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemesanan Barang</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pemesanan Barang</li>
                    </ol>
                </div>
            </div>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-location-arrow"></i> Pesan Barang
            </button>
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
            <!-- TABLE: LATEST ORDERS -->
            <div class="row">
                <?php
                $qty = 0;
                foreach ($this->cart->contents() as $key => $value) {
                    $qty = $qty + $value['qty'];
                }
                if ($qty != 0) {
                ?>
                    <div class="col-lg-7">
                        <?php
                        echo form_open('admin/c_pemesanan/checkout');
                        ?>
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Informasi Cart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Id Produk</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Harga</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($this->cart->contents() as $value) :
                                            ?>
                                                <tr>
                                                    <td class="text-center"><a href="pages/examples/invoice.html"><?= $value['id'] ?></a></td>
                                                    <td class="text-center"><?= $value['name'] ?></td>
                                                    <td class="text-center"><span class="badge badge-success"><?= $value['qty'] ?></span></td>

                                                    <td class="text-center"><?= $value['netto'] ?></td>
                                                    <td class="text-center">
                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Rp. <?= number_format($value['price'], 0)  ?></div>
                                                    </td>
                                                    <td class="text-center"><a href="<?= base_url('admin/c_pemesanan/delete/' . $value['rowid']) ?>"><i class="fas fa-times"></i></a></td>
                                                </tr>
                                            <?php
                                                $i++;
                                            endforeach;
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total: <strong>Rp. <?= number_format($this->cart->total(), 0)  ?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php
                                    $i = 1;
                                    foreach ($this->cart->contents() as $items) {
                                        echo form_hidden('qty' . $i++, $items['qty']);
                                    }
                                    $id_pemesanan = date('Ymd') .  random_int(100, 9999);
                                    ?>
                                    <input type="hidden" name="id_pemesanan" value="<?= $id_pemesanan ?>">
                                    <input type="hidden" name="total_bayar" value="<?= $this->cart->total() ?>">
                                </div>
                                <!-- /.table-responsive -->
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-sm btn-info float-left">Order</button>

                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>

                <?php
                }
                ?>
                <div class="list_open col-lg-5">
                    <!-- PRODUCT LIST -->
                    <div id="open" class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Detail Pemesanan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul id="list_detail_pemesanan" class="products-list product-list-in-card pl-2 pr-2">



                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pemesanan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="pemesanan table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Id Pemesanan</th>
                                    <th class="text-center">Tanggal Pemesanan</th>
                                    <th class="text-center">Status Order</th>
                                    <th class="text-center">Total Bayar</th>
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
                                        <td class="text-center"><?= $value->tgl_pesan ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($value->status_order == '0') {
                                                echo '<span class="badge badge-danger">Belum Bayar</span>';
                                            } else if ($value->status_order == '1') {
                                                echo '<span class="badge badge-warning">Menunggu Konfirmasi</span>';
                                            } else if ($value->status_order == '2') {
                                                echo '<span class="badge bg-olive">Diproses</span>';
                                            } else if ($value->status_order == '3') {
                                                echo '<span class="badge bg-purple">Dikirim</span>';
                                            } else if ($value->status_order == '4') {
                                                echo '<span class="badge badge-success">Selesai</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">Rp. <?= number_format($value->total_bayar, 0)  ?></td>
                                        <td class="text-center"> <button type="button" id="detail" class="btn btn-default" data-idpemesanan="<?= $value->id_pemesanan ?>"><i class="fas fa-bars"></i></button>
                                            <?php
                                            if ($value->status_order == '0') {
                                            ?>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#bayar<?= $value->id_pemesanan ?>">
                                                    Bayar
                                                </button>
                                            <?php
                                            } else if ($value->status_order == '3') {
                                            ?>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#selesai<?= $value->id_pemesanan ?>">
                                                    Selesai
                                                </button>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Id Pemesanan</th>
                                    <th class="text-center">Tanggal Pemesanan</th>
                                    <th class="text-center">Status Order</th>
                                    <th class="text-center">Status Pembayaran</th>
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
<form action="<?= base_url('admin/c_pemesanan/pesan') ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="nama" name="name" type="hidden">
                                <input class="kg" name="kg" type="hidden">
                                <label>Nama Barang*</label>
                                <select name="pesan_barang" id="pesan_barang" class="form-control">
                                    <option>---Pilih Pesan Barang---</option>
                                    <?php
                                    foreach ($barang as $key => $value) {
                                    ?>
                                        <option value="<?= $value->id_barang ?>" data-price="<?= $value->harga ?>" data-harga="Rp. <?= number_format($value->harga, 0) ?>" data-kg="<?= $value->keterangan ?>" data-nama=<?= $value->nama_barang ?> data-supplier="<?= $value->nama_toko ?>"><?= $value->nama_barang ?> | <?= $value->merek_barang ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="nama" class="nama form-control">
                        <div class="col-sm-12">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" name="supplier" class="supplier form-control" placeholder="Enter ..." readonly>
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" name="kg" class="kg form-control" placeholder="Enter ..." readonly>
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="harga form-control" placeholder="Enter ..." readonly>
                                    <input type="hidden" name="harga" class="price form-control" placeholder="Enter ..." readonly>
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Pesan*</label>
                                <input type="text" name="jml" class="form-control" placeholder="Enter ..." required>
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
foreach ($pesanan as $key => $value) {
    echo form_open_multipart('admin/c_pemesanan/bayar')
?>
    <div class="modal fade" id="bayar<?= $value->id_pemesanan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Bukti Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Bukti Pembayaran*</label>
                    <input type="file" name="bayar" class="form-control">
                    <input type="hidden" name="id_pemesanan" value="<?= $value->id_pemesanan ?>" class="form-control">
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
<?php
    echo form_close();
}
?>
<?php
foreach ($pesanan as $key => $value) {
    echo form_open('admin/c_pemesanan/selesai/' . $value->id_pemesanan)
?>
    <div class="modal fade" id="selesai<?= $value->id_pemesanan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesanan Diterima</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Pesanan <strong><?= $value->id_pemesanan ?></strong> Sudah Diterima?</p>
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
<?php
    echo form_close();
}
?>