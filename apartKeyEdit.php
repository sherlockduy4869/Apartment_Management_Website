<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartKeyClass.php';
?>
<?php

    $apartKey = new apartkey();

    if(isset($_GET['editID']))
    {
        $apart_key_id = $_GET['editID'];
        $apart_key_by_id = $apartKey->get_apart_key_by_id($apart_key_id);  
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $keyEdit = $apartKey->edit_apart_key($_POST, $apart_key_id);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>QUAN LY CAN HO</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Quan Ly Can Ho</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_key_by_id['APARTMENT_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Project</span>
                            <input type="text" name="project" value="<?php echo $apart_key_by_id['PROJECT'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input list="bedroom_list" name="bedroom" value="<?php echo $apart_key_by_id['BEDROOM'] ?>" required>
                            <datalist id="bedroom_list">
                                <option value="1 Bed">1 Bed</option>
                                <option value="2 Bed">2 Bed</option>
                                <option value="2 Bed + 1">2 Bed + 1</option>
                                <option value="3 Bed">3 Bed</option>
                                <option value="3 Bed + 1">3 Bed + 1</option>
                                <option value="4 Bed">4 Bed</option>
                                <option value="4 Bed + 1">4 Bed + 1</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Door Pass</span>
                            <input type="text" name="door_pass" value="<?php echo $apart_key_by_id['DOOR_PASS'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_fee" value="<?php echo $apart_key_by_id['MANAGEMENT_FEE'] ?>" >
                        </div>   
                        <div class="input-box">
                            <span class="details">Wifi Pass</span>
                            <input type="text" name="wifi_pass" value="<?php echo $apart_key_by_id['WIFI_PASS'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input type="text" name="electric_code" value="<?php echo $apart_key_by_id['ELECTRIC_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" name="pn1" value="<?php echo $apart_key_by_id['PN1'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Kho</span>
                            <input type="text" name="kho" value="<?php echo $apart_key_by_id['KHO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" name="pn2" value="<?php echo $apart_key_by_id['PN2'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Lo Gia</span>
                            <input type="text" name="lo_gia" value="<?php echo $apart_key_by_id['LO_GIA'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" name="pn3" value="<?php echo $apart_key_by_id['PN3'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" name="balcony" value="<?php echo $apart_key_by_id['BALCONY'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" name="pn4" value="<?php echo $apart_key_by_id['PN4'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Cu Dan</span>
                            <input type="text" name="the_cu_dan" value="<?php echo $apart_key_by_id['THE_CU_DAN'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_cu_dan_note"><?php echo $apart_key_by_id['THE_CU_DAN_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" name="chia_khoa_co" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="chia_khoa_co_note"><?php echo $apart_key_by_id['CHIA_KHOA_CO_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon" value="<?php echo $apart_key_by_id['THE_TU_LON'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_tu_lon_note"><?php echo $apart_key_by_id['THE_TU_LON_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho" value="<?php echo $apart_key_by_id['THE_TU_NHO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_tu_nho_note"><?php echo $apart_key_by_id['THE_TU_NHO_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Key Hom Thu</span>
                            <input type="text" name="key_hom_thu" value="<?php echo $apart_key_by_id['KEY_HOM_THU'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="key_hom_thu_note"><?php echo $apart_key_by_id['KEY_HOM_THU_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Remote Dieu Hoa</span>
                            <input type="text" name="remote_dieu_hoa" value="<?php echo $apart_key_by_id['REMOTE_DIEU_HOA'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="remote_dieu_hoa_note"><?php echo $apart_key_by_id['REMOTE_DIEU_HOA_NOTE'] ?></textarea>
                        </div>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" placeholder="Other note here" name="other_note" cols="30" rows="10"><?php echo $apart_key_by_id['OTHER_NOTE'] ?></textarea>
                    </div>
                    <div class="input-box">
                            <span class="details">Internet Code</span>
                            <input type="text" name="internet_code" value="<?php echo $apart_key_by_id['INTERNET_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="internet_note"><?php echo $apart_key_by_id['INTERNET_NOTE'] ?></textarea>
                        </div>
                    <?php 
                    if(isset($keyEdit))
                    {
                        echo $keyEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                </form>

            </div>
        </div>
</section>
<script>
    new Cleave('.management_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>