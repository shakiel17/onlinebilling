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
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data=$this->Billing_model->authenticate($username,$password);
            if($data){                
                redirect(base_url('main'));
            }else{
                redirect(base_url());
            }
        }        
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $details=$this->Billing_model->getSchoolDetails($this->session->id);
            $data['title'] = $details['school_name'];
            $data['address'] = $details['school_address'];
            $data['email'] = $details['school_email'];
            $data['contactno'] = $details['school_contact'];
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function logout(){
            $userdata=array(
                'id','staff_id','username','fullname','schoolyear','user_login'
            );
            $this->session->unset_userdata($userdata);
            redirect(base_url());
        }
        public function school_info(){
            $page = "school_info";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);    
            $data['student_id'] = '';        
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function upload_logo(){
            $upload=$this->Billing_model->upload_logo();
            if($upload){
                $this->session->set_flashdata('success','School Logo successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save School Logo!');
            }
            redirect(base_url('school_info'));
        }
        public function school_info_save(){
            $upload=$this->Billing_model->school_info_save();
            if($upload){
                $this->session->set_flashdata('success','School Info successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save School Info!');
            }
            redirect(base_url('school_info'));
        }
        public function save_staff(){
            $upload=$this->Billing_model->save_staff();
            if($upload){
                $this->session->set_flashdata('success','Staff details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save staff details!');
            }
            redirect(base_url('main'));
        }
        public function save_staff_account(){
            $upload=$this->Billing_model->save_staff_account();
            if($upload){
                $this->session->set_flashdata('success','Staff account details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save staff account details!');
            }
            redirect(base_url('main'));
        }
        public function course_grade_info(){
            $page = "course_grade_info";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);
            $data['courses'] = $this->Billing_model->getAllCourse();            
            $data['grades'] = $this->Billing_model->getAllGrade();
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function save_course(){
            $upload=$this->Billing_model->save_course();
            if($upload){
                $this->session->set_flashdata('success','Course details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save course details!');
            }
            redirect(base_url('course_grade_info'));
        }
        public function save_grade(){
            $upload=$this->Billing_model->save_grade();
            if($upload){
                $this->session->set_flashdata('success','Grade details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save grade details!');
            }
            redirect(base_url('course_grade_info'));
        }
        public function manage_student(){
            $page = "manage_student";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);  
            $data['college'] = $this->Billing_model->getAllStudentByType('college');
            $data['highschool'] = $this->Billing_model->getAllStudentByType('highschool');
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function save_student(){
            $upload=$this->Billing_model->save_student();            
            if($upload){
                $this->session->set_flashdata('success','Student details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save student details!');
            }
            redirect(base_url('manage_student'));
        }
        public function fetchStudentDetails(){
            $id=$this->input->post('id');
            $data=$this->Billing_model->fetch_student_details($id);
            echo json_encode($data);
        }
        public function save_exam_frequency(){
            $upload=$this->Billing_model->save_exam_frequency();            
            if($upload){
                $this->session->set_flashdata('success','Exam Frequency details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save exam frequency details!');
            }
            redirect(base_url('main'));
        }
        public function manage_student_account(){
            $page = "manage_student_account";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);  
            $data['college'] = $this->Billing_model->getStudentAccountByType('college');
            $data['highschool'] = $this->Billing_model->getStudentAccountByType('highschool');
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }

        public function save_student_account(){
            $upload=$this->Billing_model->save_student_account();            
            if($upload){
                $this->session->set_flashdata('success','Student account details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save student account details!');
            }
            redirect(base_url('manage_student_account'));
        }
        public function save_schoolyear(){
            $upload=$this->Billing_model->save_schoolyear();            
            if($upload){
                $this->session->set_flashdata('success','School Year successfully set!');
            }else{
                $this->session->set_flashdata('failed','Unable to set School Year!');
            }
            redirect(base_url('main'));
        }
        public function generate_list_college(){
            $upload=$this->Billing_model->generate_list_college();            
            if($upload){
                $this->session->set_flashdata('success','Student list successfully generated!');
            }else{
                $this->session->set_flashdata('failed','Unable to generate student list!');
            }
            redirect(base_url('manage_student_account'));
        }
        public function generate_list_hs(){
            $upload=$this->Billing_model->generate_list_hs();            
            if($upload){
                $this->session->set_flashdata('success','Student list successfully generated!');
            }else{
                $this->session->set_flashdata('failed','Unable to generate student list!');
            }
            redirect(base_url('manage_student_account'));
        }
        public function manage_billing(){
            $page = "manage_billing";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);  
            $data['college'] = $this->Billing_model->getStudentAccountByType('college');
            $data['highschool'] = $this->Billing_model->getAllStudentByType('highschool');
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function billing_details($school_id,$student_id){
            $page = "billing_details";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);
            $data['profile'] = $this->Billing_model->getSingleStudent($school_id,$student_id);   
            $data['student_id'] = $student_id;
            $data['school_id'] = $school_id;            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal',$data);
            $this->load->view('templates/footer');            
        }
        public function save_billing(){
            $school_id=$this->input->post('school_id');
            $student_id=$this->input->post('student_id');
            $upload=$this->Billing_model->save_billing();            
            if($upload){
                $this->session->set_flashdata('success','Student list successfully generated!');
            }else{
                $this->session->set_flashdata('failed','Unable to generate student list!');
            }
            redirect(base_url('billing_details/'.$school_id."/".$student_id));
        }
        public function print_invoice($refno,$type){
            $page = "print_invoice";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
                
            // }else{
            //     redirect(base_url('main'));
            // }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);
            $data['invoice'] = $this->Billing_model->getBillingDetails($refno,$type);            
            $data['invno'] = $refno;
            // $this->load->view('templates/header');
            // $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            // $this->load->view('templates/modal',$data);
            // $this->load->view('templates/footer');            
        }
        public function save_gcash(){           
            $upload=$this->Billing_model->save_gcash();            
            if($upload){
                $this->session->set_flashdata('success','GCash account successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save GCash account details!');
            }
            redirect(base_url('main'));
        }
        public function view_qrCode($id){
            $page = "gcash";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
                
            // }else{
            //     redirect(base_url('main'));
            // }
            $data['details']=$this->Billing_model->getGCashDetails($id);                        
            // $this->load->view('templates/header');
            // $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            // $this->load->view('templates/modal',$data);
            // $this->load->view('templates/footer');            
        }
        public function approved_payment($id,$school_id,$student_id,$type){            
            $upload=$this->Billing_model->approved_payment($id,$school_id,$student_id,$type);            
            if($upload){
                $this->session->set_flashdata('success','Payment successfully approved!');
            }else{
                $this->session->set_flashdata('failed','Unable to approved payment!');
            }
            redirect(base_url('billing_details/'.$school_id."/".$student_id));
        }
        public function manage_notification(){
            $page = "manage_notification";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                
            }else{
                redirect(base_url('main'));
            }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);  
            $data['college'] = $this->Billing_model->getStudentAccountByType('college');
            $data['highschool'] = $this->Billing_model->getAllStudentByType('highschool');
            $data['student_id'] = '';
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');            
        }
        public function send_invoice(){
            $student_id=$this->input->post('student_id');
            $invno=$this->input->post('invno');
            $file=$_FILES['file']['tmp_name'];
            $file_name=$_FILES['file']['name'];
            $guard=$this->Billing_model->getStudentGuardian($student_id,$this->session->id);
            if($guard){
                $name=$guard['g_name'];
                $email=$guard['g_email'];
            }else{
                $name="";
                $email="";
            }

            $subject="Digital Invoice";

            $message="
Dear $name, 

We have generated your Statement of Account (SOA).
For this bill: 
Account Number: $student_id
Reference #: $invno.

You may also check your updated balance thru the system.

Please see attached file for your reference.

Thank you.
            ";

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
            $this->email->attach($file,'attachment',$file_name);

            if($this->email->send()){
		            $this->Billing_model->save_notification($invno,$student_id);                
                 $this->session->set_flashdata('success','Invoice successfully sent!');
            }else{
                $this->session->set_flashdata('failed','Unbale to send invoice!');
            }
            // if($request){
            //     $this->session->set_flashdata('success','Request successfully '.$reuqest.'!');
            // }else{
            //     $this->session->set_flashdata('failed','Unbale to '.$request.' request!');
            // }
            redirect(base_url('manage_notification'));
        }
        //===================End of School Module================================================
        
//======================================================================================================================================
        //===================Start of Admin Module================================================
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
        //===================End of Admin Module================================================

//======================================================================================================================

        //===================Start of User Module================================================
        public function user(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/user/'.$page.".php")){
                show_404();
            }
            if($this->session->guardian_login){
                redirect(base_url('usermain'));
            }
            $this->load->view('pages/user/'.$page);            
        }
        public function usermain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/user/'.$page.".php")){
                show_404();
            }
            if($this->session->guard_login){
                
            }else{
                redirect(base_url('user'));
            }
            $data['title'] = "User Profile";   
            $data['guard'] = $this->Billing_model->getGuardianDetails($this->session->guard_id,$this->session->id); 
            $data['student_college'] = $this->Billing_model->getGuardianStudents($this->session->guard_id,$this->session->id,'college');
            $data['student_high'] = $this->Billing_model->getGuardianStudents($this->session->guard_id,$this->session->id,'highschool');
            $this->load->view('templates/header');
            $this->load->view('templates/user/navbar');
            $this->load->view('templates/user/sidebar');
            $this->load->view('pages/user/'.$page,$data);
            $this->load->view('templates/user/modal',$data);
            $this->load->view('templates/footer');
        }
        public function user_register(){
            $page = "register";
            if(!file_exists(APPPATH.'views/pages/user/'.$page.".php")){
                show_404();
            }
            if($this->session->user_login){
                redirect(base_url('usermain'));
            }
            $this->load->view('pages/user/'.$page);            
        }
        public function user_registration(){
            $register=$this->Billing_model->user_registration();           
            if($register){
               $this->session->set_flashdata('remarks','You have successfully registered. Please sign in to start your session.');
               redirect(base_url('user'));
            }else{               
               redirect(base_url('user_register'));
            }                
           
        }
        public function user_authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data=$this->Billing_model->user_authenticate($username,$password);
            if($data){                
                redirect(base_url('usermain'));
            }else{
                redirect(base_url('user'));
            }
        }
        public function user_logout(){
            $userdata=array(
                'school_id','guard_id','username','fullname','guard_login'
            );
            $this->session->unset_userdata($userdata);
            redirect(base_url('user'));
        }
        public function user_add_student($id){            
            $data=$this->Billing_model->user_add_student($id);
            if($data){             
                $this->session->set_flashdata('success','Student details successfully added!');                
            }else{
                $this->session->set_flashdata('failed','Unable to add student details!');                
            }
            redirect(base_url('usermain'));
        }
        public function user_delete_student($id){            
            $data=$this->Billing_model->user_delete_student($id);
            if($data){             
                $this->session->set_flashdata('success','Student details successfully deleted!');                
            }else{
                $this->session->set_flashdata('failed','Unable to delete student details!');                
            }
            redirect(base_url('usermain'));
        }
        public function update_user_profile(){
            $data=$this->Billing_model->update_user_profile();
            if($data){             
                $this->session->set_flashdata('success','User profile successfully updated!');                
            }else{
                $this->session->set_flashdata('failed','Unable to update your profile!');                
            }
            redirect(base_url('usermain'));
        }
        public function print_invoice_user($refno,$type){
            $page = "print_invoice";
            if(!file_exists(APPPATH.'views/pages/user/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
                
            // }else{
            //     redirect(base_url('main'));
            // }
            $data['details']=$this->Billing_model->getSchoolDetails($this->session->id);
            $data['invoice'] = $this->Billing_model->getBillingDetails($refno,$type);            
            $data['invno'] = $refno;
            // $this->load->view('templates/header');
            // $this->load->view('templates/navbar');
            $this->load->view('pages/user/'.$page,$data);
            // $this->load->view('templates/modal',$data);
            // $this->load->view('templates/footer');            
        }
        public function fetchBillingDetails(){
            $id=$this->input->post('id');
            $type=$this->input->post('type');
            $data=$this->Billing_model->fetchBillingDetails($id,$type);
            echo json_encode($data);
        }
        public function post_payment(){
            $data=$this->Billing_model->post_payment();
            if($data){             
                $this->session->set_flashdata('success','Payment details successfully posted!');                
            }else{
                $this->session->set_flashdata('failed','Unable to post payment details!');                
            }
            redirect(base_url('usermain'));
        }
        public function viewpaymentdetails($refno,$sc_id,$st_id){
            $page = "payment_details";
            if(!file_exists(APPPATH.'views/pages/user/'.$page.".php")){
                show_404();
            }
            // if($this->session->user_login){
                
            // }else{
            //     redirect(base_url('main'));
            // }
            $data['details']=$this->Billing_model->getSchoolDetails($sc_id);
            $data['payment'] = $this->Billing_model->fetchPaymentDetails($refno,$sc_id,$st_id);   
            $data['refno'] = $refno;         
            // $this->load->view('templates/header');
            // $this->load->view('templates/navbar');
            $this->load->view('pages/user/'.$page,$data);
            // $this->load->view('templates/modal',$data);
            // $this->load->view('templates/footer');            
        }        
        //===================End of User Module================================================
    }
?>
