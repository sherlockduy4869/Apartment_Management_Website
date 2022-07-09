<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class finance
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        //Show status of apartment finance details
        public function show_status_fee_element($apartCode){
            $query = "SELECT * FROM tbl_apartment_finance WHERE APARTMENT_CODE = '$apartCode' ";
            $result = $this->db->select($query);
            return $result;
        }

        //Get duration of aparment details
        public function get_duration_apartment($apartCode){
            $query = "SELECT PAYMENT_TERM,START_DAY_TERM,END_DAY_TERM FROM tbl_apartment_money WHERE APARTMENT_CODE = '$apartCode' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_status_apart_finance($apartCode){
            $query = "SELECT STATUS_APART FROM tbl_apartment_money WHERE APARTMENT_CODE = '$apartCode' ";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>