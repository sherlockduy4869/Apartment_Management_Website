<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedClass.php';
?>
<?php
    $apartrented = new apartrented();

    if(isset($_GET['editID']))
    {
        $apart_rented_id = $_GET['editID'];
        $apart_rented_by_id = $apartrented->get_apart_rented_by_id($apart_rented_id);

        $start_date = date("d-m-Y", strtotime($apart_rented_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_rented_by_id['END_DAY'])); 
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartRentedEdit = $apartrented->edit_apart_rented($_POST, $apart_rented_id);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT RENTED</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment Rented</div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_rented_by_id['APARTMENT_CODE']?>" name="apartment_code">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input type="text" name="tax_code" value="<?php echo $apart_rented_by_id['TAX_CODE']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input type="text" name="tax_declare_form" value="<?php echo $apart_rented_by_id['TAX_DECLARATION_FORM']?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input type="text" name="tax_department" value="<?php echo $apart_rented_by_id['TAX_APARTMENT']?>" required>
                        </div>     
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input type="number" value="1" min="1" value="<?php echo $apart_rented_by_id['PAYMENT_TERM']?>" name="payment_term" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input class="renting_fee_per_month" type="text" value="<?php echo $apart_rented_by_id['FEE_PER_MONTH']?>" name="renting_fee_per_month" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input class="tax_fee" type="text" name="tax_fee" value="<?php echo $apart_rented_by_id['TAX_FEE']?>" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input class="tax_declare_fee" type="text" value="<?php echo $apart_rented_by_id['TAX_DECLARE']?>" name="tax_declare_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" value="<?php echo $apart_rented_by_id['TAX_MANAGEMENT']?>" name="management_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input class="cleaning_fee" type="text" value="<?php echo $apart_rented_by_id['CLEANING_FEE']?>" name="cleaning_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input class="refund_for_tenant" type="text" value="<?php echo $apart_rented_by_id['REFUND_FOR_TENANT']?>" name="refund_for_tenant" required>
                        </div>            
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input type="number" min="1" name="day_remind_negotiate" 
                            value="<?php echo $apart_rented_by_id['DAY_REMIND']?>" required>
                        </div>      
                        <div class="input-box">
                            <span class="details">From</span>
                            <input class="from" type="text" name="from" 
                            value="<?php echo $start_date; ?>" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input class="to" type="text" name="to" 
                            value="<?php echo $end_date; ?>" required>
                        </div>  
                    </div>
                    <?php 
                    if(isset($apartRentedEdit))
                    {
                        echo $apartRentedEdit;
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
    new Cleave('.renting_fee_per_month', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.tax_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });

    new Cleave('.tax_declare_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.management_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.cleaning_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.refund_for_tenant', {
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