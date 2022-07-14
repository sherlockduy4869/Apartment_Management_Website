<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartselling
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment selling
        public function insert_apart_selling($data){

            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $email_owner = mysqli_real_escape_string($this->db->link, $data['email_owner']);
            $usd_price = mysqli_real_escape_string($this->db->link, $data['usd_price']);
            $vnd_price = mysqli_real_escape_string($this->db->link, $data['vnd_price']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);

            $price_usd =  str_replace(",","",$usd_price);
            $price_vnd = str_replace(",","",$vnd_price);

            $date_input_data = date("Y-m-d");

            $query = "INSERT INTO tbl_apartment_selling(APARTMENT_CODE,AGENCY_NAME,AGENCY_PHONE,AGENCY_EMAIL,AREA_APART,
            HOUSE_OWNER,PHONE_OWNER,EMAIL_OWNER,BEDROOM,SQM,USD_PRICE,VND_PRICE,DATE_INPUT_DATA,NOTE) 
                  VALUES('$apartment_code','$agent_name','$agency_phone','$agency_email','$area','$house_owner','$phone_owner','$email_owner',
                  '$bedroom','$sqm','$price_usd','$price_vnd','$date_input_data','$note')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment for sell succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment for sell failed</span> <br>";
                return $alert;
            }
        }

        //Show apartment selling list
        public function show_apart_selling_list(){
            $query = "SELECT * FROM tbl_apartment_selling";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete apartment selling
        public function delete_apart_selling($delID){
            $query = "DELETE FROM tbl_apartment_selling WHERE APARTMENT_CODE = '$delID'";
            $result = $this->db->delete($query);

            header('Location:apartSelling.php');
        }

        //Get apartment selling information 
        public function get_apart_selling_by_id($apart_selling_id){
            $query = "SELECT * FROM tbl_apartment_selling WHERE APARTMENT_CODE = '$apart_selling_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit infor apartment selling
        public function edit_apart_selling($data, $apart_selling_id){

            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $agency_phone = mysqli_real_escape_string($this->db->link, $data['agency_phone']);
            $agency_email = mysqli_real_escape_string($this->db->link, $data['agency_email']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $email_owner = mysqli_real_escape_string($this->db->link, $data['email_owner']);
            $usd_price = mysqli_real_escape_string($this->db->link, $data['usd_price']);
            $vnd_price = mysqli_real_escape_string($this->db->link, $data['vnd_price']);
            $note = mysqli_real_escape_string($this->db->link, $data['note']);

            $price_usd =  str_replace(",","",$usd_price);
            $price_vnd = str_replace(",","",$vnd_price);

            $date_input_data = date("Y-m-d");

            $query = "UPDATE tbl_apartment_selling SET
                    AGENCY_NAME = '$agent_name'
                    ,AGENCY_PHONE = '$agency_phone'
                    ,AGENCY_EMAIL = '$agency_email'
                    ,AREA_APART = '$area'
                    ,HOUSE_OWNER = '$house_owner'
                    ,PHONE_OWNER = '$phone_owner'
                    ,EMAIL_OWNER = '$email_owner'
                    ,BEDROOM = '$bedroom'
                    ,SQM = '$sqm'
                    ,USD_PRICE = '$price_usd'
                    ,VND_PRICE = '$price_vnd'
                    ,DATE_INPUT_DATA = '$date_input_data'
                    ,NOTE = '$note'
                    WHERE APARTMENT_CODE ='$apart_selling_id'";

            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment for sell succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit apartment for sell failed</span> <br>";
                return $alert;
            }
        }
    }
?>