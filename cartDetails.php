<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartCart = new apartcart();

    if(isset($_GET['detailsID']))
    {
        $details_id = $_GET['detailsID'];
        $cart_by_id = $apartCart->get_apart_cart_by_id($details_id);
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
                <div class="title">Details Apartment For Rent</div>

                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['APARTMENT_CODE'] ?>" >
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['AGENCY_NAME'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['AREA_APART'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['BEDROOM'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input disabled type="email" value="<?php echo $cart_by_id['AGENCY_EMAIL'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input disabled type="number" min="1" value="<?php echo $cart_by_id['SQM'] ?>" >
                        </div>
                        
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['HOUSE_OWNER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Status Furniture</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['STATUS_FURNITURE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input disabled type="text" value="<?php echo $cart_by_id['PHONE_OWNER'] ?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input disabled class="apart_price" type="text" name="apart_price" value="<?php echo $cart_by_id['PRICE'] ?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input disabled type="email" value="<?php echo $cart_by_id['EMAIL_OWNER'] ?>">
                        </div>     
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="index.php">BACK TO FOR RENT LIST</a></button>
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