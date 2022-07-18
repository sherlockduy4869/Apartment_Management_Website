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
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $door_pass = mysqli_real_escape_string($this->db->link, $data['door_pass']);
            $management_fee = mysqli_real_escape_string($this->db->link, $data['management_fee']);

            $wifi_pass = mysqli_real_escape_string($this->db->link, $data['wifi_pass']);
            $electric_code = mysqli_real_escape_string($this->db->link, $data['electric_code']);
            $pn1 = mysqli_real_escape_string($this->db->link, $data['pn1']);
            $key_info = mysqli_real_escape_string($this->db->link, $data['key_info']);
            $pn2 = mysqli_real_escape_string($this->db->link, $data['pn2']);
            $kho = mysqli_real_escape_string($this->db->link, $data['kho']);
            $pn3 = mysqli_real_escape_string($this->db->link, $data['pn3']);
            $lo_gia = mysqli_real_escape_string($this->db->link, $data['lo_gia']);

            $pn4 = mysqli_real_escape_string($this->db->link, $data['pn4']);
            $balcony = mysqli_real_escape_string($this->db->link, $data['balcony']);
            $internet_code = mysqli_real_escape_string($this->db->link, $data['internet_code']);
            $internet_note = mysqli_real_escape_string($this->db->link, $data['internet_note']);
            $the_cu_dan = mysqli_real_escape_string($this->db->link, $data['the_cu_dan']);
            $the_cu_dan_note = mysqli_real_escape_string($this->db->link, $data['the_cu_dan_note']);

            $chia_khoa_co = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co']);
            $chia_khoa_co_note = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_note']);
            $the_tu_lon = mysqli_real_escape_string($this->db->link, $data['the_tu_lon']);

            $the_tu_lon_note = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_note']);
            $the_tu_nho = mysqli_real_escape_string($this->db->link, $data['the_tu_nho']);
            $the_tu_nho_note = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_note']);
            $key_hom_thu = mysqli_real_escape_string($this->db->link, $data['key_hom_thu']);
            $key_hom_thu_note = mysqli_real_escape_string($this->db->link, $data['key_hom_thu_note']);
            $remote_dieu_hoa = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa']);
            $remote_dieu_hoa_note = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa_note']);

            $other_note = mysqli_real_escape_string($this->db->link, $data['other_note']);

            $fee_management = 0;
            if($management_fee){
                $fee_management =  str_replace(",","",$management_fee);
            }

            $query = "INSERT INTO tbl_apartment_key_detail(APARTMENT_CODE,PROJECT,BEDROOM,DOOR_PASS,
            WIFI_PASS,MANAGEMENT_FEE,ELECTRIC_CODE,INTERNET_CODE,KEY_INFO,PN1,PN2,PN3,PN4,KHO,LO_GIA,
            BALCONY,THE_CU_DAN,CHIA_KHOA_CO,THE_TU_LON,THE_TU_NHO,KEY_HOM_THU,REMOTE_DIEU_HOA,INTERNET_NOTE,
            THE_CU_DAN_NOTE,CHIA_KHOA_CO_NOTE,THE_TU_LON_NOTE,THE_TU_NHO_NOTE,KEY_HOM_THU_NOTE,REMOTE_DIEU_HOA_NOTE,OTHER_NOTE) 
                  VALUES('$apartment_code','$project','$bedroom','$door_pass','$wifi_pass','$fee_management',
                  '$electric_code','$internet_code','$key_info','$pn1','$pn2','$pn3','$pn4',
                  '$kho','$lo_gia','$balcony','$the_cu_dan','$chia_khoa_co','$the_tu_lon','$the_tu_nho',
                  '$key_hom_thu','$remote_dieu_hoa','$internet_note','$the_cu_dan_note','$chia_khoa_co_note',
                  '$the_tu_lon_note','$the_tu_nho_note','$key_hom_thu_note','$remote_dieu_hoa_note','$other_note')";
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
            $bedroom = mysqli_real_escape_string($this->db->link, $data['bedroom']);
            $door_pass = mysqli_real_escape_string($this->db->link, $data['door_pass']);
            $management_fee = mysqli_real_escape_string($this->db->link, $data['management_fee']);

            $wifi_pass = mysqli_real_escape_string($this->db->link, $data['wifi_pass']);
            $electric_code = mysqli_real_escape_string($this->db->link, $data['electric_code']);
            $pn1 = mysqli_real_escape_string($this->db->link, $data['pn1']);
            $key_info = mysqli_real_escape_string($this->db->link, $data['key_info']);
            $pn2 = mysqli_real_escape_string($this->db->link, $data['pn2']);
            $kho = mysqli_real_escape_string($this->db->link, $data['kho']);
            $pn3 = mysqli_real_escape_string($this->db->link, $data['pn3']);
            $lo_gia = mysqli_real_escape_string($this->db->link, $data['lo_gia']);

            $pn4 = mysqli_real_escape_string($this->db->link, $data['pn4']);
            $balcony = mysqli_real_escape_string($this->db->link, $data['balcony']);
            $internet_code = mysqli_real_escape_string($this->db->link, $data['internet_code']);
            $internet_note = mysqli_real_escape_string($this->db->link, $data['internet_note']);
            $the_cu_dan = mysqli_real_escape_string($this->db->link, $data['the_cu_dan']);
            $the_cu_dan_note = mysqli_real_escape_string($this->db->link, $data['the_cu_dan_note']);

            $chia_khoa_co = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co']);
            $chia_khoa_co_note = mysqli_real_escape_string($this->db->link, $data['chia_khoa_co_note']);
            $the_tu_lon = mysqli_real_escape_string($this->db->link, $data['the_tu_lon']);

            $the_tu_lon_note = mysqli_real_escape_string($this->db->link, $data['the_tu_lon_note']);
            $the_tu_nho = mysqli_real_escape_string($this->db->link, $data['the_tu_nho']);
            $the_tu_nho_note = mysqli_real_escape_string($this->db->link, $data['the_tu_nho_note']);
            $key_hom_thu = mysqli_real_escape_string($this->db->link, $data['key_hom_thu']);
            $key_hom_thu_note = mysqli_real_escape_string($this->db->link, $data['key_hom_thu_note']);
            $remote_dieu_hoa = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa']);
            $remote_dieu_hoa_note = mysqli_real_escape_string($this->db->link, $data['remote_dieu_hoa_note']);

            $other_note = mysqli_real_escape_string($this->db->link, $data['other_note']);

            $fee_management = 0;
            if($management_fee){
                $fee_management =  str_replace(",","",$management_fee);
            }

            $query = "UPDATE tbl_apartment_key_detail SET
                    PROJECT = '$project'
                    ,BEDROOM = '$bedroom'
                    ,DOOR_PASS = '$door_pass'
                    ,WIFI_PASS = '$wifi_pass'
                    ,MANAGEMENT_FEE = '$fee_management'
                    ,ELECTRIC_CODE = '$electric_code'
                    ,INTERNET_CODE = '$internet_code'
                    ,KEY_INFO = '$key_info'
                    ,PN1 = '$pn1'
                    ,PN2 = '$pn2'
                    ,PN3 = '$pn3'
                    ,PN4 = '$pn4'
                    ,KHO = '$kho'
                    ,LO_GIA = '$lo_gia'
                    ,BALCONY = '$balcony'

                    ,THE_CU_DAN = '$the_cu_dan'
                    ,CHIA_KHOA_CO = '$chia_khoa_co'
                    ,THE_TU_LON = '$the_tu_lon'
                    ,THE_TU_NHO = '$the_tu_nho'

                    ,KEY_HOM_THU = '$key_hom_thu'
                    ,REMOTE_DIEU_HOA = '$remote_dieu_hoa'

                    ,INTERNET_NOTE = '$internet_note'
                    ,THE_CU_DAN_NOTE = '$the_cu_dan_note'
                    ,CHIA_KHOA_CO_NOTE = '$chia_khoa_co_note'
                    ,THE_TU_LON_NOTE = '$the_tu_lon_note'
                    ,THE_TU_NHO_NOTE = '$the_tu_nho_note'
                    ,KEY_HOM_THU_NOTE = '$key_hom_thu_note'
                    ,REMOTE_DIEU_HOA_NOTE = '$remote_dieu_hoa_note'
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