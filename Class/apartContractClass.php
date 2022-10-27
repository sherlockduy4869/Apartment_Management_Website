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
            $query = "SELECT * FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today' AND STATUS_APART <> 'NEW_CONTRACT'";
            $result = $this->db->select($query);
            return $result;
        }

        //Markdone apartment contract
        public function waiting_apart_contract($waitingID){
            $query = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'WAITING' 
                    WHERE APARTMENT_CODE = '$waitingID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Markdone apartment contract
        public function new_contract_apart_contract_tax($newContractID){
            $query = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'NEW_CONTRACT' 
                    WHERE APARTMENT_CODE = '$newContractID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Redo apartment contract
        public function redo_apart_contract($redoID){
            $query = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'NOT DONE' 
                    WHERE APARTMENT_CODE = '$redoID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Skip apartment contract
        public function skip_apart_contract($skipID){
            $query = "CALL DELETING_APARTMENT_RENTED_TAX('$skipID')";
            $result = $this->db->delete($query);
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