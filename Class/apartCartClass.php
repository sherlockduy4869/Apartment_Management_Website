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
            $apart_price = mysqli_real_escape_string($this->db->link, $data['apart_price']);
            $status_furniture = mysqli_real_escape_string($this->db->link, $data['status_furniture']);

            $price =  str_replace(",","",$apart_price);

            $query = "INSERT INTO tbl_apartment_cart(APARTMENT_CODE,AGENCY_NAME,AREA_APART,HOUSE_OWNER,PHONE_OWNER,EMAIL_OWNER,BEDROOM,SQM,PRICE,STATUS_FURNITURE) 
                  VALUES('$apartment_code','$agent_name','$area','$house_owner','$phone_owner','$email_owner','$bedroom','$sqm','$price','$status_furniture')";
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
            $query = "SELECT * FROM tbl_apartment_cart WHERE STATUS_APART = 'AVAILABLE'";
            $result = $this->db->select($query);
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

        //Edit apartment cart information
        public function edit_apart_cart($data,$cart_id){

            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);
            $email_owner = mysqli_real_escape_string($this->db->link, $data['email_owner']);
            $apart_price = mysqli_real_escape_string($this->db->link, $data['apart_price']);
            $status_furniture = mysqli_real_escape_string($this->db->link, $data['status_furniture']);

            $price =  str_replace(",","",$apart_price);

            $query = "UPDATE tbl_apartment_cart SET
                    AGENCY_NAME = '$agent_name'
                    ,AREA_APART = '$area'
                    ,HOUSE_OWNER = '$house_owner'
                    ,PHONE_OWNER = '$phone_owner'
                    ,EMAIL_OWNER = '$email_owner'
                    ,BEDROOM = '$bedroom'
                    ,SQM = '$sqm'
                    ,PRICE = '$price'
                    ,STATUS_FURNITURE = '$status_furniture'
                    WHERE APARTMENT_CODE ='$cart_id'";

            $query_house_owner = "CALL ADDING_HOUSE_OWNER_INFO('$cart_id')";

            $result = $this->db->update($query);
            $result_house_owner = $this->db->execute($query_house_owner);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment cart successfully</span><br>";
                return $alert;
            }

            $alert = "<span class = 'addError'>Can not edit apartment cart</span> <br>";
            return $alert;
        }
    }
?>