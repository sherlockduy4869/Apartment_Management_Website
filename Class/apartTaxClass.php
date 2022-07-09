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
            $today = date("Y-m-d");
            //$today = "2022-12-12";
            $query = "SELECT * FROM tbl_apartment_money 
                    WHERE (START_DAY_TERM <= '$today' AND '$today' <= END_DAY_TERM) OR '$today' >= END_DAY_TERM";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>