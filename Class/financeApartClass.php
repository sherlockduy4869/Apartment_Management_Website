<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class finance
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        
        public function show_status_fee_element($apartCode){
            $query = "SELECT * FROM tbl_apartment_finance WHERE APARTMENT_CODE = '$apartCode' ";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>