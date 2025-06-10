 <?php   
    date_default_timezone_set('Asia/Manila');
    class Sabong_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }

        //===================================STart of Login/Register Model==================================
        public function authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM customer WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }

        public function registration(){
            $fullname=$this->input->post('fullname');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $customerid=date('YmdHis');
            $check=$this->db->query("SELECT * FROM customer WHERE username='$username'");
            if($check->num_rows()>0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO customer(customer_id,fullname,username,`password`) VALUES('$customerid','$fullname','$username','$password')");
                if($result){
                    $this->db->query("INSERT INTO customer_account(customer_id,amount) VALUES('$customerid','0')");
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function admin_authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM admin WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                $result=$this->db->query("SELECT * FROM users WHERE username='$username' AND `password`='$password'");
                if($result){
                    return $result->row_array();
                }else{
                    return false;
                }                
            }
        }
        //===================================End of Login/Register Model==================================
        
//====================================================================================================================================================================

        //==================================Start of Getting Data Model=================================================
        public function getCustomerAccount($id){
            $result=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$id'");
            return $result->row_array();
        }
        public function getBetHistory($id,$date){            
            $result=$this->db->query("SELECT fd.*,SUM(fd.amount) as betamount,fr.win_result FROM fight_details fd INNER JOIN fight_result fr ON fr.fight_no=fd.fight_no AND fr.datearray=fd.datearray WHERE fd.customer_id='$id' AND fd.datearray='$date' GROUP BY fd.bet_side,fd.fight_no ORDER BY fd.fight_no DESC");
            return $result->result_array();
        }
        public function getFightResult($fight_no,$date){
            $result=$this->db->query("SELECT * FROM fight_result WHERE fight_no='$fight_no' AND datearray='$date'");
            return $result->row_array();
        }
        public function getAllFightResult($date){
            $result=$this->db->query("SELECT * FROM fight_result WHERE datearray='$date' ORDER BY fight_no ASC");
            return $result->result_array();
        }
        public function getAllUserAccount(){
            $result=$this->db->query("SELECT * FROM users");
            return $result->result_array();
        }
        public function getAllUserDetails(){
            $result=$this->db->query("SELECT c.*,ca.amount FROM customer c INNER JOIN customer_account ca ON ca.customer_id=c.customer_id");
            return $result->result_array();
        }
        public function getTodayBet($date){
            $result=$this->db->query("SELECT SUM(meron_amount+wala_amount) as totalbet FROM fight_result WHERE datearray='$date' GROUP BY datearray");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }            
        }
        public function getTodayDeposit($date){
            $result=$this->db->query("SELECT SUM(amount) as totaldeposit FROM cash_in WHERE datearray='$date' AND `status`='approved' GROUP BY datearray");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }            
        }
        public function getTodayWithdrawal($date){
            $result=$this->db->query("SELECT SUM(amount) as totalwithdraw FROM cash_out WHERE datearray='$date' AND `status`='approved' GROUP BY datearray");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }            
        }
        public function change_password(){
            $username=$this->input->post('username');
            $oldpass=$this->input->post('oldpassword');
            $newpass=$this->input->post('newpassword');
            echo "<script>";
            if($oldpass==$newpass){
                echo "alert('Error! New password should not be equal to old password!');";
            }else{
                if($username=="admin"){
                    $result=$this->db->query("UPDATE `admin` SET `password`='$newpass' WHERE username='$username'");
                }else{
                    $result=$this->db->query("UPDATE `users` SET `password`='$newpass' WHERE username='$username'");
                }
            }       
            echo "</script>";     
            if($result){
                return true;
            }else{
                return false;
            }
            
        }
        public function checkbet($id,$c_id,$side){
            $date=date('Y-m-d');
            $result=$this->db->query("SELECT * FROM fight_details WHERE fight_no='$id' AND customer_id='$c_id' AND bet_side='$side' AND datearray='$date'");
            return $result->result_array();
        }

        public function change_user_password(){
            $username=$this->input->post('customer_id');
            $oldpass=$this->input->post('oldpassword');
            $newpass=$this->input->post('newpassword');
            echo "<script>";
            if($oldpass==$newpass){
                echo "alert('Error! New password should not be equal to old password!');";
            }else{
                    $result=$this->db->query("UPDATE `customer` SET `password`='$newpass' WHERE customer_id='$username'");
            }       
            echo "</script>";     
            if($result){
                return true;
            }else{
                return false;
            }
            
        }
        
        //==================================End of Getting Data Model=================================================
        
//====================================================================================================================================================================

        //=======================================Start of Cash In/Out Model==============================================
        public function save_deposit(){
            $refno="DRN".date('YmdHis');
            $id=$this->session->customer_id;
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO cash_in(`refno`,`customer_id`,`amount`,`datearray`,`timearray`) VALUES('$refno','$id','$amount','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getDepositHistory($id){
            $result=$this->db->query("SELECT * FROM cash_in WHERE customer_id='$id' ORDER BY datearray DESC, timearray DESC");
            return $result->result_array();
        }
        public function getAllDepositRequest(){
            $result=$this->db->query("SELECT ci.*,c.fullname FROM cash_in ci INNER JOIN customer c ON c.customer_id=ci.customer_id WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }

        public function approve_deposit($refno){
            $user=$this->session->fullname;
            $querydep=$this->db->query("SELECT * FROM cash_in WHERE refno='$refno'");
            $item=$querydep->row_array();
            $queryacc=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$item[customer_id]'");
            $row=$queryacc->row_array();

            $dept_amount=$item['amount'];
            $prev_amount=$row['amount'];

            $new_amount=$dept_amount+$prev_amount;
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("UPDATE customer_account SET amount='$new_amount' WHERE customer_id='$item[customer_id]'");
            if($result){
                $this->db->query("UPDATE cash_in SET `status`='approved',date_received='$date',time_received='$time',loginuser='$user' WHERE refno='$refno'");
                return true;
            }else{
                return false;
            }
        }

        public function cancel_deposit($refno){
            $result=$this->db->query("UPDATE cash_in SET `status`='cancelled' WHERE refno='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function save_withdraw(){
            $refno="DRN".date('YmdHis');
            $id=$this->session->customer_id;
            $balance=$this->input->post('avail_balance');
            $amount=$this->input->post('amount');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            if($balance >= $amount){
                $rembal=$balance-$amount;
                $result=$this->db->query("INSERT INTO cash_out(`refno`,`customer_id`,`amount`,`datearray`,`timearray`) VALUES('$refno','$id','$amount','$date','$time')");
                if($result){
                    $this->db->query("UPDATE customer_account SET amount='$rembal' WHERE customer_id='$id'");
                }
            }else{
                return false;
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function approve_withdrawal($refno){ 
            $user=$this->session->fullname;           
            $querydep=$this->db->query("SELECT * FROM cash_out WHERE refno='$refno'");
            $item=$querydep->row_array();
            $queryacc=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$item[customer_id]'");
            $row=$queryacc->row_array();

            $dept_amount=$item['amount'];
            $prev_amount=$row['amount'];

            //$new_amount=$prev_amount-$dept_amount;

           // $result=$this->db->query("UPDATE customer_account SET amount='$new_amount' WHERE customer_id='$item[customer_id]'");
$result=$this->db->query("UPDATE cash_out SET `status`='approved',loginuser='$user' WHERE refno='$refno'");
               
            if($result){
                 return true;
            }else{
                return false;
            }
        }

        public function cancel_withdrawal($refno){
            $query=$this->db->query("SELECT * FROM cash_out WHERE refno='$refno'");
            $req=$query->row_array();
            $cid=$req['customer_id'];
            $camount=$req['amount'];
            $qry=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$cid'");
            $rqry=$qry->row_array();
            $prevbal=$rqry['amount'];
            $newbal=$prevbal+$camount;
            $this->db->query("UPDATE customer_account SET amount='$newbal' WHERE customer_id='$cid'");
            $result=$this->db->query("UPDATE cash_out SET `status`='cancelled' WHERE refno='$refno'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getWithdrawalHistory($id){
            $result=$this->db->query("SELECT * FROM cash_out WHERE customer_id='$id' ORDER BY datearray DESC, timearray DESC");
            return $result->result_array();
        }

        public function getAllWithdrawalRequest(){
            $result=$this->db->query("SELECT ci.*,c.fullname FROM cash_out ci INNER JOIN customer c ON c.customer_id=ci.customer_id WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }

        //=======================================End of Cash In/Out Model==============================================

//====================================================================================================================================================================

        //=================================Start of Auto Refresh Model==========================================
        public function fetchCustomerAccount($id){
            $result=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$id'");
            return $result->result_array();
        }

        public function fetchDepositRequest(){
            $result=$this->db->query("SELECT COUNT(ci.customer_id) as totalcount FROM cash_in ci WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }

        public function fetchWithdrawRequest(){
            $result=$this->db->query("SELECT COUNT(ci.customer_id) as totalcount FROM cash_out ci WHERE ci.`status`='pending' ORDER BY ci.datearray ASC, ci.timearray ASC");
            return $result->result_array();
        }        

        public function fetchBetAmount($id){
            $date=date('Y-m-d');
            $result=$this->db->query("SELECT SUM(amount) as totalamount FROM fight_details WHERE fight_no='$id' AND datearray='$date' GROUP BY fight_no");
            return $result->result_array();
        }

        public function fetchBetStatus($id){
            $date=date('Y-m-d');
            $result=$this->db->query("SELECT * FROM fight WHERE fight_no='$id' AND datearray='$date'");
            return $result->result_array();
        }
        public function checkActiveFight($date){
            $result=$this->db->query("SELECT * FROM fight WHERE (`status`='open' OR `status`='close') AND datearray='$date'");
            return $result->result_array();
        }
        //=================================End of Auto Refresh Model==========================================

//====================================================================================================================================================================

        //=================================Start of Fight Model===============================================
        public function getAllFightByDate($date){
            $result=$this->db->query("SELECT * FROM fight wHERE datearray='$date' ORDER BY fight_no ASC");
            return $result->result_array();
        }

        public function getActiveFight($date){
            $result=$this->db->query("SELECT * FROM fight WHERE (`status`='open' OR `status`='close') AND datearray='$date'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        
        public function getFightDetailsBySide($side,$fightno){
            $date=date('Y-m-d');
            $result=$this->db->query("SELECT * FROM fight_details WHERE bet_side='$side' AND fight_no='$fightno' AND datearray='$date'");
            return $result->result_array();
        }
        
        public function create_fight(){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $fight_no=1;            
            $query=$this->db->query("SELECT fight_no FROM fight WHERE datearray='$date' ORDER BY fight_no DESC LIMIT 1");
            if($query->num_rows()>0){
                $res=$query->row_array();
                $fight_no=$res['fight_no'] + 1;                
            }

            $result=$this->db->query("INSERT INTO fight(`fight_no`,`odds_meron`,`odds_wala`,`datearray`,`timearray`) VALUES('$fight_no','0','0','$date','$time')");
            if($result){                              
                return true;
            }else{
                return false;
            }
        }
        public function check_fight(){
            $date=date('Y-m-d');
            $result=$this->db->query("SELECT * FROM fight WHERE `status`='open' OR `status`='close' AND datearray='$date'");
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function save_bet(){
            $btnBet=$this->input->post('btnBet');
            $amount=$this->input->post('amount');
            $fight_no=$this->input->post('fight_no');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $customer_id=$this->session->customer_id;

            if($btnBet=="Bet Meron"){
                $side="meron";
            }

            if($btnBet=="Bet Wala"){
                $side="wala";
            }
            $check=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$customer_id'");
            $acc=$check->row_array();

            $rembal=$acc['amount'];
            if($rembal >= $amount){
                $this->db->query("INSERT INTO fight_details(`fight_no`,`customer_id`,`amount`,`bet_side`,`datearray`,`timearray`) VALUES('$fight_no','$customer_id','$amount','$side','$date','$time')");
                $newbal=$rembal-$amount;
                $this->db->query("UPDATE customer_account SET amount='$newbal' WHERE customer_id='$customer_id'");
            }            

            $query=$this->Sabong_model->getFightDetailsBySide('meron',$fight_no);
            $meron=0;
            foreach($query as $row){
                $meron += $row['amount'];
            }
            $query=$this->Sabong_model->getFightDetailsBySide('wala',$fight_no);
            $wala=0;
            foreach($query as $row){
                $wala += $row['amount'];
            }

            $totalbet=$meron+$wala;
            $odds_meron=0;
            if($meron > 0){
                $odds_meron=($totalbet/$meron)*0.85;
            }
            $odds_wala=0;
            if($wala > 0){
                $odds_wala=($totalbet/$wala)*0.85;
            }

            $this->db->query("UPDATE fight SET odds_meron='$odds_meron',odds_wala='$odds_wala' WHERE fight_no='$fight_no' AND datearray='$date'");
            if($rembal >= $amount){
                return true;
            }else{
                return false;
            }

        }
        public function close_betting($fight_no){
            $date=date('Y-m-d');
            $result=$this->db->query("UPDATE fight SET `status`='close' WHERE fight_no='$fight_no' AND datearray='$date'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function fight_result($fight_no,$side){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $query=$this->Sabong_model->getFightDetailsBySide('meron',$fight_no);
            $meron=0;
            foreach($query as $row){
                $meron += $row['amount'];
            }
            $query=$this->Sabong_model->getFightDetailsBySide('wala',$fight_no);
            $wala=0;
            foreach($query as $row){
                $wala += $row['amount'];
            }
            if($side=="draw"){
                $meron=0;
                $wala=0;
            }
            $this->db->query("INSERT INTO fight_result(`fight_no`,`meron_amount`,`wala_amount`,`win_result`,`datearray`,`timearray`) VALUES('$fight_no','$meron','$wala','$side','$date','$time')");

            $fquery=$this->db->query("SELECT * FROM fight WHERE fight_no='$fight_no' AND datearray='$date'");
            $fight=$fquery->row_array();
            $odds_meron=$fight['odds_meron'];
            $odds_wala=$fight['odds_wala'];
            if($side=="meron"){
                $odds=$odds_meron;
            }else if($side=="wala"){
                $odds=$odds_wala;
            }else{
                $odds=1;
            }
            if($side=="draw"){
                $query=$this->db->query("SELECT * FROM fight_details WHERE fight_no='$fight_no' AND datearray='$date'");
            }else{
                $query=$this->db->query("SELECT * FROM fight_details WHERE fight_no='$fight_no' AND bet_side='$side' AND datearray='$date'");
            }            
            if($query->num_rows()>0){
                $items=$query->result_array();
                foreach($items as $item){
                    $c_id=$item['customer_id'];
                    $amount=$item['amount'];
                    $prof=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$c_id'");
                    $row=$prof->row_array();
                    $prev_bal=$row['amount'];
                    $winamount=$amount*$odds;
                    $new_bal=$prev_bal+$winamount;
                    $this->db->query("UPDATE customer_account SET amount='$new_bal' WHERE customer_id='$c_id'");
                }
            }
            $this->db->query("UPDATE fight SET `status`='done' WHERE fight_no='$fight_no' AND datearray='$date'");
            return true;
        }
        public function undo_bet($id,$cid,$side){
            
            $date=date('Y-m-d');            
            
            $check=$this->db->query("SELECT * FROM customer_account WHERE customer_id='$cid'");
            $acc=$check->row_array();
            $rembal=$acc['amount'];

            $bq=$this->db->query("SELECT *,SUM(amount) as amount FROM fight_details WHERE fight_no='$id' AND customer_id='$cid' AND bet_side='$side' AND datearray='$date' GROUP BY bet_side");
            $bres=$bq->row_array();

            $betamount=$bres['amount'];

            //if($rembal >= $amount){
                $this->db->query("DELETE FROM fight_details WHERE fight_no='$id' AND customer_id='$cid' AND bet_side='$side' AND datearray='$date'");
                $newbal=$rembal+$betamount;
                $this->db->query("UPDATE customer_account SET amount='$newbal' WHERE customer_id='$cid'");
            //}            

            $query=$this->Sabong_model->getFightDetailsBySide('meron',$id);
            $meron=0;
            foreach($query as $row){
                $meron += $row['amount'];
            }
            $query=$this->Sabong_model->getFightDetailsBySide('wala',$id);
            $wala=0;
            foreach($query as $row){
                $wala += $row['amount'];
            }

            $totalbet=$meron+$wala;
            $odds_meron=0;
            if($meron > 0){
                $odds_meron=($totalbet/$meron)*0.85;
            }
            $odds_wala=0;
            if($wala > 0){
                $odds_wala=($totalbet/$wala)*0.85;
            }

            $this->db->query("UPDATE fight SET odds_meron='$odds_meron',odds_wala='$odds_wala' WHERE fight_no='$id' AND datearray='$date'");
            if($rembal >= $amount){
                return true;
            }else{
                return false;
            }

        }
        //=================================End of Fight Model===============================================

//====================================================================================================================================

        //=================================Start of User Account Model======================================
        public function save_user_account(){
            $id=$this->input->post('userid');
            $fullname=$this->input->post('fullname');
            $role=$this->input->post('designation');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->db->query("SELECT * FROM users WHERE username='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id==""){
                    $result=$this->db->query("INSERT INTO users(`fullname`,`role`,`username`,`password`,`status`) VALUES('$fullname','$role','$username','$password','Active')");
                }else{
                    $result=$this->db->query("UPDATE users SET fullname='$fullname',`role`='$role',username='$username',`password`='$password' WHERE id='$id'");
                }
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function delete_user_account($id){
            $result=$this->db->query("DELETE FROM users WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        //=================================End of User Account Model======================================
    }
?>
