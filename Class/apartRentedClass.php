<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartrented
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment rented
        public function insert_apart_rented($data){
            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $customer_name = mysqli_real_escape_string($this->db->link, $data['customer_name']);
            $customer_phone = mysqli_real_escape_string($this->db->link, $data['customer_phone']);
            $customer_email = mysqli_real_escape_string($this->db->link, $data['customer_email']);
            $tax_code = mysqli_real_escape_string($this->db->link, $data['tax_code']);
            $tax_declare_form = mysqli_real_escape_string($this->db->link, $data['tax_declare_form']);
            $tax_department = mysqli_real_escape_string($this->db->link, $data['tax_department']);
            $payment_term = mysqli_real_escape_string($this->db->link, $data['payment_term']);
            $renting_fee_per_month = mysqli_real_escape_string($this->db->link, $data['renting_fee_per_month']);
            $tax_fee = mysqli_real_escape_string($this->db->link, $data['tax_fee']);
            $tax_declare_fee = mysqli_real_escape_string($this->db->link, $data['tax_declare_fee']);
            $management_fee = mysqli_real_escape_string($this->db->link, $data['management_fee']);
            $cleaning_fee = mysqli_real_escape_string($this->db->link, $data['cleaning_fee']);
            $refund_for_tenant = mysqli_real_escape_string($this->db->link, $data['refund_for_tenant']);
            $day_remind_negotiate = mysqli_real_escape_string($this->db->link, $data['day_remind_negotiate']);
            $from = mysqli_real_escape_string($this->db->link, $data['from']);
            $to = mysqli_real_escape_string($this->db->link, $data['to']);

            //required
            $rent_fee_per_month =  str_replace(",","",$renting_fee_per_month);
            //no required
            $fee_tax = 0;
            if($tax_fee){
                $fee_tax = str_replace(",","",$tax_fee);
            }
            //required
            $declare_fee_tax = str_replace(",","",$tax_declare_fee);
            //no required
            $fee_management = 0;
            if($management_fee){
                $fee_management = str_replace(",","",$management_fee);
            }
            //no required
            $fee_cleaning = 0;
            if($cleaning_fee){
                $fee_cleaning = str_replace(",","",$cleaning_fee);
            }
            //no required
            $tenant_refund = 0;
            if($refund_for_tenant){
                $tenant_refund = str_replace(",","",$refund_for_tenant);
            }

            $total_amount = $fee_tax + $declare_fee_tax + $fee_management + $fee_cleaning + $tenant_refund;
            $owner_recieved = $rent_fee_per_month - $total_amount;

            $start_date = date("Y-m-d", strtotime($from));  
            $end_date = date("Y-m-d", strtotime($to)); 

            $query = "INSERT INTO tbl_apartment_rented
            (APARTMENT_CODE,CUTOMER_NAME,CUTOMER_PHONE,CUTOMER_EMAIL,TAX_CODE,TAX_DECLARATION_FORM,TAX_APARTMENT,FEE_PER_MONTH,TAX_FEE,TAX_DECLARE,TAX_MANAGEMENT,REFUND_FOR_TENANT,CLEANING_FEE,TOTAL,OWNER_RECIEVED,START_DAY,END_DAY,DAY_REMIND,PAYMENT_TERM) 
                  VALUES('$apartment_code','$customer_name','$customer_phone','$customer_email','$tax_code','$tax_declare_form','$tax_department','$rent_fee_per_month','$fee_tax','$declare_fee_tax','$fee_management','$tenant_refund','$fee_cleaning','$total_amount','$owner_recieved','$start_date','$end_date','$day_remind_negotiate','$payment_term')";
            
            //$query_house_owner = "CALL ADDING_INFO_TAX('$apartment_code')";

            $result = $this->db->insert($query);
            //$result_house_owner = $this->db->execute($query_house_owner);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment rented succesfully</span> <br>";
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