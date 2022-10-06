<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/Lib/database.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Helpers/format.php';
?>

<?php

    class apartkey
    {
        private $db ;
        private $fm ;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        //Insert apartment key
        public function insert_apart_key($data){

            $apartment_code = mysqli_real_escape_string($this->db->link, $data['apartment_code']);
            $project = mysqli_real_escape_string($this->db->link, $data['project']);

            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $door_pass = mysqli_real_escape_string($this->db->link, $data['door_pass']);

            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $wifi_pass = mysqli_real_escape_string($this->db->link, $data['wifi_pass']);

            $management_fee = mysqli_real_escape_string($this->db->link, $data['management_fee']);
            $electric_code = mysqli_real_escape_string($this->db->link, $data['electric_code']);

            $internet_code = mysqli_real_escape_string($this->db->link, $data['internet_code']);
            $internet_note = mysqli_real_escape_string($this->db->link, $data['internet_note']);

            $chia_khoa_co_office = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_office']);
            $chia_khoa_co_customer = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_customer']);

            $pn1_office = mysqli_real_escape_string($this->db->link, $data['pn1_office']);
            $pn1_customer = mysqli_real_escape_string($this->db->link, $data['pn1_customer']);

            $pn2_office = mysqli_real_escape_string($this->db->link, $data['pn2_office']);
            $pn2_customer = mysqli_real_escape_string($this->db->link, $data['pn2_customer']);

            $pn3_office = mysqli_real_escape_string($this->db->link, $data['pn3_office']);
            $pn3_customer = mysqli_real_escape_string($this->db->link, $data['pn3_customer']);

            $pn4_office = mysqli_real_escape_string($this->db->link, $data['pn4_office']);
            $pn4_customer = mysqli_real_escape_string($this->db->link, $data['pn4_customer']);

            $balcony_office = mysqli_real_escape_string($this->db->link, $data['balcony_office']);
            $balcony_customer = mysqli_real_escape_string($this->db->link, $data['balcony_customer']);

            $mail_box_office = mysqli_real_escape_string($this->db->link, $data['mail_box_office']);
            $mail_box_customer = mysqli_real_escape_string($this->db->link, $data['mail_box_customer']);

            $note_for_key = mysqli_real_escape_string($this->db->link, $data['note_for_key']);

            $the_thang_may_office = mysqli_real_escape_string($this->db->link, $data['the_thang_may_office']);
            $the_thang_may_customer = mysqli_real_escape_string($this->db->link, $data['the_thang_may_customer']);

            $the_tu_lon_office = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_office']);
            $the_tu_lon_customer = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_customer']);
            
            $the_tu_nho_office = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_office']);
            $the_tu_nho_customer = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_customer']);

            $remote_dieu_hoa = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa']);
            $other_note = mysqli_real_escape_string($this->db->link, $data['other_note']);

            $fee_management = 0;
            if($management_fee){
                $fee_management =  str_replace(",","",$management_fee);
            }

            $query = "INSERT INTO tbl_apartment_key_detail(APARTMENT_CODE,PROJECT,HOUSE_OWNER,DOOR_PASS,BEDROOM,
            WIFI_PASS,MANAGEMENT_FEE,ELECTRIC_CODE,INTERNET_CODE,INTERNET_NOTE,CHIA_KHOA_CO_OFFICE,
            PN1_OFFICE,PN2_OFFICE,PN3_OFFICE,PN4_OFFICE,BALCONY_OFFICE,MAILBOX_OFFICE,
            CHIA_KHOA_CO_CUSTOMER,PN1_CUSTOMER,PN2_CUSTOMER,PN3_CUSTOMER,PN4_CUSTOMER,BALCONY_CUSTOMER,MAILBOX_CUSTOMER,
            NOTE_FOR_KEY,THE_THANG_MAY_OFFICE,THE_TU_LON_OFFICE,THE_TU_NHO_OFFICE,
            THE_THANG_MAY_CUSTOMER,THE_TU_LON_CUSTOMER,THE_TU_NHO_CUSTOMER,REMOTE_DIEU_HOA,OTHER_NOTE) 
                  VALUES('$apartment_code','$project','$house_owner','$door_pass','$bedroom','$wifi_pass','$fee_management',
                  '$electric_code','$internet_code','$internet_note','$chia_khoa_co_office','$pn1_office','$pn2_office',
                  '$pn3_office','$pn4_office','$balcony_office','$mail_box_office','$chia_khoa_co_customer','$pn1_customer',
                  '$pn2_customer','$pn3_customer','$pn4_customer','$balcony_customer','$mail_box_customer','$note_for_key',
                  '$the_thang_may_office','$the_tu_lon_office','$the_tu_nho_office','$the_thang_may_customer','$the_tu_lon_customer'
                  ,'$the_tu_nho_customer','$remote_dieu_hoa','$other_note')";
            $result = $this->db->insert($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Add apartment key succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Add apartment key failed</span> <br>";
                return $alert;
            }
        }

        //Show apartment key list
        public function show_apart_key_list(){
            $query = "SELECT * FROM tbl_apartment_key_detail";
            $result = $this->db->select($query);
            return $result;
        }

        //Delete apartment key
        public function delete_apart_key($delID){
            $query = "DELETE FROM tbl_apartment_key_detail WHERE APARTMENT_CODE = '$delID'";
            $result = $this->db->delete($query);

            header('Location:apartKey.php');
        }

        //Get apartment key information 
        public function get_apart_key_by_id($apart_key_id){
            $query = "SELECT * FROM tbl_apartment_key_detail WHERE APARTMENT_CODE = '$apart_key_id'";
            $result = $this->db->select($query)->fetch_assoc();
            return $result;
        }

        //Edit infor apartment selling
        public function edit_apart_key($data, $apart_key_id){
            $project = mysqli_real_escape_string($this->db->link, $data['project']);

            $house_owner = mysqli_real_escape_string($this->db->link, $data['house_owner']);
            $door_pass = mysqli_real_escape_string($this->db->link, $data['door_pass']);

            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $wifi_pass = mysqli_real_escape_string($this->db->link, $data['wifi_pass']);

            $management_fee = mysqli_real_escape_string($this->db->link, $data['management_fee']);
            $electric_code = mysqli_real_escape_string($this->db->link, $data['electric_code']);

            $internet_code = mysqli_real_escape_string($this->db->link, $data['internet_code']);
            $internet_note = mysqli_real_escape_string($this->db->link, $data['internet_note']);

            $chia_khoa_co_office = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_office']);
            $chia_khoa_co_customer = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_customer']);

            $pn1_office = mysqli_real_escape_string($this->db->link, $data['pn1_office']);
            $pn1_customer = mysqli_real_escape_string($this->db->link, $data['pn1_customer']);

            $pn2_office = mysqli_real_escape_string($this->db->link, $data['pn2_office']);
            $pn2_customer = mysqli_real_escape_string($this->db->link, $data['pn2_customer']);

            $pn3_office = mysqli_real_escape_string($this->db->link, $data['pn3_office']);
            $pn3_customer = mysqli_real_escape_string($this->db->link, $data['pn3_customer']);

            $pn4_office = mysqli_real_escape_string($this->db->link, $data['pn4_office']);
            $pn4_customer = mysqli_real_escape_string($this->db->link, $data['pn4_customer']);

            $balcony_office = mysqli_real_escape_string($this->db->link, $data['balcony_office']);
            $balcony_customer = mysqli_real_escape_string($this->db->link, $data['balcony_customer']);

            $mail_box_office = mysqli_real_escape_string($this->db->link, $data['mail_box_office']);
            $mail_box_customer = mysqli_real_escape_string($this->db->link, $data['mail_box_customer']);

            $note_for_key = mysqli_real_escape_string($this->db->link, $data['note_for_key']);

            $the_thang_may_office = mysqli_real_escape_string($this->db->link, $data['the_thang_may_office']);
            $the_thang_may_customer = mysqli_real_escape_string($this->db->link, $data['the_thang_may_customer']);

            $the_tu_lon_office = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_office']);
            $the_tu_lon_customer = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_customer']);
            
            $the_tu_nho_office = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_office']);
            $the_tu_nho_customer = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_customer']);

            $remote_dieu_hoa = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa']);
            $other_note = mysqli_real_escape_string($this->db->link, $data['other_note']);

            $fee_management = 0;
            if($management_fee){
                $fee_management =  str_replace(",","",$management_fee);
            }

            $query = "UPDATE tbl_apartment_key_detail SET
                    PROJECT = '$project'
                    ,HOUSE_OWNER = '$house_owner'
                    ,DOOR_PASS='$door_pass'
                    ,BEDROOM = '$bedroom'
                    ,WIFI_PASS = '$wifi_pass'
                    ,MANAGEMENT_FEE = '$fee_management'
                    ,ELECTRIC_CODE = '$electric_code'
                    ,INTERNET_CODE = '$internet_code'
                    ,INTERNET_NOTE = '$internet_note'
                    ,CHIA_KHOA_CO_OFFICE = '$chia_khoa_co_office'
                    ,PN1_OFFICE = '$pn1_office'
                    ,PN2_OFFICE = '$pn2_office'
                    ,PN3_OFFICE = '$pn3_office'
                    ,PN4_OFFICE = '$pn4_office'
                    ,BALCONY_OFFICE = '$balcony_office'
                    ,MAILBOX_OFFICE = '$mail_box_office'

                    ,CHIA_KHOA_CO_CUSTOMER = '$chia_khoa_co_customer'
                    ,PN1_CUSTOMER = '$pn1_customer'
                    ,PN2_CUSTOMER = '$pn2_customer'
                    ,PN3_CUSTOMER = '$pn3_customer'
                    ,PN4_CUSTOMER = '$pn4_customer'
                    ,BALCONY_CUSTOMER = '$balcony_customer'
                    ,MAILBOX_CUSTOMER = '$mail_box_customer'

                    ,NOTE_FOR_KEY = '$note_for_key'

                    ,THE_THANG_MAY_OFFICE = '$the_thang_may_office'
                    ,THE_TU_LON_OFFICE = '$the_tu_lon_office'
                    ,THE_TU_NHO_OFFICE = '$the_tu_nho_office'

                    ,THE_THANG_MAY_CUSTOMER = '$the_thang_may_customer'
                    ,THE_TU_LON_CUSTOMER = '$the_tu_lon_customer'
                    ,THE_TU_NHO_CUSTOMER = '$the_tu_nho_customer'

                    ,REMOTE_DIEU_HOA = '$remote_dieu_hoa'
                    ,OTHER_NOTE = '$other_note'

                    WHERE APARTMENT_CODE ='$apart_key_id'";

            $result = $this->db->update($query);

            if($result){
                $alert = "<span class = 'addSuccess'>Edit apartment key succesfully</span> <br>";
                return $alert;
            }
            else{
                $alert = "<span class = 'addError'>Edit apartment key failed</span> <br>";
                return $alert;
            }
        }
    }
?>