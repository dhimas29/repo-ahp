<footer class="main-footer">
    <strong>Copyright &copy; 2021 Faqih.</strong>
    All rights reserved.
    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Created By : </b> Faqih
    </div> -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        // CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        //     mode: "htmlmixed",
        //     theme: "monokai"
        // });
    })
</script>
<script type="text/javascript">
    $("#kriteria").change(function() {
        var id_kriteria = $("#kriteria").val();
        window.location.href = "?page=perbandingan_alternatif&id=" + id_kriteria;
    });

    $('input[name="kriteria[C1]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C1').prop('hidden', false);
        } else {
            $('#lain_C1').prop('hidden', true);
        }
    });

    $('input[name="kriteria[C2]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C2').prop('hidden', false);
        } else {
            $('#lain_C2').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C3]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C3').prop('hidden', false);
        } else {
            $('#lain_C3').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C4]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C4').prop('hidden', false);
        } else {
            $('#lain_C4').prop('hidden', true);
        }
    });
    $('input[name="kriteria[C5]"]').click(function() {
        if ($(this).attr("id") == "Lainnya") {
            $('#lain_C5').prop('hidden', false);
        } else {
            $('#lain_C5').prop('hidden', true);
        }
    });
</script>

</body>

</html>