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
            //$today = "2022-10-25";
            $query = "SELECT * FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today' AND '$today' <= END_DAY";
            $result = $this->db->select($query);
            return $result;
        }

        //Markdone apartment contract
        public function markdone_apart_contract($markdoneID){
            $query = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'DONE' 
                    WHERE APARTMENT_CODE = '$markdoneID'";
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
            $query = "DELETE FROM tbl_apartment_contract WHERE APARTMENT_CODE = '$skipID'";
            $result = $this->db->delete($query);
            return $result;
        }
    }
?>