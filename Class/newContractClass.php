<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartNewContract
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        /*NEW CONTRACT NO TAX AREA*/

        //Showing apartment new contract no tax
        public function show_apart_new_contract_no_tax__list(){
            $query = "SELECT * FROM tbl_apartment_rented_no_tax_new_contract";
            $result = $this->db->select($query);
            return $result;
        }

        //Redo apartment new contract no tax
        public function re_do_new_contract_no_tax($redoID){
            $query_delete = "DELETE FROM tbl_apartment_rented_no_tax_new_contract WHERE APARTMENT_CODE = '$redoID'";
            $result_delete = $this->db->delete($query_delete);

            $query_update = "UPDATE tbl_apartment_contract_no_tax 
                    SET STATUS_APART = 'NOT DONE' 
                    WHERE APARTMENT_CODE = '$redoID'";
            $result_update = $this->db->update($query_update);
            header('Location:newContract.php');
        }
        
        //Get apartment new contract no tax information 
        public function get_apart_new_contract_no_tax_by_id($apart_new_contract_no_tax_id){
            $query = "SELECT * FROM tbl_apartment_rented_no_tax_new_contract WHERE APARTMENT_CODE = '$apart_new_contract_no_tax_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit apartment new contract no tax information
        public function edit_apart_new_contract_no_tax($data, $apart_new_contract_no_tax_id){
            $payment_term = mysqli_real_escape_string($this->db->link, $data['payment_term']);
            $agency_name = mysqli_real_escape_string($this->db->link, $data['agency_name']);
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $customer_phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $renting_fee_per_month = mysqli_real_escape_string($this->db->link, $data['renting_fee_per_month']);
            $management_Fee = mysqli_real_escape_string($this->db->link, $data['management_Fee']);
            $day_remind_negotiate = mysqli_real_escape_string($this->db->link, $data['day_remind_negotiate']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);
            $from = mysqli_real_escape_string($this->db->link, $data['from']);
            $to = mysqli_real_escape_string($this->db->link, $data['to']);

            $rent_fee_per_month =  str_replace(",","",$renting_fee_per_month);
            $management_fee = 0;
            if($management_Fee){
                $management_fee =  str_replace(",","",$management_Fee);
            }
            $owner_recieved = $rent_fee_per_month - $management_fee;

            $start_date = date("Y-m-d", strtotime($from));  
            $end_date = date("Y-m-d", strtotime($to)); 

            $query = "UPDATE tbl_apartment_rented_no_tax_new_contract SET
                    AGENCY_NAME = '$agency_name'
                    ,AGENCY_PHONE = '$agency_phone'
                    ,AGENCY_EMAIL = '$agency_email'
                    ,CUTOMER_NAME = '$customer_name'
                    ,CUTOMER_PHONE = '$customer_phone'
                    ,CUTOMER_EMAIL = '$customer_email'
                    ,FEE_PER_MONTH = '$rent_fee_per_month'
                    ,MANAGEMENT_FEE = '$management_fee'
                    ,OWNER_RECIEVED = '$owner_recieved'
                    ,START_DAY = '$start_date'
                    ,END_DAY = '$end_date'
                    ,DAY_REMIND = '$day_remind_negotiate'
                    ,PAYMENT_TERM = '$payment_term'
                    ,NOTE = '$note'
                    WHERE APARTMENT_CODE ='$apart_new_contract_no_tax_id'";
            
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment new contract no tax succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Failed to edit apartment new contract no tax</span> <br>";
                return $alert;
            }
        }

        //Push apartment new contract no tax
        public function push_apart_new_contract_no_tax($pushID){
            $query_delete_old_data = "CALL DELETING_APARTMENT_RENTED_NO_TAX('$pushID')";
            $result_delete_old_data = $this->db->execute($query_delete_old_data);
            
            $query_pushing_new_contract = "CALL PUSHING_NEW_CONTRACT('$pushID')";
            $result_pushing_new_contract =  $this->db->execute($query_pushing_new_contract);

            $query_no_tax = "CALL ADDING_INFO_NO_TAX('$pushID')";
            $result_no_tax = $this->db->execute($query_no_tax);

            $query_delete_new_contract = "DELETE FROM tbl_apartment_rented_no_tax_new_contract WHERE APARTMENT_CODE = '$pushID'";
            $result_delete_new_contract = $this->db->delete($query_delete_new_contract);

            header('Location:newContract.php');
        }
        /*END*/

        /*NEW CONTRACT TAX AREA*/

        //Showing apartment new contract tax
        public function show_apart_new_contract_tax_list(){
            $query = "SELECT * FROM tbl_apartment_rented_new_contract";
            $result = $this->db->select($query);
            return $result;
        }

        //Redo apartment new contract tax
        public function re_do_new_contract_tax($redoID){
            $query_delete = "DELETE FROM tbl_apartment_rented_new_contract WHERE APARTMENT_CODE = '$redoID'";
            $result_delete = $this->db->delete($query_delete);

            $query_update = "UPDATE tbl_apartment_contract 
                    SET STATUS_APART = 'NOT DONE' 
                    WHERE APARTMENT_CODE = '$redoID'";
            $result_update = $this->db->update($query_update);
            header('Location:newContractTax.php');
        }

        //Get apartment new contract tax information 
        public function get_apart_new_contract_tax_by_id($apart_new_contract_tax_id){
            $query = "SELECT * FROM tbl_apartment_rented_new_contract WHERE APARTMENT_CODE = '$apart_new_contract_tax_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit apartment new contract tax information
        public function edit_apart_new_contract_tax($data, $apart_new_contract_tax_id){
            $payment_term = mysqli_real_escape_string($this->db->link, $data['payment_term']);
            $agency_name = mysqli_real_escape_string($this->db->link, $data['agency_name']);
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $customer_phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $renting_fee_per_month = mysqli_real_escape_string($this->db->link, $data['renting_fee_per_month']);
            $management_Fee = mysqli_real_escape_string($this->db->link, $data['management_Fee']);
            $day_remind_negotiate = mysqli_real_escape_string($this->db->link, $data['day_remind_negotiate']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);
            $from = mysqli_real_escape_string($this->db->link, $data['from']);
            $to = mysqli_real_escape_string($this->db->link, $data['to']);

            $rent_fee_per_month =  str_replace(",","",$renting_fee_per_month);
            $management_fee = 0;
            if($management_Fee){
                $management_fee =  str_replace(",","",$management_Fee);
            }
            $owner_recieved = $rent_fee_per_month - $management_fee;

            $start_date = date("Y-m-d", strtotime($from));  
            $end_date = date("Y-m-d", strtotime($to)); 

            $query = "UPDATE tbl_apartment_rented_no_tax_new_contract SET
                    AGENCY_NAME = '$agency_name'
                    ,AGENCY_PHONE = '$agency_phone'
                    ,AGENCY_EMAIL = '$agency_email'
                    ,CUTOMER_NAME = '$customer_name'
                    ,CUTOMER_PHONE = '$customer_phone'
                    ,CUTOMER_EMAIL = '$customer_email'
                    ,FEE_PER_MONTH = '$rent_fee_per_month'
                    ,MANAGEMENT_FEE = '$management_fee'
                    ,OWNER_RECIEVED = '$owner_recieved'
                    ,START_DAY = '$start_date'
                    ,END_DAY = '$end_date'
                    ,DAY_REMIND = '$day_remind_negotiate'
                    ,PAYMENT_TERM = '$payment_term'
                    ,NOTE = '$note'
                    WHERE APARTMENT_CODE ='$apart_new_contract_tax_id'";
            
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment new contract no tax succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Failed to edit apartment new contract no tax</span> <br>";
                return $alert;
            }
        }
    }
?>