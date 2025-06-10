<?php
    ini_set('max_execution_time', 0);
    ini_set('memory_limit','2048M');
    date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        //===================Start of School Module================================================
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);            
        }

        public function school_register(){
            $page = "school_register";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url('main'));
            }
            $this->load->view('pages/'.$page);            
        }

        public function registration(){
            $register=$this->Billing_model->registration();           
            if($register){
               $this->session->set_flashdata('remarks','You have successfully submitted your registration details! We will process you request within 1-2 days and we will send you an email for tha status of your request. Thank you.');
               redirect(base_url());
            }else{               
               redirect(base_url('school_register'));
            }                
           
        }
        //===================End of School Module================================================
        
//======================================================================================================================================
        //===================Start of School Module================================================
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                redirect(base_url('adminmain'));
            }
            $this->load->view('pages/admin/'.$page);            
        }

        public function admin_authenticate(){
            $password=$this->input->post('password');
           $data=$this->Billing_model->admin_authenticate($password);
           if($data){
                $userdata=array(
                    'username' => $data['username'],
                    'fullname' => $data['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('adminmain'));
           }else{
                $this->session->set_flashdata('error','Invalid password!');
                redirect(base_url('admin'));
           }
        }
        public function admin_logout(){
            $userdata=array(
                'username','fullname','admin_login'
            );
            $this->session->unset_userdata($userdata);
            redirect(base_url('admin'));
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
            $data['title'] = "Admin Dashboard";
            $data['requests'] = $this->Billing_model->getAllSchoolByStatus('pending');
            $data['approved'] = $this->Billing_model->getAllSchoolByStatus('approved');
            $data['users'] = $this->Billing_model->getAllUsers();
            $data['students'] = $this->Billing_model->getAllStudents();
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/footer');
        }
        public function pending_request(){
            $page = "requests";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Pending Request";
            $data['items'] = $this->Billing_model->getAllSchoolByStatus('pending');            
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/footer');
        }
        public function approved_request(){
            $page = "requests";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Approved Request";
            $data['items'] = $this->Billing_model->getAllSchoolByStatus('approved');            
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/footer');
        }
        public function registered_user(){
            $page = "registered_user";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Registered Guardian";            
            $data['users'] = $this->Billing_model->getAllUsers();            
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/footer');
        }
        public function registered_student(){
            $page = "registered_student";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }
            if($this->session->admin_login){
                
            }else{
                redirect(base_url('admin'));
            }
            $data['title'] = "Registered Student";            
            $data['students'] = $this->Billing_model->getAllStudents();            
            $this->load->view('templates/header');
            $this->load->view('templates/admin/navbar');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('templates/admin/modal');
            $this->load->view('templates/footer');
        }
        public function manage_request($id,$request){
            $school=$this->Billing_model->getSingleSchool($id);
            $email=$school['school_email'];
            if($request=="approved"){
                $remarks="Approved";
$message="
Hello,
                
We are pleased to inform you that your request to use of online billing system has been approved.
You can now sign in using your username and password that you have been registered.
                
Thank you";
            }else{
$message="
Hello,
                
We regret to inform you that your request to use of online billing system has been declined.
The reason for the disapproval of your request has been thoroughly checked and discussed with the committee, that there are uncertain/unverified to your details.
                
Thank you and God bless.";
                $remarks="Declined";
            }
            $subject="Request ".$remarks;

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'easykill.aboy@gmail.com',
                'smtp_pass' => 'tdbhdghkzcegyncj',
                'mailtype' => 'text',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from('Online Billing System');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);

            if($this->email->send()){
		            $this->Billing_model->manage_request($id,$request);                
                 $this->session->set_flashdata('success','Request successfully '.$request.'!');
            }else{
                $this->session->set_flashdata('failed','Unbale to '.$request.' request!');
            }
            // if($request){
            //     $this->session->set_flashdata('success','Request successfully '.$reuqest.'!');
            // }else{
            //     $this->session->set_flashdata('failed','Unbale to '.$request.' request!');
            // }
            redirect(base_url('pending_request'));
        }
        //===================End of School Module================================================
    }
?>
