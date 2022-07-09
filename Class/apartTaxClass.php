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

        //Markdone apartment tax
        public function markdone_apart_tax($markdoneID){
            $query = "UPDATE tbl_apartment_money 
                    SET STATUS_APART = 'Collected' 
                    WHERE APARTMENT_CODE = '$markdoneID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Redo apartment tax
        public function redo_apart_tax($redoID){
            $query = "UPDATE tbl_apartment_money 
                    SET STATUS_APART = 'Not yet collected' 
                    WHERE APARTMENT_CODE = '$redoID'";
            $result = $this->db->update($query);
            return $result;
        }

        //Skip apartment tax
        public function skip_apart_tax($nextID){
            $query = "CALL NEXT_MONEY_DAY('$nextID')";
            $result = $this->db->execute($query);
            return $result;
        }
    }
?>