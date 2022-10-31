<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartcontractnotax
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Showing apartment contract no tax
        public function show_apart_contract_no_tax_list(){
            $today = date("Y-m-d");
            //$today = "2022-11-21";
            $query = "SELECT * FROM tbl_apartment_contract_no_tax WHERE DATE_REMIND <= '$today' AND STATUS_APART <> 'WAITING'";
            $result = $this->db->select($query);
            return $result;
        }

        //Showing apartment waiting contract no tax
        public function show_apart_waiting_contract_no_tax_list(){
            $today = date("Y-m-d");
            //$today = "2022-11-21";
            $query = "SELECT tbl_apartment_contract_no_tax.*, tbl_apartment_cart.*
                    FROM tbl_apartment_contract_no_tax INNER JOIN tbl_apartment_cart
                    ON tbl_apartment_contract_no_tax.APARTMENT_CODE = tbl_apartment_cart.APARTMENT_CODE
                    WHERE tbl_apartment_contract_no_tax.DATE_REMIND <= '$today' AND tbl_apartment_contract_no_tax.STATUS_APART = 'WAITING'";
            $result = $this->db->select($query);
            return $result;
        }

        //Set Waiting apartment contract no tax
        public function waiting_apart_contract_no_tax($waitingID){
            $query = "UPDATE tbl_apartment_contract_no_tax 
                    SET STATUS_APART = 'WAITING' 
                    WHERE APARTMENT_CODE = '$waitingID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Redo apartment contract no tax
        public function redo_apart_contract_no_tax($redoID){
            $query = "UPDATE tbl_apartment_contract_no_tax 
                    SET STATUS_APART = 'NOT DONE' 
                    WHERE APARTMENT_CODE = '$redoID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Skip apartment contract no tax
        public function skip_apart_contract_no_tax($skipID){
            $query = "CALL DELETING_APARTMENT_RENTED_NO_TAX('$skipID')";
            $result = $this->db->execute($query);
            return $result;
        }

        //Get apartment contract no tax by id
        public function get_apart_contract_no_tax_by_id($apart_contract_id){
            $query = "SELECT * FROM tbl_apartment_contract_no_tax WHERE APARTMENT_CODE = '$apart_contract_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }
    }
?>