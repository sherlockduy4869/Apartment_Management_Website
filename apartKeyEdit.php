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
                            <select name="project" class="select2_tag">
                                <option <?php if($apart_key_by_id['PROJECT'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Vinhomes Central Park") {echo "SELECTED";} ?> value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Vinhomes Grand Park") {echo "SELECTED";} ?> value="Vinhomes Grand Park">Vinhomes Grand Park</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Estella Height") {echo "SELECTED";} ?> value="Estella Height">Estella Height</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "The Estella") {echo "SELECTED";} ?> value="The Estella">The Estella</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Celesta") {echo "SELECTED";} ?> value="Celesta">Celesta</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Thao Dien Green") {echo "SELECTED";} ?> value="Thao Dien Green">Thao Dien Green</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "The Vista An Phu") {echo "SELECTED";} ?> value="The Vista An Phu">The Vista An Phu</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Xi Riverview") {echo "SELECTED";} ?> value="Xi Riverview">Xi Riverview</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "The View Riviera Point") {echo "SELECTED";} ?> value="The View Riviera Point">The View Riviera Point</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "The Infiniti") {echo "SELECTED";} ?> value="The Infiniti">The Infiniti</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Zennity") {echo "SELECTED";} ?> value="Zennity">Zennity</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Celesta Rise") {echo "SELECTED";} ?> value="Celesta Rise">Celesta Rise</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Empire City") {echo "SELECTED";} ?> value="Empire City">Empire City</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Metropole") {echo "SELECTED";} ?> value="Metropole">Metropole</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Palm Heights") {echo "SELECTED";} ?> value="Palm Heights">Palm Heights</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Sunwah Pearl") {echo "SELECTED";} ?> value="Sunwah Pearl">Sunwah Pearl</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Sun Avenue") {echo "SELECTED";} ?> value="Sun Avenue">Sun Avenue</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Saigon Pearl") {echo "SELECTED";} ?> value="Saigon Pearl">Saigon Pearl</option>
                                <option <?php if($apart_key_by_id['PROJECT'] == "Other") {echo "SELECTED";} ?> value="Other">Other</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" value="<?php echo $apart_key_by_id['HOUSE_OWNER'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Door Pass</span>
                            <input type="text" name="door_pass" value="<?php echo $apart_key_by_id['DOOR_PASS'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom" class="select2_tag">
                                <option <?php if($apart_key_by_id['BEDROOM'] == "1 Bed") {echo "SELECTED";} ?> value="1 Bed">1 Bed</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "2 Bed") {echo "SELECTED";} ?> value="2 Bed">2 Bed</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "2 Bed + 1") {echo "SELECTED";} ?> value="2 Bed + 1">2 Bed + 1</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "3 Bed") {echo "SELECTED";} ?> value="3 Bed">3 Bed</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "3 Bed + 1") {echo "SELECTED";} ?> value="3 Bed + 1">3 Bed + 1</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "4 Bed") {echo "SELECTED";} ?> value="4 Bed">4 Bed</option>
                                <option <?php if($apart_key_by_id['BEDROOM'] == "4 Bed + 1") {echo "SELECTED";} ?> value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Wifi Pass</span>
                            <input type="text" name="wifi_pass" value="<?php echo $apart_key_by_id['WIFI_PASS'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_fee" value="<?php echo $apart_key_by_id['MANAGEMENT_FEE'] ?>" >
                        </div>   
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input type="text" name="electric_code" value="<?php echo $apart_key_by_id['ELECTRIC_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Code</span>
                            <textarea name="internet_code"><?php echo $apart_key_by_id['INTERNET_CODE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Note</span>
                            <textarea name="internet_note"><?php echo $apart_key_by_id['INTERNET_NOTE'] ?></textarea>
                        </div>

                        <div class="input-box">
                            <span style="color: red;" class="details">Key stored in Office:</span>
                            <input type="hidden">
                        </div>
                        <div class="input-box">
                            <span style="color: red;" class="details">Key handover for customer: </span>
                            <input type="hidden">
                        </div>

                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" name="chia_khoa_co_office" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" name="chia_khoa_co_customer" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" name="pn1_office" value="<?php echo $apart_key_by_id['PN1_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" name="pn1_customer" value="<?php echo $apart_key_by_id['PN1_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" name="pn2_office" value="<?php echo $apart_key_by_id['PN2_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" name="pn2_customer" value="<?php echo $apart_key_by_id['PN2_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" name="pn3_office" value="<?php echo $apart_key_by_id['PN3_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" name="pn3_customer" value="<?php echo $apart_key_by_id['PN3_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" name="pn4_office" value="<?php echo $apart_key_by_id['PN4_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" name="pn4_customer" value="<?php echo $apart_key_by_id['PN4_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" name="balcony_office" value="<?php echo $apart_key_by_id['BALCONY_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" name="balcony_customer" value="<?php echo $apart_key_by_id['BALCONY_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" name="mail_box_office" value="<?php echo $apart_key_by_id['MAILBOX_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" name="mail_box_customer" value="<?php echo $apart_key_by_id['MAILBOX_CUSTOMER'] ?>">
                        </div>

                        <div class="note">
                        <span class="details">Note for key</span>
                        <textarea class="selling_note" name="note_for_key" cols="30" rows="10"><?php echo $apart_key_by_id['NOTE_FOR_KEY'] ?></textarea>
                        </div>

                        <div class="input-box">
                            <span style="color: red;" class="details">Card stored in Office:</span>
                            <input type="hidden">
                        </div>
                        <div class="input-box">
                            <span style="color: red;" class="details">Card handover for customer: </span>
                            <input type="hidden">
                        </div>

                        <div class="input-box">
                            <span class="details">The Thang May</span>
                            <input type="text" name="the_thang_may_office" value="<?php echo $apart_key_by_id['THE_THANG_MAY_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Thang May</span>
                            <input type="text" name="the_thang_may_customer" value="<?php echo $apart_key_by_id['THE_THANG_MAY_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon_office" value="<?php echo $apart_key_by_id['THE_TU_LON_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon_customer" value="<?php echo $apart_key_by_id['THE_TU_LON_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho_office" value="<?php echo $apart_key_by_id['THE_TU_NHO_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho_customer" value="<?php echo $apart_key_by_id['THE_TU_NHO_CUSTOMER'] ?>">
                        </div>
                    </div>
                    <div class="note">
                        <span class="details">Remote Dieu Hoa</span>
                        <textarea class="selling_note" name="remote_dieu_hoa" cols="30" rows="10"><?php echo $apart_key_by_id['REMOTE_DIEU_HOA'] ?></textarea>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" placeholder="Other note here" name="other_note" cols="30" rows="10"><?php echo $apart_key_by_id['OTHER_NOTE'] ?></textarea>
                    </div>
                    <?php 
                    if(isset($keyEdit))
                    {
                        echo $keyEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-success" name="submit" type="submit" value="EDITING">
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartKey.php">BACK TO APART KEY LIST</a></button>
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