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

            $query = "INSERT INTO tbl_apartment_selling(APARTMENT_CODE,AGENCY_NAME,AREA_APART,
            HOUSE_OWNER,PHONE_OWNER,EMAIL_OWNER,BEDROOM,SQM,USD_PRICE,VND_PRICE,DATE_INPUT_DATA,NOTE) 
                  VALUES('$apartment_code','$agent_name','$area','$house_owner','$phone_owner','$email_owner',
                  '$bedroom','$sqm','$price_usd','$price_vnd','$date_input_data','$note')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment selling succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment selling failed</span> <br>";
                return $alert;
            }
        }

        //Show apartment selling list
        public function show_apart_selling_list(){
            $query = "SELECT * FROM tbl_apartment_selling";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>