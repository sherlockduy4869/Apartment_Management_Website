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
            $query = "SELECT * FROM tbl_apartment_contract";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>