<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartNewContractNoTax
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Showing apartment new contract no tax
        public function show_apart_new_contract_no_tax__list(){
            $query = "SELECT * FROM tbl_apartment_rented_no_tax_new_contract";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>