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
        //=============================End of School Model===============================================

//===================================================================================================================================

        //=============================Start of Guardian Model=============================================

        //=============================End of Guardian Model===============================================
    }