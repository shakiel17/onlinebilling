<html>
    <head>
        <title>Online Billing System</title>
        <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/dist/img/billinglogo.png');?>">
    </head>
    <body>
        <h1>Payment Details</h1>
        REF NO.: <b><?=$refno;?></b>
        <table width="100%" border="1" cellspacing="0" cellpadding="1" style="border-collapse:collapse;">
            <tr>
                <td align="center"><b>Transaction #</b></td>
                <td align="center"><b>Amount</b></td>
                <td align="center"><b>Proof of Payment</b></td>
                <td align="center"><b>Status</b></td>
            </tr>
            <?php
            foreach($payment as $item){
                echo "<tr>";
                    echo "<td align='center'>$item[remarks]</td>";
                    echo "<td align='right'>".number_format($item['amount'],2)."</td>";
                    ?>
                    <td align="center">
                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['payment_proof']);?>" width="100">
                    </td>
                    <?php
                    echo "<td align='center'>$item[status]</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>