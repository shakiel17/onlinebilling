<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Sabong</title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/production/images/sabong.png');?>">
    <!-- Bootstrap -->
    <link href="<?=base_url('design/assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('design/assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('design/assets/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=base_url('design/assets/vendors/iCheck/skins/flat/green.css');?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?=base_url('design/assets/vendors/google-code-prettify/bin/prettify.min.css');?>" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=base_url('design/assets/vendors/select2/dist/css/select2.min.css');?>" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=base_url('design/assets/vendors/switchery/dist/switchery.min.css');?>" rel="stylesheet">
    <!-- starrr -->
    <link href="<?=base_url('design/assets/vendors/starrr/dist/starrr.css');?>" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?=base_url('design/assets/vendors/bootstrap-daterangepicker/daterangepicker.css');?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('design/assets/build/css/custom.min.css');?>" rel="stylesheet">

     <link href="<?=base_url('design/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('design/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('design/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('design/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('design/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css');?>" rel="stylesheet">
    
    <script>       
      function autoRefresh() {
        <?php                 
          $acct=$this->Sabong_model->getCustomerAccount($this->session->customer_id);                 
        ?>
        <?=$this->session->set_userdata('curramount',$acct['amount']);?>
        var prev_val = '<?=$this->session->curramount;?>';
        var id='<?=$this->session->customer_id;?>';
        $.ajax({
          url:'<?=base_url();?>index.php/pages/fetch_user_account',
          type:'post',
          data: {id: id},
          dataType:'json',
          success: function(response){
            if(prev_val !== response[0]['amount']){
              window.location = window.location.href;
            }else{            
              //alert(response[0]['amount']);
            }           
            //alert(prev_[0]['amount']);
          }
        });
            //window.location = window.location.href;
        }
        setInterval('autoRefresh()', 3000);
    </script>
  </head>