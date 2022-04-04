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

<!-- PAGE SCRIPTS -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard2.js"></script>

<!-- DataTables -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    console.log = function() {}
    $("#barang").on('change', function() {

        $(".stok").html($(this).find(':selected').attr('data-stok'));
        $(".stok").val($(this).find(':selected').attr('data-stok'));

        $('input[type=number]').attr('max', $('option:selected', this).data('max'));

    });
</script>
<!-- <script>
    console.log = function() {}
    $("#data-barang").on('change', function() {

        $(".nama_barang").html($(this).find(':selected').attr('data-barang'));
        $(".nama_barang").val($(this).find(':selected').attr('data-barang'));

        $(".merek").html($(this).find(':selected').attr('data-merek'));
        $(".merek").val($(this).find(':selected').attr('data-merek'));

        $(".supplier").html($(this).find(':selected').attr('data-supplier'));
        $(".supplier").val($(this).find(':selected').attr('data-supplier'));

        $(".d").html($(this).find(':selected').attr('data-d'));
        $(".d").val($(this).find(':selected').attr('data-d'));

        $(".h").html($(this).find(':selected').attr('data-h'));
        $(".h").val($(this).find(':selected').attr('data-h'));

        $(".lt").html($(this).find(':selected').attr('data-lt'));
        $(".lt").val($(this).find(':selected').attr('data-lt'));

        $(".ss").html($(this).find(':selected').attr('data-ss'));
        $(".ss").val($(this).find(':selected').attr('data-ss'));

        $(".au").html($(this).find(':selected').attr('data-au'));
        $(".au").val($(this).find(':selected').attr('data-au'));

        $(".s").html($(this).find(':selected').attr('data-s'));
        $(".s").val($(this).find(':selected').attr('data-s'));

    });
</script> -->
<script>
    console.log = function() {}
    $("#pesan_barang").on('change', function() {
        $(".supplier").html($(this).find(':selected').attr('data-supplier'));
        $(".supplier").val($(this).find(':selected').attr('data-supplier'));

        $(".nama").html($(this).find(':selected').attr('data-nama'));
        $(".nama").val($(this).find(':selected').attr('data-nama'));

        $(".kg").html($(this).find(':selected').attr('data-kg'));
        $(".kg").val($(this).find(':selected').attr('data-kg'));

        $(".harga").html($(this).find(':selected').attr('data-harga'));
        $(".harga").val($(this).find(':selected').attr('data-harga'));

        $(".price").html($(this).find(':selected').attr('data-price'));
        $(".price").val($(this).find(':selected').attr('data-price'));
    });
</script>
<script>
    $('.pemesanan tbody').on('click', 'button', function() {
        console.log($(this).attr("data-idpemesanan"));
        $.ajax({
            url: '<?= base_url() ?>admin/c_pemesanan/detail_order/' + $(this).attr("data-idpemesanan"),
            dataType: 'json',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function(data, textStatus, jQxhr) {
                $('#list_detail_pemesanan').html("");
                console.log(data.detail.length);
                for (var i = 0; i < data.detail.length; i++) {
                    console.log(data.detail.length);
                    $('#list_detail_pemesanan').append("<li class=\"item\"><div class=\"product-info\"><a href=\"javascript:void(0)\" class=\"product-title\">" + data.detail[i].nama_barang + "<span class=\"badge badge-danger float-right\"> Rp. " + data.detail[i].harga + " </span></a><span class=\"product-description\">Qty: " + data.detail[i].qty + "</span></div></li></ul>  <div class=\"card-footer text-center\"><a href=\"javascript:void(0)\" class=\"uppercase\">Total: Rp." + data.detail[i].qty * data.detail[i].harga + "</a></div>");
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