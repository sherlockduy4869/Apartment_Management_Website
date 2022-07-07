<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartcart
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment cart
        public function insert_apart_cart($data){

            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $email_owner = mysqli_real_escape_string($this->db->link, $data['email_owner']);

            $query = "INSERT INTO tbl_apartment_cart(APARTMENT_CODE,AGENT_NAME,AREA,HOUSE_OWNER,PHONE,EMAIL,BEDROOM,SQM) 
                  VALUES('$apartment_code','$agent_name','$area','$house_owner','$phone_owner','$email_owner','$bedroom','$sqm')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment cart succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment cart failed</span> <br>";
                return $alert;
            }
        }

        //Show apartment cart list
        public function show_apart_cart_list(){
            $query = "SELECT * FROM tbl_apartment_cart WHERE STATUS = 'AVAILABLE'";
            $result = $this->db->select($query);
            return $result;
        }

        //Show apartment cart list
        public function show_apart_cart_statistic(){
            $query = "SELECT COUNT(APARTMENT_CODE) as NUM_APART,
                             COUNT(AGENT_NAME) as NUM_AGENT,
                             COUNT(AREA) as NUM_AREA,  
                             COUNT(BEDROOM) as NUM_BEDROOM
                             FROM tbl_apartment_cart
                             WHERE STATUS = 'AVAILABLE'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Delete apartment cart 
        public function delete_apart_cart($delID){
            $query = "DELETE FROM tbl_apartment_cart WHERE APARTMENT_CODE = '$delID'";
            $result = $this->db->delete($query);

            header('Location:index.php');
        }

        //Get apartment cart information 
        public function get_apart_cart_by_id($cart_id){
            $query = "SELECT * FROM tbl_apartment_cart WHERE APARTMENT_CODE = '$cart_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        public function edit_apart_cart($data,$cart_id){

            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $email_owner = mysqli_real_escape_string($this->db->link, $data['email_owner']);

            $query = "UPDATE tbl_apartment_cart SET
                    AGENT_NAME = '$agent_name'
                    ,AREA = '$area'
                    ,HOUSE_OWNER = '$house_owner'
                    ,PHONE = '$phone_owner'
                    ,EMAIL = '$email_owner'
                    ,BEDROOM = '$bedroom'
                    ,SQM = '$sqm'
                    WHERE APARTMENT_CODE ='$cart_id'";

            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment cart successfully</span><br>";
                return $alert;
            }

            $alert = "<span class = 'addError'>Can not edit apartment cart</span> <br>";
            return $alert;
        }
    }
?>