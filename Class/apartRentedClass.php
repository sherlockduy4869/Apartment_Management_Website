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
            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
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

            $rent_fee_per_month =  str_replace(",","",$renting_fee_per_month);
            $fee_tax = str_replace(",","",$tax_fee);
            $declare_fee_tax = str_replace(",","",$tax_declare_fee);
            $fee_management = str_replace(",","",$management_fee);
            $fee_cleaning = str_replace(",","",$cleaning_fee);
            $tenant_refund = str_replace(",","",$refund_for_tenant);


            $query = "INSERT INTO tbl_apartment_rented
            (APARTMENT_CODE,AGENT_NAME,AREA,TAX_CODE,TAX_DECLARATION_FORM,TAX_APARTMENT,FEE_PER_MONTH,TAX_FEE,TAX_DECLARE,TAX_MANAGEMENT,REFUND_FOR_TENANT,CLEANING_FEE,START_DAY,END_DAY,DAY_REMIND,PERIOD) 
                  VALUES('$apartment_code','$agent_name','$area','$tax_code','$tax_declare_form','$tax_department','$rent_fee_per_month','$fee_tax','$declare_fee_tax','$fee_management','$tenant_refund','$fee_cleaning','$from','$to','$day_remind_negotiate','$payment_term')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment rented succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment rented failed</span> <br>";
                return $alert;
            }
        }

    }
?>