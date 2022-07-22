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
                <i class="fas fa-chart-bar"></i>
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
                            <input disabled type="text" value="<?php echo $apart_key_by_id['APARTMENT_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Project</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['PROJECT'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['BEDROOM'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Door Pass</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['DOOR_PASS'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input disabled class="management_fee" type="text" value="<?php echo $apart_key_by_id['MANAGEMENT_FEE'] ?>" >
                        </div>   
                        <div class="input-box">
                            <span class="details">Wifi Pass</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['WIFI_PASS'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['ELECTRIC_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['PN1'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Kho</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['KHO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['PN2'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Lo Gia</span>
                            <input type="text" value="<?php echo $apart_key_by_id['LO_GIA'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['PN3'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['BALCONY'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['PN4'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">The Cu Dan</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['THE_CU_DAN'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['THE_CU_DAN_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['CHIA_KHOA_CO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['CHIA_KHOA_CO_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['THE_TU_LON'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['THE_TU_LON_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['THE_TU_NHO'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['THE_TU_NHO_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Key Hom Thu</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['KEY_HOM_THU'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['KEY_HOM_THU_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Remote Dieu Hoa</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['REMOTE_DIEU_HOA'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['REMOTE_DIEU_HOA_NOTE'] ?></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Code</span>
                            <input disabled type="text" value="<?php echo $apart_key_by_id['INTERNET_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea disabled ><?php echo $apart_key_by_id['INTERNET_NOTE'] ?></textarea>
                        </div>
                    </div>
                    <div class="note">
                        <textarea disabled class="selling_note" cols="30" rows="10"><?php echo $apart_key_by_id['OTHER_NOTE'] ?></textarea>
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