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

        //Check status for apartment finance
        public function check_status_apart_finance($apartCode){
            $query = "SELECT STATUS_APART FROM tbl_apartment_money WHERE APARTMENT_CODE = '$apartCode' ";
            $result = $this->db->select($query);
            return $result;
        }

        //Update status finance for apartment finance
        public function update_finance($apartCode,$status,$current_value){
            $query = "UPDATE tbl_apartment_finance
                    SET $status = '$current_value'
                    WHERE APARTMENT_CODE = '$apartCode'";
            $result = $this->db->update($query);
            header('Location:financeApart.php?apartCode='.$apartCode);
        }
    }
?>