<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartCart = new apartcart();

    if(isset($_GET['editID']))
    {
        $cart_id = $_GET['editID'];
        $cart_by_id = $apartCart->get_apart_cart_by_id($cart_id);
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {             
        $apart_cart_edit = $apartCart->edit_apart_cart($_POST,$cart_id);
    }

?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT FOR RENT</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment For Rent</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['APARTMENT_CODE'] ?>" name="apartment_code">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input type="text" value="<?php echo $cart_by_id['AGENCY_NAME'] ?>" name="agent_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input list="area_list" name="area" value="<?php echo $cart_by_id['AREA_APART'] ?>">
                            <datalist id="area_list">
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Vinhomes Grand Park">Vinhomes Grand Park</option>
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
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input type="text" name="agency_phone" value="<?php echo $cart_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom">
                                <option <?php if($cart_by_id['BEDROOM'] == "1 Bed") {echo "SELECTED";} ?> value="1 Bed">1 Bed</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "2 Bed") {echo "SELECTED";} ?> value="2 Bed">2 Bed</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "2 Bed + 1") {echo "SELECTED";} ?> value="2 Bed + 1">2 Bed + 1</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "3 Bed") {echo "SELECTED";} ?> value="3 Bed">3 Bed</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "3 Bed + 1") {echo "SELECTED";} ?> value="3 Bed + 1">3 Bed + 1</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="4 Bed">4 Bed</option>
                                <option <?php if($cart_by_id['BEDROOM'] == "4 Bed") {echo "SELECTED";} ?> value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input type="email" name="agency_email" value="<?php echo $cart_by_id['AGENCY_EMAIL'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" min="1" value="<?php echo $cart_by_id['SQM'] ?>" name="sqm" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" value="<?php echo $cart_by_id['HOUSE_OWNER'] ?>" name="house_owner" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Status Furniture</span>
                            <select name="status_furniture">
                                <option <?php if($cart_by_id['STATUS_FURNITURE'] == "No Furniture") {echo "SELECTED";} ?> value="No Furniture">No Furniture</option>
                                <option <?php if($cart_by_id['STATUS_FURNITURE'] == "Semi Furniture") {echo "SELECTED";} ?> value="Semi Furniture">Semi Furniture</option>
                                <option <?php if($cart_by_id['STATUS_FURNITURE'] == "Full Furniture") {echo "SELECTED";} ?> value="Full Furniture">Full Furniture</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" value="<?php echo $cart_by_id['PHONE_OWNER'] ?>" name="phone_owner">
                        </div>   
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input class="apart_price" type="text" name="apart_price" value="<?php echo $cart_by_id['PRICE'] ?>" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" value="<?php echo $cart_by_id['EMAIL_OWNER'] ?>" name="email_owner">
                        </div>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"><?php echo $cart_by_id['NOTE'] ?></textarea>
                    </div>
                    <?php 
                    if(isset($apart_cart_edit))
                    {
                        echo $apart_cart_edit;
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
    new Cleave('.apart_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>