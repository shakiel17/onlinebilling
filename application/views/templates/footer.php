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

<script src="<?=base_url('design/assets/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?=base_url('design/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js');?>"></script>
<!-- InputMask -->
<script src="<?=base_url('design/assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?=base_url('design/assets/plugins/inputmask/jquery.inputmask.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?=base_url('design/assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url('design/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('design/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!-- Bootstrap Switch -->
<script src="<?=base_url('design/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>"></script>
<!-- BS-Stepper -->
<script src="<?=base_url('design/assets/plugins/bs-stepper/js/bs-stepper.min.js');?>"></script>
<!-- dropzonejs -->
<script src="<?=base_url('design/assets/plugins/dropzone/min/dropzone.min.js');?>"></script>

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

     $("#example11").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example12").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
  $('.addStudentCollege').click(function(){
    document.getElementById('student_college_id').value='';
    document.getElementById('st_col_id').value='';
    document.getElementById('st_col_lastname').value='';
    document.getElementById('st_col_firstname').value='';
    document.getElementById('st_col_middlename').value='';
    document.getElementById('st_col_address').value='';
    document.getElementById('st_col_gender').value='';
    document.getElementById('st_col_birthdate').value='';
    document.getElementById('st_col_course').value='';
  });
  $('.editStudentCollege').click(function(){
    var id=$(this).data('id');
    document.getElementById('student_college_id').value = id;
    $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchStudentDetails',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){                        
            document.getElementById('st_col_id').value=response[0]['student_id'];
            document.getElementById('st_col_lastname').value=response[0]['student_lastname'];
            document.getElementById('st_col_firstname').value=response[0]['student_firstname'];
            document.getElementById('st_col_middlename').value=response[0]['student_middlename'];
            document.getElementById('st_col_address').value=response[0]['student_address'];
            document.getElementById('st_col_gender').value=response[0]['student_gender'];
            document.getElementById('st_col_birthdate').value=response[0]['student_birthdate'];
            document.getElementById('st_col_course').value=response[0]['student_course'];
          }
        });    
  });

  $('.addStudentHigh').click(function(){
    document.getElementById('student_high_id').value='';
    document.getElementById('st_high_id').value='';
    document.getElementById('st_high_lastname').value='';
    document.getElementById('st_high_firstname').value='';
    document.getElementById('st_high_middlename').value='';
    document.getElementById('st_high_address').value='';
    document.getElementById('st_high_gender').value='';
    document.getElementById('st_high_birthdate').value='';
    document.getElementById('st_high_course').value='';
  });
  $('.editStudentHigh').click(function(){
    var id=$(this).data('id');
    $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchStudentDetails',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){
            document.getElementById('student_high_id').value=id;
            document.getElementById('st_high_id').value=response[0]['student_id'];
            document.getElementById('st_high_lastname').value=response[0]['student_lastname'];
            document.getElementById('st_high_firstname').value=response[0]['student_firstname'];
            document.getElementById('st_high_middlename').value=response[0]['student_middlename'];
            document.getElementById('st_high_address').value=response[0]['student_address'];
            document.getElementById('st_high_gender').value=response[0]['student_gender'];
            document.getElementById('st_high_birthdate').value=response[0]['student_birthdate'];
            document.getElementById('st_high_course').value=response[0]['student_course'];
          }
        });    
  });

  $('.viewStudentDetails').click(function(){
    var id=$(this).data('id');
    $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchStudentDetails',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){
            document.getElementById('student_details').innerHTML="Student ID: " + response[0]['student_id'] + "<br>Name: " + response[0]['student_lastname'] + ", " + response[0]['student_firstname'] + " " + response[0]['student_middlename'] + 
            "<br> Address: " + response[0]['student_address'] + "<br>Gender: " + response[0]['student_gender'] + "<br> Birthdate: " + response[0]['student_birthdate'];            
          }
        });    
  });

  $('.editAccountCollege').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('account_college_id').value=id[0];
    document.getElementById('account_course').value=id[1];
    document.getElementById('account_college_unitcost').value=id[2];
    document.getElementById('account_units').value=id[3];
    document.getElementById('account_semester').value=id[4];
    document.getElementById('account_syear').value=id[5];
  });
  $('.editAccountHigh').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    document.getElementById('account_hs_id').value=id[0];
    document.getElementById('account_grade').value=id[1];
    document.getElementById('account_hs_unitcost').value=id[2];   
    document.getElementById('account_syear_hs').value=id[3];   
  });

  $('.postPayment').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');
    $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchBillingDetails',
          type:'post',
          data: {
            id: id[0],
            type: id[1]
          },
          dataType:'json',
          success: function(response){
            document.getElementById('pay_refno').value=id[0];
            document.getElementById('pay_type').value=id[1];
            document.getElementById('pay_amount').value=response[0]['amount'];
            document.getElementById('pay_student_id').value=response[0]['student_id'];
          }
        });    
  });  
  $('.viewPayment').click(function(){
    var data=$(this).data('id');
    var id=data.split('_');    
    var refno=id[0];
    var sc_id=id[1];
    var st_id=id[2];    
    $.ajax({
          url:'<?=base_url();?>index.php/pages/fetchPaymentDetails',
          type:'post',
          data: {
            id: refno,
            st_id: st_id,
            sc_id: sc_id
          },
          dataType:'json',
          success: function(response){            
            //alert(response.length);
             document.getElementById('payment_details').innerHTML = "Transaction #:";
            // for(var i=0; i < response.length; i++){          
            //   document.getElementById('paymentDetails').innerHTML = "Transaction #: " + response[i]['remarks'];
            // }
          }
        });    
  });

  $('.sendInvoice').click(function(){
    var id=$(this).data('id');    
    document.getElementById('invoice_id').value=id;
  });
</script>
</body>
</html>