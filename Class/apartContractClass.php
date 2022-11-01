<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartcontract
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Showing apartment contract
        public function show_apart_contract_list(){
            $today = date("Y-m-d");
            // $query = "SELECT * FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today' AND '$today' <= END_DAY";
            $query = "SELECT * FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today' AND STATUS_APART <> 'WAITING'";
            $result = $this->db->select($query);
            return $result;
        }

        //Showing apartment contract waiting list
        public function show_apart_Waiting_contract_tax(){
            $today = date("Y-m-d");
            // $query = "SELECT * FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today' AND '$today' <= END_DAY";
            $query = "SELECT tbl_apartment_contract.*, tbl_apartment_cart.*
            FROM tbl_apartment_contract INNER JOIN tbl_apartment_cart
            ON tbl_apartment_contract.APARTMENT_CODE = tbl_apartment_cart.APARTMENT_CODE
            WHERE tbl_apartment_contract.DATE_REMIND <= '$today' AND tbl_apartment_contract.STATUS_APART = 'WAITING'";
            $result = $this->db->select($query);
            return $result;
        }

        //Waiting apartment contract
        public function waiting_apart_contract($waitingID){
            $query = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'WAITING' 
                    WHERE APARTMENT_CODE = '$waitingID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Get apartment contract by id
        public function get_apart_contract_by_id($apart_contract_id){
            $query = "SELECT * FROM tbl_apartment_contract WHERE APARTMENT_CODE = '$apart_contract_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }
    }
?>