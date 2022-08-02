<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartNotRentedClass.php';
?>
<?php
    $apartNotRented = new apartnotrented();

    if(isset($_GET['detailsID']))
    {
        $apart_not_rented_id = $_GET['detailsID'];
        $apart_not_rented_by_id = $apartNotRented->get_apart_not_rented_by_id($apart_not_rented_id);  
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT UNDER CONSTRUCTION</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Details Apartment Under Construction</div>

                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['APARTMENT_CODE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['AGENCY_NAME'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['AREA_APART'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input  type="text" name="agency_phone" value="<?php echo $apart_not_rented_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['BEDROOM'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input  type="email" name="agency_email" value="<?php echo $apart_not_rented_by_id['AGENCY_EMAIL'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input  type="number" value="<?php echo $apart_not_rented_by_id['SQM'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['HOUSE_OWNER'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Status Apartment</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['STATUS_APART'] ?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input  type="text" value="<?php echo $apart_not_rented_by_id['PHONE_OWNER'] ?>">
                        </div>   
                    </div>
                    <div class="note">
                        <textarea  class="selling_note" cols="30" rows="10"><?php echo $apart_not_rented_by_id['NOTE'] ?></textarea>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartNotRented.php">BACK TO UNDER CONSTRUCTION LIST</a></button>
                    </div>
                </form>

            </div>
        </div>
</section>
<?php 
    include_once "Include/footer.php";
?>