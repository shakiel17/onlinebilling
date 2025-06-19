<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Billing System | Invoice Print</title>
  <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/dist/img/billinglogo.png');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('design/assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('design/assets/dist/css/adminlte.min.css');?>">
</head>
<body>
    <?php           
    $sem="";
    $sname="";
    $student = $this->Billing_model->getSingleStudent($details['school_id'],$invoice['student_id']);
    if($student){
    if($student['student_type']=="college"){
      if($invoice['semester']=="1"){
        $sem="First";        
    }else{
        $sem="Second";        
    }
    }else{
      $sem="";
    }    
  }
    ?>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-receipt"></i> Digital Invoice
          <small class="float-right">Date: <?=date('m/d/Y');?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong><?=$details['school_name'];?></strong><br>
          <?=$details['school_address'];?><br>          
          Phone: <?=$details['school_contact'];?><br>
          Email: <?=$details['school_email'];?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?=$student['student_firstname'];?> <?=$student['student_middlename'];?> <?=$student['student_lastname'];?></strong><br>
          <?=$student['student_address'];?><br>          
          Course/Grade: <?=$student['description'];?><br>
          <!-- Email: john.doe@example.com -->
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice <?=$invno;?></b><br>
        <br>
        <b>Bill Date:</b> <?=date('m/d/Y',strtotime($invoice['datearray']));?><br>
        <b>Payment Due:</b> <?=date('m/d/Y',strtotime($invoice['due_date']));?><br>
        <b>Sem/SYear:</b> <?=$sem;?> / <?=$invoice['syear'];?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table">
            <tr>
                <td>Reference No.</td>
                <td align="right">Amount Due</td>
            </tr>
            <tr>
                <td><b><?=$invno;?></b></td>
                <td align="right"><b><?=number_format($invoice['amount'],2);?></b></td>
            </tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
 <?php        
        $cash=$this->Billing_model->getGCashDetails();
        if($cash){
          $number=$cash['acctno'];
          $name=$cash['acctname'];          
        }else{
          $number="";
          $name="";
        }
        ?>
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Method:</p>
        <img src="<?=base_url('design/assets/dist/img/credit/gcashlogo.png');?>" alt="GCash" width="50"><br>Account Name: <b><?=$name;?></b><br>Account No.: <b><?=$number;?></b>         
        <!-- <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->       
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          You can pay thru Gcash by <a href="<?=base_url('view_qrCode/'.$this->session->id);?>" target="_blank">Scanning</a> or Manually input the merchant account number.
        </p>
        <!-- <img src="<?=base_url('design/assets/dist/img/gcash.jpg');?>" alt="Mastercard" width="200"> -->
      </div>
      <!-- /.col -->
      <!-- <div class="col-6">
        <p class="lead">Amount Due <?=date('m/d/Y',strtotime($invoice['due_date']));?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total:</th>
              <td><?=number_format($invoice['amount'],2);?></td>
            </tr>            
          </table>
        </div>
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  //window.addEventListener("load", window.print());
</script>
</body>
</html>
