<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartSellingClass.php';
?>
<?php

    $apartSelling = new apartselling();

    if(isset($_GET['editID']))
    {
        $apart_selling_id = $_GET['editID'];
        $apart_selling_by_id = $apartSelling->get_apart_selling_by_id($apart_selling_id);  
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $sellingEdit = $apartSelling->edit_apart_selling($_POST, $apart_selling_id);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT FOR SELL</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment For Sell</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_selling_by_id['APARTMENT_CODE'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input type="text" name="agent_name" value="<?php echo $apart_selling_by_id['AGENCY_NAME'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input list="area_list" name="area" value="<?php echo $apart_selling_by_id['AREA_APART'];?>">
                            <select name="area" class="select2_tag">
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Vinhomes Grand Park">Vinhomes Grand Park</option>
                                <option value="Celesta Rise">Celesta Rise</option>
                                <option value="Celesta">Celesta</option>
                                <option value="Sunwah Pearl">Sunwah Pearl</option>
                                <option value="Estella Height">Estella Height</option>
                                <option value="The Estella">The Estella</option>
                                <option value="The Vista An Phu">The Vista An Phu</option>
                                <option value="Xi Riverview">Xi Riverview</option>
                                <option value="Empire City">Empire City</option>
                                <option value="Palm Heights">Palm Heights</option>
                                <option value="Saigon Pearl">Saigon Pearl</option>
                                <option value="Sun Avenue">Sun Avenue</option>
                                <option value="Thao Dien Green">Thao Dien Green</option>
                                <option value="The Infiniti">The Infiniti</option>
                                <option value="The View Riviera Point">The View Riviera Point</option>
                                <option value="Zennity">Zennity</option>
                                <option value="Metropole">Metropole</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input type="text" name="agency_phone" value="<?php echo $apart_selling_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom" class="select2_tag">
                            <option <?php if($apart_not_rented_by_id['BEDROOM'] == "1 Bed") {echo "SELECTED";} ?> value="1 Bed">1 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "2 Bed") {echo "SELECTED";} ?> value="2 Bed">2 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "2 Bed + 1") {echo "SELECTED";} ?> value="2 Bed + 1">2 Bed + 1</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "3 Bed") {echo "SELECTED";} ?> value="3 Bed">3 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "3 Bed + 1") {echo "SELECTED";} ?> value="3 Bed + 1">3 Bed + 1</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "4 Bed") {echo "SELECTED";} ?> value="4 Bed">4 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "4 Bed + 1") {echo "SELECTED";} ?> value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input type="email" name="agency_email" value="<?php echo $apart_selling_by_id['AGENCY_EMAIL']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" name="sqm" value="<?php echo $apart_selling_by_id['SQM'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" value="<?php echo $apart_selling_by_id['HOUSE_OWNER'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">USD Price</span>
                            <input class="usd_price" type="text" name="usd_price" value="<?php echo $apart_selling_by_id['USD_PRICE'];?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner" value="<?php echo $apart_selling_by_id['PHONE_OWNER'];?>" required>
                        </div>   
                        <div class="input-box">
                            <span class="details">VND Price</span>
                            <input class="vnd_price" type="text" name="vnd_price" value="<?php echo $apart_selling_by_id['VND_PRICE'];?>" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_owner" value="<?php echo $apart_selling_by_id['EMAIL_OWNER'];?>" required>
                        </div>  
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"><?php echo $apart_selling_by_id['NOTE'];?></textarea>
                    </div>
                    <?php 
                    if(isset($sellingEdit))
                    {
                        echo $sellingEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartSelling.php">BACK TO SELLING LIST</a></button>
                    </div>
                </form>

            </div>
        </div>
</section>
<script>
    new Cleave('.vnd_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.usd_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>