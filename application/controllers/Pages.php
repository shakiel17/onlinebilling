<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "login";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);            
        }
        
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $date=date('Y-m-d');            
            $data['fight'] = $this->Sabong_model->getActiveFight($date);
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function authenticate(){ 
            $username=$this->input->post('username');
            $password=$this->input->post('password');           
            $data=$this->Sabong_model->authenticate($username,$password);
            if($data){
                $userdata=array(
                    'customer_id' => $data['customer_id'],
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'user_login' => true
                );

                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url());
            }
        }
        
        public function registration(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $save=$this->Sabong_model->registration();
            if($save){
                $data=$this->Sabong_model->authenticate($username,$password);
                if($data){
                     $userdata=array(
                    'customer_id' => $data['customer_id'],
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'user_login' => true
                );

                    $this->session->set_userdata($userdata);
                    redirect(base_url('main'));
                }else{
                    $this->session->set_flashdata('error','Invalid username and password!');
                    redirect(base_url());
                }
            }else{
                $this->session->set_flashdata('error','Unable to save registration!');
                redirect(base_url());
            }
        }

        public function logout(){
            $userdata=array('customer_id','username','fullname','user_login');
            $this->session->unset_userdata($userdata);
            $this->session->set_flashdata('success','You successfully logged out!');
            redirect(base_url());
        }

        public function deposit(){
            $page = "deposit";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['title'] = 'Deposit';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function deposit_history(){
            $page = "deposit_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Sabong_model->getDepositHistory($this->session->customer_id);
            $data['title'] = 'Deposit Records';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_deposit(){
            $deposit=$this->Sabong_model->save_deposit();
            if($deposit){
                $this->session->set_flashdata('success','Deposit request successfully submitted!');
            }else{
                $this->session->set_flashdata('failed','Unable to submit deposit request!');
            }
                redirect(base_url('deposit'));                
        }
        public function withdraw(){
            $page = "withdraw";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }            
            $data['title'] = 'Withdrawal';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function withdraw_history(){
            $page = "withdraw_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $data['items'] = $this->Sabong_model->getWithdrawalHistory($this->session->customer_id);
            $data['title'] = 'Withdrawal Records';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_withdraw(){
            $deposit=$this->Sabong_model->save_withdraw();
            if($deposit){
                $this->session->set_flashdata('success','Withdrawal request successfully submitted!');
            }else{
                $this->session->set_flashdata('failed','Unable to submit withdrawal request!');
            }
                redirect(base_url('withdraw'));                
        }
        public function fetch_user_account(){
            $id=$this->input->post('id');
            $data=$this->Sabong_model->fetchCustomerAccount($id);
            echo json_encode($data);
        }
        public function fetchDepositRequest(){            
            $data=$this->Sabong_model->fetchDepositRequest();
            echo json_encode($data);
        }
        public function fetchWithdrawRequest(){            
            $data=$this->Sabong_model->fetchWithdrawRequest();
            echo json_encode($data);
        }

        public function fetchBetAmount(){
            $id=$this->input->post('id');
            $data=$this->Sabong_model->fetchBetAmount($id);
            echo json_encode($data);
        }

        public function fetchBetStat(){
            $id=$this->input->post('id');
            $data=$this->Sabong_model->fetchBetstatus($id);
            echo json_encode($data);
        }

        public function checkActiveFight(){
            $id=date('Y-m-d');
            $data=$this->Sabong_model->checkActiveFight($id);
            echo json_encode($data);
        }

        public function submit_bet(){
           $submit=$this->Sabong_model->save_bet();
           if($submit){
                
           }else{
                $this->session->set_flashdata('error','Insufficient balance!');
           }
           redirect(base_url('main'));
        }
        public function bet_history(){
            $page = "bet_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $date=date('Y-m-d');
            $data['items'] = $this->Sabong_model->getBetHistory($this->session->customer_id,$date);
            $data['title'] = 'Betting Record';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function search_bet_history(){
            $page = "bet_history";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){                
            }else{
                redirect(base_url());
            }
            $date=$this->input->post('datearray');
            $data['items'] = $this->Sabong_model->getBetHistory($this->session->customer_id,$date);
            $data['title'] = 'Betting Record';
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function undo_bet($fightno,$customer_id,$side){
            $undobet=$this->Sabong_model->undo_bet($fightno,$customer_id,$side);
            if($undobet){
                
           }else{
                $this->session->set_flashdata('error','Unable to undo bet!');
           }
            redirect(base_url('main'));
        }
        public function change_user_password(){
            $approve=$this->Sabong_model->change_user_password();
            echo "<script>";
            if($approve){
                echo "alert('Password Sucessfully updated!');";                
            }else{                
            }                
                echo "window.location='".base_url('main')."';";
            echo "</script>";
            
        }
        //=====================================Admin Module==========================================
        public function admin(){
             $page = "login";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                redirect(base_url('adminmain'));
            }
            $this->load->view('pages/admin/'.$page); 
        }
        public function adminmain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['users'] = $this->Sabong_model->getAllUserDetails();
            $data['cashier'] = $this->Sabong_model->getAllUserAccount();            
            $data['bet'] = $this->Sabong_model->getTodayBet(date('Y-m-d'));
            $data['fight'] = $this->Sabong_model->getAllFightByDate(date('Y-m-d'));
            $data['fight_list'] = $this->Sabong_model->getAllFightResult(date('Y-m-d'));
            $data['deposit'] = $this->Sabong_model->getTodayDeposit(date('Y-m-d'));
            $data['withdraw'] = $this->Sabong_model->getTodayWithdrawal(date('Y-m-d'));
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function admin_authenticate(){ 
            $username=$this->input->post('username');
            $password=$this->input->post('password');           
            $data=$this->Sabong_model->admin_authenticate($username,$password);
            if($data){
                if($username=="admin"){
                    $role="admin";
                }else{
                    $role=$data['role'];
                }
                $userdata=array(                    
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'role' => $role,
                    'admin_login' => true
                );

                $this->session->set_userdata($userdata);
                redirect(base_url('adminmain'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url('admin'));
            }
        }
        public function admin_logout(){
            $userdata=array('username','fullname','admin_login');
            $this->session->unset_userdata($userdata);            
            redirect(base_url('admin'));
        }
        public function manage_deposit(){
            $page = "manage_deposit";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Deposit Manager";
            $data['items'] = $this->Sabong_model->getAllDepositRequest();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function approve_deposit($refno){
            $approve=$this->Sabong_model->approve_deposit($refno);
            if($approve){
                $this->session->set_flashdata('success','Deposit request successfully approved!');
            }else{
                $this->session->set_flashdata('failed','Deposit request cannot be approved!');
            }
            redirect(base_url('manage_deposit'));
        }
        public function cancel_deposit($refno){
            $approve=$this->Sabong_model->cancel_deposit($refno);
            if($approve){
                $this->session->set_flashdata('success','Deposit request successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Deposit request cannot be cancelled!');
            }
            redirect(base_url('manage_deposit'));
        }
        public function manage_withdrawal(){
            $page = "manage_withdrawal";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Withdrawal Manager";
            $data['items'] = $this->Sabong_model->getAllWithdrawalRequest();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function approve_withdrawal($refno){
            $approve=$this->Sabong_model->approve_withdrawal($refno);
            if($approve){
                $this->session->set_flashdata('success','Withdrawal request successfully approved!');
            }else{
                $this->session->set_flashdata('failed','Withdrawal request cannot be approved!');
            }
            redirect(base_url('manage_withdrawal'));
        }
        public function cancel_withdrawal($refno){
            $approve=$this->Sabong_model->cancel_withdrawal($refno);
            if($approve){
                $this->session->set_flashdata('success','Withdrawal request successfully cancelled!');
            }else{
                $this->session->set_flashdata('failed','Withdrawal request cannot be cancelled!');
            }
            redirect(base_url('manage_withdrawal'));
        }
        public function fight_list(){
            $page = "fight_list";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $date=date('Y-m-d');
            $data['title'] = "Fight Manager";
            $data['items'] = $this->Sabong_model->getAllFightByDate($date);
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }

        public function create_fight(){
            $approve=$this->Sabong_model->create_fight();
            if($approve){
                $this->session->set_flashdata('success','Fight successfully created!');
            }else{
                $this->session->set_flashdata('failed','Fight cannot be created!');
            }
            redirect(base_url('fight_list'));
        }
        public function active_fight(){
            $page = "active_fight";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $date=date('Y-m-d');            
            $data['fight'] = $this->Sabong_model->getActiveFight($date);
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function close_betting($fight_no){
            $approve=$this->Sabong_model->close_betting($fight_no);
            if($approve){
                $this->session->set_flashdata('success','Betting successfully closed!');
            }else{
                $this->session->set_flashdata('failed','Betting cannot be closed!');
            }
            redirect(base_url('active_fight'));
        }
        public function fight_result($fight_no,$side){
            $approve=$this->Sabong_model->fight_result($fight_no,$side);
            if($approve){
                //$this->session->set_flashdata('success','Betting successfully closed!');
            }else{
                //$this->session->set_flashdata('failed','Betting cannot be closed!');
            }
            redirect(base_url('fight_list'));
        }
        public function income(){
             $page = "income";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }                        
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function print_income(){
             $page = "print_income";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }             
            $date=$this->input->post('datearray');
            $data['rundate'] = $date;
            $data['items'] = $this->Sabong_model->getAllFightResult($date);            
            $this->load->view('pages/admin/'.$page,$data);            
        }
        public function user_account(){
             $page = "user_account";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "User Account Manager";
            $data['items'] = $this->Sabong_model->getAllUserAccount();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function save_user_account(){
            $approve=$this->Sabong_model->save_user_account();
            if($approve){
                $this->session->set_flashdata('success','User account successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user account!');
            }
            redirect(base_url('user_account'));
        }
        public function delete_user_account($id){
            $approve=$this->Sabong_model->delete_user_account($id);
            if($approve){
                $this->session->set_flashdata('success','User account details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete user account details!');
            }
            redirect(base_url('user_account'));
        }
        public function user_list(){
             $page = "user_list";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "User Master List";
            $data['items'] = $this->Sabong_model->getAllUserDetails();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/navbar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }
        public function change_password(){
            $approve=$this->Sabong_model->change_password();
            echo "<script>";
            if($approve){
                echo "alert('Password Sucessfully updated!');";
            }else{                
            }
                echo "window.location='".base_url('adminmain')."';";
            echo "</script>";
            
        }
        //=====================================Admin Module==========================================
    }
?>
