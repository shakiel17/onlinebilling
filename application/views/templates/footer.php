 <!-- footer content -->
        <footer>
          <!-- <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div> -->
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url('design/assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
   <script src="<?=base_url('design/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('design/assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('design/assets/vendors/nprogress/nprogress.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js');?>"></script>
    <!-- iCheck -->
	<script src="<?=base_url('design/assets/vendors/iCheck/icheck.min.js');?>"></script>
    <!-- Chart.js -->
    <script src="<?=base_url('design/assets/vendors/Chart.js/dist/Chart.min.js');?>"></script>
    <!-- jQuery Sparklines -->
    <script src="<?=base_url('design/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
    <!-- Flot -->
    <script src="<?=base_url('design/assets/vendors/Flot/jquery.flot.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/Flot/jquery.flot.pie.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/Flot/jquery.flot.time.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/Flot/jquery.flot.stack.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/Flot/jquery.flot.resize.js');?>"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url('design/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/flot-spline/js/jquery.flot.spline.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/flot.curvedlines/curvedLines.js');?>"></script>
    <!-- DateJS -->
    <script src="<?=base_url('design/assets/vendors/DateJS/build/date.js');?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url('design/assets/vendors/moment/min/moment.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?=base_url('design/assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/jquery.hotkeys/jquery.hotkeys.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/google-code-prettify/src/prettify.js');?>"></script>
    <!-- jQuery Tags Input -->
    <script src="<?=base_url('design/assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js');?>"></script>
    <!-- Switchery -->
    <script src="<?=base_url('design/assets/vendors/switchery/dist/switchery.min.js');?>"></script>
    <!-- Select2 -->
    <script src="<?=base_url('design/assets/vendors/select2/dist/js/select2.full.min.js');?>"></script>
    <!-- Parsley -->
    <script src="<?=base_url('design/assets/vendors/parsleyjs/dist/parsley.min.js');?>"></script>
    <!-- Autosize -->
    <script src="<?=base_url('design/assets/vendors/autosize/dist/autosize.min.js');?>"></script>
    <!-- jQuery autocomplete -->
    <script src="<?=base_url('design/assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js');?>"></script>
    <!-- starrr -->
    <script src="<?=base_url('design/assets/vendors/starrr/dist/starrr.js');?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('design/assets/build/js/custom.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-buttons/js/buttons.print.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/jszip/dist/jszip.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/pdfmake/build/pdfmake.min.js');?>"></script>
    <script src="<?=base_url('design/assets/vendors/pdfmake/build/vfs_fonts.js');?>"></script>
    <script>
      function betAmount(amount){
        document.getElementById('bet_amount').value=amount;
      }
      //$(document).ready(function(){
        $(".bet_amount").click(function(){
          var amount=document.getElementById('bet_amount').value;          
          //alert(amount);
          if(amount > 0){
            document.getElementById('btnBetAmount').disabled = false;
          }else{
            document.getElementById('btnBetAmount').disabled = true;
          }
        });

        $("#bet_amount").change(function(){
          var amount=document.getElementById('bet_amount').value;          
          //alert(amount);
          if(amount > 0){
            document.getElementById('btnBetAmount').disabled = false;
          }else{
            document.getElementById('btnBetAmount').disabled = true;
          }
        });
      //});
      $('.editUser').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('user_id').value = id[0];
        document.getElementById('user_fullname').value = id[1];
        document.getElementById('user_role').value = id[2];
        document.getElementById('user_name').value = id[3];
        document.getElementById('user_password').value = id[4];
      });

      function mouseoverPass() {
        let obj = document.getElementById('myPassword');
        obj.type = 'text';
      }
      function mouseoutPass() {
        let obj = document.getElementById('myPassword');
        obj.type = 'password';
      }
    </script>
  </body>
</html>