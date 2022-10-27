<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class dataAnalytic
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Get number apart available for rent and percentage
        public function get_apart_for_rent_percentage(){
            $query_cart_available = "SELECT COUNT(tbl_apartment_cart.APARTMENT_CODE) AS QUAN_APART_AVAILABLE FROM tbl_apartment_cart WHERE STATUS_APART = 'AVAILABLE'";
            $result_cart_available = $this->db->select($query_cart_available)->fetch_assoc();
            $num_cart_available = $result_cart_available['QUAN_APART_AVAILABLE'];

            $query_cart= "SELECT COUNT(tbl_apartment_cart.APARTMENT_CODE) AS QUAN_APART FROM tbl_apartment_cart";
            $result_cart = $this->db->select($query_cart)->fetch_assoc();
            $num_cart = $result_cart['QUAN_APART'];

            $percentage = ($num_cart_available / $num_cart)*100;

            $result_array = array();
            array_push($result_array, $num_cart_available, $percentage);

            return $result_array;
        }

        //Get number apart rented with tax and percentage
        public function get_apart_rented_with_tax_percentage(){
            $query_cart= "SELECT COUNT(tbl_apartment_cart.APARTMENT_CODE) AS QUAN_APART FROM tbl_apartment_cart";
            $result_cart = $this->db->select($query_cart)->fetch_assoc();
            $num_cart = $result_cart['QUAN_APART'];

            $query_rented_tax = "SELECT COUNT(tbl_apartment_rented.APARTMENT_CODE) AS QUAN_APART_RENTED_TAX FROM tbl_apartment_rented";
            $result_rented_tax = $this->db->select($query_rented_tax)->fetch_assoc();
            $num_rented_tax = $result_rented_tax['QUAN_APART_RENTED_TAX'];

            $percentage = ($num_rented_tax / $num_cart)*100;

            $result_array = array();
            array_push($result_array, $num_rented_tax, $percentage);

            return $result_array;
        }

        //Get number apart rented with no tax and percentage
        public function get_apart_rented_with_no_tax_percentage(){
            $query_cart= "SELECT COUNT(tbl_apartment_cart.APARTMENT_CODE) AS QUAN_APART FROM tbl_apartment_cart";
            $result_cart = $this->db->select($query_cart)->fetch_assoc();
            $num_cart = $result_cart['QUAN_APART'];

            $query_rented_no_tax = "SELECT COUNT(tbl_apartment_rented_no_tax.APARTMENT_CODE) AS QUAN_APART_RENTED_NO_TAX FROM tbl_apartment_rented_no_tax";
            $result_rented_no_tax = $this->db->select($query_rented_no_tax)->fetch_assoc();
            $num_rented_no_tax = $result_rented_no_tax['QUAN_APART_RENTED_NO_TAX'];

            $percentage = ($num_rented_no_tax / $num_cart)*100;

            $result_array = array();
            array_push($result_array, $num_rented_no_tax, $percentage);

            return $result_array;
        }

        //Get number apart rented tax contract and percentage
        public function get_apart_rented_tax_contract_percentage(){
            $today = date("Y-m-d");

            $query_rented_tax_contract = "SELECT COUNT(tbl_apartment_contract.APARTMENT_CODE) AS QUAN_APART_RENTED_TAX_CONTRACT 
                                            FROM tbl_apartment_contract WHERE DATE_REMIND <= '$today'";
            $result_rented_tax_contract= $this->db->select($query_rented_tax_contract)->fetch_assoc();
            $num_rented_tax_contract = $result_rented_tax_contract['QUAN_APART_RENTED_TAX_CONTRACT'];

            if(!$num_rented_tax_contract){
                $num_rented_tax_contract = 1;
            }

            $query_rented_tax_contract_not_done = "SELECT COUNT(tbl_apartment_contract.APARTMENT_CODE) AS QUAN_APART_RENTED_TAX_CONTRACT_NOT_DONE
                                                FROM tbl_apartment_contract WHERE (DATE_REMIND <= '$today') AND (STATUS_APART='NOT DONE') ";

            $result_rented_tax_contract_not_done= $this->db->select($query_rented_tax_contract_not_done)->fetch_assoc();
            $num_rented_tax_contract_not_done = $result_rented_tax_contract_not_done['QUAN_APART_RENTED_TAX_CONTRACT_NOT_DONE'];

            $percentage = ($num_rented_tax_contract_not_done / $num_rented_tax_contract)*100;

            $result_array = array();
            array_push($result_array, $num_rented_tax_contract_not_done, $percentage);

            return $result_array;
        }

        //Get number apart rented no tax contract and percentage
        public function get_apart_rented_no_tax_contract_percentage(){
            $today = date("Y-m-d");

            $query_rented_no_tax_contract = "SELECT COUNT(tbl_apartment_contract_no_tax.APARTMENT_CODE) AS QUAN_APART_RENTED_NO_TAX_CONTRACT 
                                            FROM tbl_apartment_contract_no_tax WHERE DATE_REMIND <= '$today'";
            $result_rented_no_tax_contract= $this->db->select($query_rented_no_tax_contract)->fetch_assoc();
            $num_rented_no_tax_contract = $result_rented_no_tax_contract['QUAN_APART_RENTED_NO_TAX_CONTRACT'];

            $query_rented_no_tax_contract_not_done = "SELECT COUNT(tbl_apartment_contract_no_tax.APARTMENT_CODE) AS QUAN_APART_RENTED_NO_TAX_CONTRACT_NOT_DONE
                                                FROM tbl_apartment_contract_no_tax WHERE (DATE_REMIND <= '$today')
                                                AND (STATUS_APART = 'NOT DONE')";
            
            

            $result_rented_no_tax_contract_not_done= $this->db->select($query_rented_no_tax_contract_not_done)->fetch_assoc();
            $num_rented_no_tax_contract_not_done = $result_rented_no_tax_contract_not_done['QUAN_APART_RENTED_NO_TAX_CONTRACT_NOT_DONE'];

            if(!$num_rented_no_tax_contract){
                $num_rented_no_tax_contract = 1;
            }

            $percentage = ($num_rented_no_tax_contract_not_done / $num_rented_no_tax_contract)*100;

            $result_array = array();
            array_push($result_array, $num_rented_no_tax_contract_not_done, $percentage);

            return $result_array;
        }

        //Get number apart rented need to collect tax fee and its percentage
        public function get_apart_rented_money_percentage(){
            $today = date("Y-m-d");

            $query_rented_money = "SELECT COUNT(tbl_apartment_money.APARTMENT_CODE) AS QUAN_APART_RENTED_MONEY
                                    FROM tbl_apartment_money INNER JOIN tbl_apartment_rented
                                    ON tbl_apartment_money.APARTMENT_CODE = tbl_apartment_rented.APARTMENT_CODE
                                    WHERE ((tbl_apartment_money.START_DAY_TERM <= '$today' AND '$today' <= tbl_apartment_money.END_DAY_TERM) OR '$today' >= tbl_apartment_money.END_DAY_TERM)
                                    AND (tbl_apartment_rented.END_DAY > tbl_apartment_money.END_DAY_TERM)";

            $result_rented_money= $this->db->select($query_rented_money)->fetch_assoc();
            $num_rented_money = $result_rented_money['QUAN_APART_RENTED_MONEY'];

            $query_rented_money_not_collected = "SELECT COUNT(tbl_apartment_money.APARTMENT_CODE) AS QUAN_APART_RENTED_MONEY_NOT_COLLECTED
                                                    FROM tbl_apartment_money INNER JOIN tbl_apartment_rented
                                                    ON tbl_apartment_money.APARTMENT_CODE = tbl_apartment_rented.APARTMENT_CODE
                                                    WHERE ((tbl_apartment_money.START_DAY_TERM <= '$today' AND '$today' <= tbl_apartment_money.END_DAY_TERM) OR '$today' >= tbl_apartment_money.END_DAY_TERM)
                                                    AND (tbl_apartment_rented.END_DAY > tbl_apartment_money.END_DAY_TERM) AND (STATUS_APART = 'Not yet collected')";

            $result_rented_money_not_colleted = $this->db->select($query_rented_money_not_collected)->fetch_assoc();
            $num_rented_money_not_collected = $result_rented_money_not_colleted['QUAN_APART_RENTED_MONEY_NOT_COLLECTED'];

            $percentage = ($num_rented_money_not_collected / $num_rented_money)*100;

            $result_array = array();
            array_push($result_array, $num_rented_money_not_collected, $percentage);

            return $result_array;
        }
    }
?>