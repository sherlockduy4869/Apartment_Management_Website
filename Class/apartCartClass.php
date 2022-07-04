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
        public function insert_apart_cart($data, $files){

            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $agent_name = mysqli_real_escape_string($this->db->link, $data['agent_name']);
            $area = mysqli_real_escape_string($this->db->link, $data['area']);
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $sqm = mysqli_real_escape_string($this->db->link, $data['sqm']);
            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $phone_owner = mysqli_real_escape_string($this->db->link, $data['phone_owner']);


            $permited = array('jpg','jpeg','png','jfif');
            $file_name = $_FILES['image_owner']['name'];
            $file_size = $_FILES['image_owner']['size'];
            $file_temp = $_FILES['image_owner']['tmp_name'];
            
            $div = explode('.',$file_name);
            $file_ext = strtolower(end($div));

            $upload_image ="Uploads/".$file_name;
            //$upload_image = $_SERVER['DOCUMENT_ROOT']."/Uploads/".$file_name;

            if($file_size > 1000000){
                $alert = "<span class = 'addError'>Image size should be less than 1MB</span> <br>";
                return $alert;
            }
            elseif (in_array($file_ext,$permited) === false){
                $alert = "<span class = 'addError'>You can up load only:-".implode(',',$permited)."</span> <br>" ;
                return $alert;
            }
            
            move_uploaded_file($file_temp,$upload_image);

            $query = "INSERT INTO tbl_apartment_cart(APARTMENT_CODE,AGENT_NAME,AREA,HOUSE_OWNER,PHONE,BEDROOM,SQM,IMG_OWNER) 
                  VALUES('$apartment_code','$agent_name','$area','$house_owner','$phone_owner','$bedroom','$sqm','$file_name')";
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
            $query = "SELECT * FROM tbl_apartment_cart";
            $result = $this->db->insert($query);
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
    }
?>