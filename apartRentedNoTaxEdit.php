<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedNoTaxClass.php';
?>
<?php
    $apartrentednotax = new apartrentednotax();

    if(isset($_GET['editID']))
    {
        $apart_rented_no_tax_id = $_GET['editID'];
        $apart_rented_no_tax_by_id = $apartrentednotax->get_apart_rented_no_tax_by_id($apart_rented_no_tax_id);

        $start_date = date("d-m-Y", strtotime($apart_rented_no_tax_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_rented_no_tax_by_id['END_DAY'])); 
    }
?>
<?php
    $apartrentednotax = new apartrentednotax();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartRentedNoTaxEdit = $apartrentednotax->edit_apart_rented_no_tax($_POST, $apart_rented_no_tax_id);
    }
?>

<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT RENTED NO TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment Rented No Tax</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" value="<?php echo $apart_rented_no_tax_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input required name="agency_name" type="text" value="<?php echo $apart_rented_no_tax_by_id['AGENCY_NAME']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input required name="renting_fee_per_month" class="renting_fee_per_month" type="text" value="<?php echo $apart_rented_no_tax_by_id['FEE_PER_MONTH']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input name="agency_phone" type="text" value="<?php echo $apart_rented_no_tax_by_id['AGENCY_PHONE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input name="management_Fee" class="management_fee" type="text" value="<?php echo $apart_rented_no_tax_by_id['MANAGEMENT_FEE']?>">
                        </div>   
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input name="agency_email" type="email" value="<?php echo $apart_rented_no_tax_by_id['AGENCY_EMAIL']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input required name="payment_term" type="number" min="1" value="<?php echo $apart_rented_no_tax_by_id['PAYMENT_TERM']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input required name="customer_name" type="text" value="<?php echo $apart_rented_no_tax_by_id['CUTOMER_NAME']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input name="day_remind_negotiate" type="number" min="1" value="<?php echo $apart_rented_no_tax_by_id['DAY_REMIND']?>" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input name="customer_phone" type="text" value="<?php echo $apart_rented_no_tax_by_id['CUTOMER_PHONE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">From</span>
                            <input name="from" class="from" type="text" value="<?php echo $start_date; ?>" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input name="customer_email" type="email" value="<?php echo $apart_rented_no_tax_by_id['CUTOMER_EMAIL']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input name="to" class="to" type="text" value="<?php echo $end_date; ?>" required>
                        </div>  
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"><?php echo $apart_rented_no_tax_by_id['NOTE']?></textarea>
                    </div>
                    <?php 
                    if(isset($apartRentedNoTaxEdit))
                    {
                        echo $apartRentedNoTaxEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartRentedNoTax.php">BACK TO RENTED NO TAX LIST</a></button>
                    </div>
                </form>
            </div>
        </div>
</section>
<script>
    new Cleave('.renting_fee_per_month', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.management_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.owner_recieved', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.from', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });

    new Cleave('.to', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
</script>
<?php 
    include_once "Include/footer.php";
?>