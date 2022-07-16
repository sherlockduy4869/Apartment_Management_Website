<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartSellingClass.php';
?>
<?php

    $apartSelling = new apartselling();

    if(isset($_GET['detailsID']))
    {
        $apart_selling_id = $_GET['detailsID'];
        $apart_selling_by_id = $apartSelling->get_apart_selling_by_id($apart_selling_id);  
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
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Details Apartment For Sell</div>

                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_selling_by_id['APARTMENT_CODE'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input disabled type="text" name="agent_name" value="<?php echo $apart_selling_by_id['AGENCY_NAME'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input disabled type="text" value="<?php echo $apart_selling_by_id['AREA_APART'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input disabled type="text" name="agency_phone" value="<?php echo $apart_selling_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input disabled type="text" value="<?php echo $apart_selling_by_id['BEDROOM'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input disabled type="email" name="agency_email" value="<?php echo $apart_selling_by_id['AGENCY_EMAIL']; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input disabled type="number" value="<?php echo $apart_selling_by_id['SQM'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input disabled type="text" value="<?php echo $apart_selling_by_id['HOUSE_OWNER'];?>">
                        </div>
                        <div class="input-box">
                            <span class="details">USD Price</span>
                            <input disabled class="usd_price" type="text" value="<?php echo $apart_selling_by_id['USD_PRICE'];?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input disabled type="text" value="<?php echo $apart_selling_by_id['PHONE_OWNER'];?>">
                        </div>   
                        <div class="input-box">
                            <span class="details">VND Price</span>
                            <input disabled class="vnd_price" type="text" value="<?php echo $apart_selling_by_id['VND_PRICE'];?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input disabled type="email" value="<?php echo $apart_selling_by_id['EMAIL_OWNER'];?>">
                        </div>  
                    </div>
                    <div class="note">
                        <textarea disabled class="selling_note" name="note" cols="30" rows="10"><?php echo $apart_selling_by_id['NOTE'];?></textarea>
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