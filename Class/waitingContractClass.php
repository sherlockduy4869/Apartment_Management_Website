<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class waitingContractApart
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Show apartment waiting list
        public function show_apart_waiting_list(){
            $query = "SELECT * FROM tbl_apartment_waiting";
            $result = $this->db->select($query);
            return $result;
        }

        //Redo apartment contract waiting
        public function redo_apart_contract_waiting($redoID){
            $query_check = "SELECT * FROM tbl_apartment_contract WHERE APARTMENT_CODE = '$redoID'";
            $result = $this->db->select($query_check);

            if(mysqli_num_rows($result) == 1){
                $query_tax = "UPDATE tbl_apartment_contract 
                        SET STATUS_APART = 'NOT DONE' 
                        WHERE APARTMENT_CODE = '$redoID'";
                $query_delete = "DELETE FROM tbl_apartment_waiting WHERE APARTMENT_CODE = '$redoID' ";
                $result_update = $this->db->update($query_tax);
                $result_delete = $this->db->delete($query_delete);
            }
            else{
                $query_no_tax = "UPDATE tbl_apartment_contract_no_tax 
                        SET STATUS_APART = 'NOT DONE' 
                        WHERE APARTMENT_CODE = '$redoID' ";
                $query_delete = "DELETE FROM tbl_apartment_waiting WHERE APARTMENT_CODE = '$redoID' ";
                
                $result_update = $this->db->update($query_no_tax);
                $result_delete = $this->db->delete($query_delete);
            }
        }

        //Redo apartment contract waiting 
        public function skip_apart_contract_waiting($skipID){
            $query_check = "SELECT * FROM tbl_apartment_contract WHERE APARTMENT_CODE = '$skipID'";
            $result = $this->db->select($query_check);

            if(mysqli_num_rows($result) == 1){
                $query_delete_all_tax = "CALL DELETING_APARTMENT_RENTED_TAX('$skipID')";
                $query_delete = "DELETE FROM tbl_apartment_waiting WHERE APARTMENT_CODE = '$skipID' ";

                $result = $this->db->execute($query_delete_all_tax);
                $result_delete = $this->db->delete($query_delete);
            }
            else{
                $query_delete_all_no_tax = "CALL DELETING_APARTMENT_RENTED_NO_TAX('$skipID')";
                $query_delete = "DELETE FROM tbl_apartment_waiting WHERE APARTMENT_CODE = '$skipID' ";

                $result = $this->db->execute($query_delete_all_no_tax);
                $result_delete = $this->db->delete($query_delete);
            }
        }
    }
?>