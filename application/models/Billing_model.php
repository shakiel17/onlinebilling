<?php   
    date_default_timezone_set('Asia/Manila');
    class Billing_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        //=============================Start of Admin Model=============================================
        public function admin_authenticate($password){
            $result=$this->db->query("SELECT * FROM admin WHERE username='admin' AND `password`='$password'");
            if($result->num_rows() > 0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllSchoolByStatus($status){
            $result=$this->db->query("SELECT * FROM school WHERE `status`='$status' ORDER BY datearray ASC, timearray ASC");
            return $result->result_array();
        }
        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM guardian");
            return $result->result_array();
        }
        public function getAllStudents(){
            $result=$this->db->query("SELECT * FROM student ORDER BY student_lastname ASC");
            return $result->result_array();
        }
        public function getSingleSchool($id){
            $result=$this->db->query("SELECT * FROM school WHERE school_id='$id'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function manage_request($id,$request){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("UPDATE school SET `status`='$request',date_approved='$date',time_approved='$time' WHERE school_id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        //=============================End of Admin Model===============================================

//===================================================================================================================================

        //=============================Start of School Model=============================================
        public function registration(){
            $name=$this->input->post('sname');
            $expr = '/(?<=\s|^)\w/iu';
            preg_match_all($expr, $name, $matches);
            $sname = implode('', $matches[0]);
            $school_id = strtoupper($sname)."".date('YmdHis');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM school WHERE username='$username'");
            if($check->num_rows() > 0){
                return false;
            }else{
                $result=$this->db->query("INSERT INTO school(`school_id`,`school_name`,`school_address`,`school_contact`,`school_email`,`username`,`password`,`datearray`,`timearray`) VALUES('$school_id','$name','$address','$contactno','$email','$username','$password','$date','$time')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function authenticate($user,$pass){
            $result=$this->db->query("SELECT * FROM school WHERE username='$user' AND `password`='$pass'");
            if($result->num_rows() > 0){
                $row=$result->row_array();
                if($row['status']=="approved"){
                    $userdata=array(
                    'id' => $row['school_id'],  
                    'staff_id' => '',
                    'username' => $row['username'],
                    'fullname' => '',
                    'user_login' => true
                    );
                    $this->session->set_userdata($userdata);
                    return true;
                }else{
                    $this->session->set_flashdata('error','Account is not yet approved!');
                    return false;
                }
            }else{
                $result=$this->db->query("SELECT * FROM school_staff WHERE username='$user' AND `password`='$pass'");
                if($result->num_rows()>0){
                    $row=$result->row_array();
                    $userdata=array(
                    'id' => $row['school_id'],  
                    'staff_id' => $row['staff_id'],
                    'username' => $row['username'],
                    'fullname' => $row['staff_name'],
                    'user_login' => true
                    );
                    $this->session->set_userdata($userdata);
                    return true;
                }else{
                    $this->session->set_flashdata('error','Invalid username and password!');
                    return false;
                }                
            }
        }
        public function getSchoolDetails($id){
            $result=$this->db->query("SELECT * FROM school WHERE school_id='$id'");
            return $result->row_array();
        }
        public function upload_logo(){
            $id=$this->session->id;            
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('jpg','png','jpeg','gif');
            //if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE school SET school_logo='$imgContent' WHERE school_id='$id'");            
           // }else{
            //    return false;
           // }           
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function school_info_save(){
            $id=$this->session->id; 
            $name=$this->input->post('sname');
            $address=$this->input->post('address');
            $contactno=$this->input->post('contactno');
            $email=$this->input->post('email');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $check=$this->db->query("SELECT * FROM school WHERE username='$username' AND school_id <> '$id'");
            if($check->num_rows() > 0){
                return false;
            }else{
                $result=$this->db->query("UPDATE school SET school_name='$name',school_address='$address',school_contact='$contactno',school_email='$email',username='$username',`password`='$password' WHERE school_id='$id'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function save_staff(){            
            $id=$this->session->id;
            $query=$this->db->query("SELECT * FROM school WHERE school_id='$id'");
            $row=$query->row_array();
            $school_name=$row['school_name'];
            $staff_id=$this->input->post('staff_id');
            $staff_name=$this->input->post('staff_name');
            $status=$this->input->post('status');
             $date=date('Y-m-d');
            $time=date('H:i:s');
            if($staff_id==""){
                $expr = '/(?<=\s|^)\w/iu';
                preg_match_all($expr, $school_name, $matches);
                $sname = implode('', $matches[0]);
                $staff_id = strtoupper($sname)."S".date('YmdHis');
                $result=$this->db->query("INSERT INTO school_staff(school_id,staff_id,staff_name,`status`,datearray,timearray) VALUES('$id','$staff_id','$staff_name','$status','$date','$time')");
            }else{
                $result=$this->db->query("UPDATE  school_staff SET staff_name='$staff_name',`status`='$status' WHERE staff_id='$staff_id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllStaff(){
            if($this->session->admin_login){                
                $result=$this->db->query("SELECT * FROM school_staff");
            }else if($this->session->user_login){
                $id=$this->session->id;
                $result=$this->db->query("SELECT * FROM school_staff WHERE school_id='$id'");
            }            
            return $result->result_array();
        }
        public function save_staff_account(){
            $staff_id=$this->input->post('staff_id');
            $username=$this->input->post('username');
            $password=$this->input->post('password');   
            $check=$this->db->query("SELECT * FROM school WHERE username='$username'")     ;
            if($check->num_rows()>0){
                return false;
            }else{
                $check=$this->db->query("SELECT * FROM school_staff WHERE username='$username' AND staff_id <> '$staff_id'");
                if($check->num_rows()>0){
                    return false;
                }else{
                    $result=$this->db->query("UPDATE  school_staff SET username='$username',`password`='$password' WHERE staff_id='$staff_id'");            
                    if($result){
                        return true;
                    }else{
                        return false;
                    }
                }
            }                        
        }
        public function getAllCourse(){
            $id=$this->session->id;
            $result=$this->db->query("SELECT * FROM course WHERE school_id='$id'");
            return $result->result_array();
        }
        public function getAllGrade(){
            $id=$this->session->id;
            $result=$this->db->query("SELECT * FROM grade WHERE school_id='$id'");
            return $result->result_array();
        }
        public function save_course(){
            $school_id=$this->session->id;
            $course_id=$this->input->post('course_id');
            $description=$this->input->post('description');
            $amount=$this->input->post('unitcost');
            if($course_id==""){
                $result=$this->db->query("INSERT INTO course(school_id,`description`,amount) VALUES('$school_id','$description','$amount')");
            }else{
                $result=$this->db->query("UPDATE course SET `description`='$description',amount='$amount' WHERE id='$course_id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_grade(){
            $school_id=$this->session->id;
            $grade_id=$this->input->post('grade_id');
            $description=$this->input->post('description');
            $amount=$this->input->post('unitcost');
            if($grade_id==""){
                $result=$this->db->query("INSERT INTO grade(school_id,`description`,amount) VALUES('$school_id','$description','$amount')");
            }else{
                $result=$this->db->query("UPDATE grade SET `description`='$description',amount='$amount' WHERE id='$grade_id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllStudentByType($type){
            $id=$this->session->id;
            if($type=="college"){
                $result=$this->db->query("SELECT s.*,c.description FROM student s LEFT JOIN course c ON c.id=s.student_course WHERE s.school_id='$id' AND s.student_type='$type' ORDER BY s.student_lastname ASC");
            }else{
                $result=$this->db->query("SELECT s.*,c.description FROM student s LEFT JOIN grade c ON c.id=s.student_course WHERE s.school_id='$id' AND s.student_type='$type' ORDER BY s.student_lastname ASC");
            }
            return $result->result_array();
        }
        public function save_student(){
            $school_id=$this->session->id;
            $id=$this->input->post('id');
            $student_id=$this->input->post('student_id');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $address=$this->input->post('address');
            $gender=$this->input->post('gender');
            $birthdate=$this->input->post('birthdate');
            $type=$this->input->post('type');
            $course=$this->input->post('course');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM student WHERE student_id='$student_id' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($id == ""){
                    $result=$this->db->query("INSERT INTO student(student_id,school_id,student_lastname,student_firstname,student_middlename,student_address,student_gender,student_birthdate,student_type,student_course,datearray,timearray) VALUES('$student_id','$school_id','$lastname','$firstname','$middlename','$address','$gender','$birthdate','$type','$course','$date','$time')");
                }else{
                    $result=$this->db->query("UPDATE student SET student_id='$student_id',school_id='$school_id',student_lastname='$lastname',student_firstname='$firstname',student_middlename='$middlename',student_address='$address',student_gender='$gender',student_birthdate='$birthdate',student_course='$course' WHERE id='$id'");
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
            
        }
        public function fetch_student_details($id){
            $result=$this->db->query("SELECT * FROM student WHERE id='$id'");
            return $result->result_array();
        }
        //=============================End of School Model===============================================

//===================================================================================================================================

        //=============================Start of Guardian Model=============================================

        //=============================End of Guardian Model===============================================
    }