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
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $status_apart = mysqli_real_escape_string($this->db->link, $data['status_apart']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);

            $query = "INSERT INTO tbl_apartment_not_rented(APARTMENT_CODE,AGENCY_NAME,AGENCY_PHONE,AGENCY_EMAIL,AREA_APART,
            HOUSE_OWNER,PHONE_OWNER,BEDROOM,SQM,STATUS_APART,NOTE) 
                  VALUES('$apartment_code','$agent_name','$agency_phone','$agency_email','$area','$house_owner','$phone_owner','$bedroom','$sqm','$status_apart','$note')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment UC succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment UC failed</span> <br>";
                return $alert;
            }
        }

        //Showing apartment not rented
        public function show_apart_not_rented_list(){
            $query = "SELECT * FROM tbl_apartment_not_rented";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete apartment not rented
        public function delete_apart_not_rented($delID){
            $query = "DELETE FROM tbl_apartment_not_rented WHERE APARTMENT_CODE = '$delID'";
            $result = $this->db->delete($query);

            header('Location:apartNotRented.php');
        }

        //Get apartment selling information 
        public function get_apart_not_rented_by_id($apart_not_rented_id){
            $query = "SELECT * FROM tbl_apartment_not_rented WHERE APARTMENT_CODE = '$apart_not_rented_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit apartment not rented
        public function edit_apart_not_rented($data, $apart_not_rented_id){

            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $status_apart = mysqli_real_escape_string($this->db->link, $data['status_apart']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);

            $query = "UPDATE tbl_apartment_not_rented SET
                    AGENCY_NAME = '$agent_name'
                    ,AREA_APART = '$area'
                    ,AGENCY_PHONE = '$agency_phone'
                    ,AGENCY_EMAIL = '$agency_email'
                    ,HOUSE_OWNER = '$house_owner'
                    ,PHONE_OWNER = '$phone_owner'
                    ,BEDROOM = '$bedroom'
                    ,SQM = '$sqm'
                    ,STATUS_APART = '$status_apart'
                    ,NOTE = '$note'
                    WHERE APARTMENT_CODE ='$apart_not_rented_id'";

            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment UC succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit apartment UC failed</span> <br>";
                return $alert;
            }

        }
    }
?>