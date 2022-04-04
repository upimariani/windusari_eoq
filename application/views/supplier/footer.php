<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard2.js"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

    });
</script>
<script>
    $('.pesanan tbody').on('click', 'button', function() {
        console.log($(this).attr("data-id"));
        $.ajax({
            url: '<?= base_url() ?>supplier/c_pemesanansupplier/detail_order/' + $(this).attr("data-id"),
            dataType: 'json',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function(data, textStatus, jQxhr) {
                $('#list-detail').html("");
                $('#data-pemesan').html("");
                $('#data-pemesan').append("<h3 class=\"card-title\">List Detail Pemesanan " + data.pemesanan.id_pemesanan + "</h3>")
                console.log(data.detail.length);
                $no = 1;
                for (var i = 0; i < data.detail.length; i++) {
                    console.log(data.detail.length);
                    $('#list-detail').append("<tr><td>" + $no++ + ".</td><td>" + data.detail[i].nama_barang + "|" + data.detail[i].merek_barang + "| " + data.detail[i].keterangan + "</td><td><small class=\"text-success mr-1\"><i class=\"fas fa-arrow-up\"></i>" + data.detail[i].qty + "</small></td><td>Rp. " + data.detail[i].qty * data.detail[i].harga + "</td></tr>");
                }
                $('.list_open').slideDown('slow');
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
</script>
</body>

</html>