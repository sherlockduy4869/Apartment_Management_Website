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

        $sellingAdd = $apartSelling->insert_apart_selling($_POST);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT SELLING</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment Selling</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_selling_by_id['APARTMENT_CODE']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input type="text" name="agent_name" value="<?php echo $apart_selling_by_id['AGENCY_NAME']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <select name="area">
                                <option <?php if($apart_selling_by_id['AREA_APART'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option <?php if($apart_selling_by_id['AREA_APART'] == "Vinhomes Central Park") {echo "SELECTED";} ?> value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option <?php if($apart_selling_by_id['AREA_APART'] == "Estella Height") {echo "SELECTED";} ?> value="Estella Height">Estella Height</option>
                                <option <?php if($apart_selling_by_id['AREA_APART'] == "Estella") {echo "SELECTED";} ?> value="Estella">Estella</option>
                                <option <?php if($apart_selling_by_id['AREA_APART'] == "Celesta") {echo "SELECTED";} ?> value="Celesta">Celesta</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom">
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "1 Bed") {echo "SELECTED";} ?> value="1 Bed">1 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "2 Bed") {echo "SELECTED";} ?> value="2 Bed">2 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "2 Bed + 1") {echo "SELECTED";} ?> value="2 Bed + 1">2 Bed + 1</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "3 Bed") {echo "SELECTED";} ?> value="3 Bed">3 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "3 Bed + 1") {echo "SELECTED";} ?> value="3 Bed + 1">3 Bed + 1</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="4 Bed">4 Bed</option>
                                <option <?php if($apart_selling_by_id['BEDROOM'] == "4 Bed") {echo "SELECTED";} ?> value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" name="sqm" value="<?php echo $apart_selling_by_id['SQM']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" value="<?php echo $apart_selling_by_id['HOUSE_OWNER']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner" value="<?php echo $apart_selling_by_id['PHONE_OWNER']?>" required>
                        </div>   
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_owner" value="<?php echo $apart_selling_by_id['EMAIL_OWNER']?>" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">USD Price</span>
                            <input class="usd_price" type="text" name="usd_price" value="<?php echo $apart_selling_by_id['USD_PRICE']?>" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">VND Price</span>
                            <input class="vnd_price" type="text" name="vnd_price" value="<?php echo $apart_selling_by_id['VND_PRICE']?>" required>
                        </div>  
                    </div>
                    <div class="note">
                        <textarea name="note" value="<?php echo $apart_selling_by_id['NOTE']?>" cols="30" rows="10"></textarea>
                    </div>
                    <?php 
                    if(isset($sellingAdd))
                    {
                        echo $sellingAdd;
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