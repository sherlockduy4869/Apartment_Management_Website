<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class aparttax
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Showing apartment tax
        public function show_apart_tax_list(){
            $query = "SELECT * FROM tbl_apartment_money";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>