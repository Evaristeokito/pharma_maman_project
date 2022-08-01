<!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2-pre
    </div>
    <strong>Copyright &copy; 2022-2023 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer> -->

 <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="plugins/select2/js/select2.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.OverlayScrollbars.min.js"></script>

<!-- validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- end validation -->

<!-- DataTable responsive js -->
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<!-- Datepicker js -->
<script src="plugins/datepicker/js/bootstrap-datepicker.js"></script>

<!-- IziModal -->
<script src="plugins/izimodal/modal/js/iziModal.min.js"></script>

<!-- IziToast -->
<script src="plugins/iziToast/dist/js/iziToast.min.js"></script>

<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
      bsCustomFileInput.init();

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    $(function () {
     // Summernote
     $('.textarea').summernote()
    });

    $('.datepicker').datepicker({
        format : 'yyyy-mm-dd',
        autoclose: true
    });

      $(".select2").select2();

        //Initialize Select2 Elements
        $(".select2bs4").select2({
        theme: "bootstrap4",
    });

});
</script>
