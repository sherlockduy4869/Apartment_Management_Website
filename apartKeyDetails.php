<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartKeyClass.php';
?>
<?php
    $apartKey = new apartkey();

    if(isset($_GET['detailsID']))
    {
        $apart_key_id = $_GET['detailsID'];
        $apart_key_by_id = $apartKey->get_apart_key_by_id($apart_key_id);  
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
                <div class="title">Details Quan Ly Can Ho</div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input  type="text" value="<?php echo $apart_key_by_id['APARTMENT_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Project</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PROJECT'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" value="<?php echo $apart_key_by_id['HOUSE_OWNER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Door Pass</span>
                            <input  type="text" value="<?php echo $apart_key_by_id['DOOR_PASS'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input  type="text" value="<?php echo $apart_key_by_id['BEDROOM'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Wifi Pass</span>
                            <input  type="text" value="<?php echo $apart_key_by_id['WIFI_PASS'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input  class="management_fee" type="text" value="<?php echo $apart_key_by_id['MANAGEMENT_FEE'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input  type="text" value="<?php echo $apart_key_by_id['ELECTRIC_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Code</span>
                            <textarea name="internet_code"><?php echo $apart_key_by_id['INTERNET_CODE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Note</span>
                            <textarea><?php echo $apart_key_by_id['INTERNET_NOTE'] ?></textarea>
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
                            <input type="text" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN1_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN1_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN2_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN2_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN3_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN3_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN4_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" value="<?php echo $apart_key_by_id['PN4_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" value="<?php echo $apart_key_by_id['BALCONY_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" value="<?php echo $apart_key_by_id['BALCONY_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" value="<?php echo $apart_key_by_id['MAILBOX_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" value="<?php echo $apart_key_by_id['MAILBOX_CUSTOMER'] ?>">
                        </div>

                        <div class="note">
                        <span class="details">Note for key</span>
                        <textarea class="selling_note" cols="30" rows="10"><?php echo $apart_key_by_id['NOTE_FOR_KEY'] ?></textarea>
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
                            <input type="text" value="<?php echo $apart_key_by_id['THE_THANG_MAY_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Thang May</span>
                            <input type="text" value="<?php echo $apart_key_by_id['THE_THANG_MAY_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" value="<?php echo $apart_key_by_id['THE_TU_LON_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" value="<?php echo $apart_key_by_id['THE_TU_LON_CUSTOMER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" value="<?php echo $apart_key_by_id['THE_TU_NHO_OFFICE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" value="<?php echo $apart_key_by_id['THE_TU_NHO_CUSTOMER'] ?>">
                        </div>
                    </div>
                    <div class="note">
                        <span class="details">Remote Dieu Hoa</span>
                        <textarea class="selling_note" cols="30" rows="10"><?php echo $apart_key_by_id['REMOTE_DIEU_HOA'] ?></textarea>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" cols="30" rows="10"><?php echo $apart_key_by_id['OTHER_NOTE'] ?></textarea>
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