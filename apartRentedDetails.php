<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedClass.php';
?>
<?php
    $apartrented = new apartrented();

    if(isset($_GET['detailsID']))
    {
        $apart_rented_id = $_GET['detailsID'];
        $apart_rented_by_id = $apartrented->get_apart_rented_by_id($apart_rented_id);

        $start_date = date("d-m-Y", strtotime($apart_rented_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_rented_by_id['END_DAY'])); 
    }
?>
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT RENTED TAX</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Details Apartment Rented Tax</div>
                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['CUTOMER_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['AREA_APART']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['CUTOMER_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['TAX_APARTMENT']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input disabled type="email" value="<?php echo $apart_rented_by_id['CUTOMER_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['TAX_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House Owner</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['HOUSE_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['TAX_DECLARATION_FORM']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Owner Phone</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['PHONE_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input disabled type="number" min="1" name="day_remind_negotiate" 
                            value="<?php echo $apart_rented_by_id['DAY_REMIND']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Owner Email</span>
                            <input disabled type="email" value="<?php echo $apart_rented_by_id['EMAIL_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">From</span>
                            <input disabled class="from" type="text"
                            value="<?php echo $start_date; ?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input disabled class="renting_fee_per_month" type="text" value="<?php echo $apart_rented_by_id['FEE_PER_MONTH']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input disabled class="to" type="text"
                            value="<?php echo $end_date; ?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input disabled class="tax_fee" type="text" value="<?php echo $apart_rented_by_id['TAX_FEE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['AGENCY_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input disabled class="tax_declare_fee" type="text" value="<?php echo $apart_rented_by_id['TAX_DECLARE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['AGENCY_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input disabled class="management_fee" type="text" value="<?php echo $apart_rented_by_id['TAX_MANAGEMENT']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input disabled type="text" value="<?php echo $apart_rented_by_id['AGENCY_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input disabled class="cleaning_fee" type="text" value="<?php echo $apart_rented_by_id['CLEANING_FEE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input disabled type="number" min="1" value="<?php echo $apart_rented_by_id['PAYMENT_TERM']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input disabled class="refund_for_tenant" type="text" value="<?php echo $apart_rented_by_id['REFUND_FOR_TENANT']?>">
                        </div>      
                        <div class="input-box">
                            <span class="details"></span>
                            <input type="hidden" >
                        </div>  
                        <div class="input-box">
                            <span class="details">Owner Recieved</span>
                            <input disabled class="owner_recieved" type="text" value="<?php echo $apart_rented_by_id['OWNER_RECIEVED']?>">
                        </div>           
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartRented.php">BACK TO RENTED TAX LIST</a></button>
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