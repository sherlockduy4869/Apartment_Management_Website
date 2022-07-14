<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartNotRentedClass.php';
?>
<?php

    $apartNotRented = new apartnotrented();

    if(isset($_GET['editID']))
    {
        $apart_not_rented_id = $_GET['editID'];
        $apart_not_rented_by_id = $apartNotRented->get_apart_not_rented_by_id($apart_not_rented_id);  
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $notRentedEdit = $apartNotRented->edit_apart_not_rented($_POST, $apart_not_rented_id);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT NOT RENTED</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment Not Rented</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_not_rented_by_id['APARTMENT_CODE'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input type="text" name="agent_name" name="apartment_code" value="<?php echo $apart_not_rented_by_id['AGENCY_NAME'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <select name="area">
                                <option <?php if($apart_not_rented_by_id['AREA_APART'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option <?php if($apart_not_rented_by_id['AREA_APART'] == "Vinhomes Central Park") {echo "SELECTED";} ?> value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option <?php if($apart_not_rented_by_id['AREA_APART'] == "Estella Height") {echo "SELECTED";} ?> value="Estella Height">Estella Height</option>
                                <option <?php if($apart_not_rented_by_id['AREA_APART'] == "Estella") {echo "SELECTED";} ?> value="Estella">Estella</option>
                                <option <?php if($apart_not_rented_by_id['AREA_APART'] == "Celesta") {echo "SELECTED";} ?> value="Celesta">Celesta</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input type="text" name="agency_phone" value="<?php echo $apart_not_rented_by_id['AGENCY_PHONE'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom">
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "1 Bed") {echo "SELECTED";} ?> value="1 Bed">1 Bed</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "2 Bed") {echo "SELECTED";} ?> value="2 Bed">2 Bed</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "2 Bed + 1") {echo "SELECTED";} ?> value="2 Bed + 1">2 Bed + 1</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "3 Bed") {echo "SELECTED";} ?> value="3 Bed">3 Bed</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "3 Bed + 1") {echo "SELECTED";} ?> value="3 Bed + 1">3 Bed + 1</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "Vinhomes Golden River") {echo "SELECTED";} ?> value="4 Bed">4 Bed</option>
                                <option <?php if($apart_not_rented_by_id['BEDROOM'] == "4 Bed") {echo "SELECTED";} ?> value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input type="email" name="agency_email" value="<?php echo $apart_not_rented_by_id['AGENCY_EMAIL'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" name="sqm" value="<?php echo $apart_not_rented_by_id['SQM'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" value="<?php echo $apart_not_rented_by_id['HOUSE_OWNER'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Status Apartment</span>
                            <select name="status_apart">
                                <option <?php if($apart_not_rented_by_id['STATUS_APART'] == "Not received the house handover") {echo "SELECTED";} ?> value="Not received the house handover">Not received the house handover</option>
                                <option <?php if($apart_not_rented_by_id['STATUS_APART'] == "Received the house handover") {echo "SELECTED";} ?> value="Received the house handover">Received the house handover</option>
                            </select>
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner" value="<?php echo $apart_not_rented_by_id['PHONE_OWNER'] ?>" required>
                        </div>   
                    </div>
                    <?php 
                    if(isset($notRentedEdit))
                    {
                        echo $notRentedEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                </form>

            </div>
        </div>
</section>
<?php 
    include_once "Include/footer.php";
?>