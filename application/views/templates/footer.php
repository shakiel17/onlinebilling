<footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="#">Online Billing System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url('design/assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('design/assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('design/assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- ChartJS -->
<script src="<?=base_url('design/assets/plugins/chart.js/Chart.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('design/assets/plugins/sparklines/sparkline.js');?>"></script>
<!-- JQVMap -->
<script src="<?=base_url('design/assets/plugins/jqvmap/jquery.vmap.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/jqvmap/maps/jquery.vmap.usa.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('design/assets/plugins/jquery-knob/jquery.knob.min.js');?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url('design/assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('design/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!-- Summernote -->
<script src="<?=base_url('design/assets/plugins/summernote/summernote-bs4.min.js');?>"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('design/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('design/assets/dist/js/adminlte.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url('design/assets/dist/js/demo.js');?>"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('design/assets/dist/js/pages/dashboard.js');?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('design/assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/jszip/jszip.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/pdfmake/pdfmake.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/pdfmake/vfs_fonts.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-buttons/js/buttons.html5.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-buttons/js/buttons.print.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/datatables-buttons/js/buttons.colVis.min.js');?>"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $('.addStaff').click(function(){
    document.getElementById('staff_id').value='';
    document.getElementById('staff_name').value='';
    document.getElementById('staff_status').value='';
  });
  $('.editStaff').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('staff_id').value=id[0];
    document.getElementById('staff_name').value=id[1];
    document.getElementById('staff_status').value=id[2];
  });
  $('.manageAccount').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('staff_account_id').value=id[0];
    document.getElementById('staff_username').value=id[1];
    document.getElementById('staff_password').value=id[2];
  });
   $('.addCourse').click(function(){
    document.getElementById('course_id').value='';
    document.getElementById('course_name').value='';
    document.getElementById('course_amount').value='';
  });
  $('.editCourse').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('course_id').value=id[0];
    document.getElementById('course_name').value=id[1];
    document.getElementById('course_amount').value=id[2];
  });

  $('.addGrade').click(function(){
    document.getElementById('grade_id').value='';
    document.getElementById('grade_name').value='';
    document.getElementById('grade_amount').value='';
  });
  $('.editGrade').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('grade_id').value=id[0];
    document.getElementById('grade_name').value=id[1];
    document.getElementById('grade_amount').value=id[2];
  });
</script>
</body>
</html>