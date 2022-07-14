<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartnrentednotax
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment rented
        public function insert_apart_rented_no_tax($data){
            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $payment_term = mysqli_real_escape_string($this->db->link, $data['payment_term']);
            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $customer_phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $renting_fee_per_month = mysqli_real_escape_string($this->db->link, $data['renting_fee_per_month']);
            $day_remind_negotiate = mysqli_real_escape_string($this->db->link, $data['day_remind_negotiate']);
            $from = mysqli_real_escape_string($this->db->link, $data['from']);
            $to = mysqli_real_escape_string($this->db->link, $data['to']);

            $rent_fee_per_month =  str_replace(",","",$renting_fee_per_month);

            $start_date = date("Y-m-d", strtotime($from));  
            $end_date = date("Y-m-d", strtotime($to)); 

            $query = "INSERT INTO tbl_apartment_rented_no_tax
            (APARTMENT_CODE,CUTOMER_NAME,CUTOMER_PHONE,CUTOMER_EMAIL,FEE_PER_MONTH,START_DAY,END_DAY,DAY_REMIND,PAYMENT_TERM) 
                  VALUES('$apartment_code','$customer_name','$customer_phone','$customer_email','$rent_fee_per_month','$start_date','$end_date','$day_remind_negotiate','$payment_term')";
        
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment rented no tax succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Apartment must be stored in apartment cart first</span> <br>";
                return $alert;
            }
        }

        //Show aparment rented list
        public function show_apart_rented_list(){
            $query = "SELECT * FROM tbl_apartment_rented";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete apartment cart 
        public function delete_apart_rented($delID){
            //$query = "DELETE FROM tbl_apartment_rented WHERE APARTMENT_CODE = '$delID'";
            $query = "CALL DELETING_APARTMENT_RENTED('$delID')";
            $result = $this->db->delete($query);

            header('Location:apartRented.php');
        }

        //Get apartment cart information 
        public function get_apart_rented_by_id($apart_rented_id){
            $query = "SELECT * FROM tbl_apartment_rented WHERE APARTMENT_CODE = '$apart_rented_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

    }
?>