<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartnotrented
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment not rented
        public function insert_apart_not_rented($data){

            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $status_apart = mysqli_real_escape_string($this->db->link, $data['status_apart']);

            $query = "INSERT INTO tbl_apartment_not_rented(APARTMENT_CODE,AGENCY_NAME,AREA_APART,
            HOUSE_OWNER,PHONE_OWNER,BEDROOM,SQM,STATUS_APART) 
                  VALUES('$apartment_code','$agent_name','$area','$house_owner','$phone_owner','$bedroom','$sqm','$status_apart')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment not rented succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment not rented failed</span> <br>";
                return $alert;
            }
        }
    }
?>