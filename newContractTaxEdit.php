<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/newContractClass.php';
?>
<?php
    $apartNewContractTax = new apartNewContract();

    if(isset($_GET['editID']))
    {
        $apart_new_contract_tax_id = $_GET['editID'];
        $apart_new_contract_tax_by_id = $apartNewContractTax->get_apart_new_contract_tax_by_id($apart_new_contract_tax_id);

        $start_date = date("d-m-Y", strtotime($apart_new_contract_tax_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_new_contract_tax_by_id['END_DAY'])); 
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartNewContractTaxEdit = $apartNewContractTax->edit_apart_new_contract_tax($_POST, $apart_new_contract_tax_id);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT NEW CONTRACT TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Edit Apartment New Contract Tax</div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" value="<?php echo $apart_new_contract_tax_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input required name="tax_department" type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_APARTMENT']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input required name="customer_name" type="text" value="<?php echo $apart_new_contract_tax_by_id['CUTOMER_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input name="tax_code" required type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input name="customer_phone" type="text" value="<?php echo $apart_new_contract_tax_by_id['CUTOMER_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input name="tax_declare_form" required type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_DECLARATION_FORM']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input name="customer_email" type="email" value="<?php echo $apart_new_contract_tax_by_id['CUTOMER_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input name="day_remind_negotiate" required type="number" min="1"
                            value="<?php echo $apart_new_contract_tax_by_id['DAY_REMIND']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">From</span>
                            <input name="from" required class="from" type="text"
                            value="<?php echo $start_date; ?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input name="renting_fee_per_month" required class="renting_fee_per_month" type="text" value="<?php echo $apart_new_contract_tax_by_id['FEE_PER_MONTH']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input name="to" required class="to" type="text"
                            value="<?php echo $end_date; ?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input name="tax_fee" class="tax_fee" type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_FEE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input name="agency_name" required type="text" value="<?php echo $apart_new_contract_tax_by_id['AGENCY_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input name="tax_declare_fee" required class="tax_declare_fee" type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_DECLARE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input name="agency_phone" type="text" value="<?php echo $apart_new_contract_tax_by_id['AGENCY_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input name="management_fee" class="management_fee" type="text" value="<?php echo $apart_new_contract_tax_by_id['TAX_MANAGEMENT']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input name="agency_email" type="text" value="<?php echo $apart_new_contract_tax_by_id['AGENCY_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input name="cleaning_fee" class="cleaning_fee" type="text" value="<?php echo $apart_new_contract_tax_by_id['CLEANING_FEE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input name="payment_term" required type="number" min="1" value="<?php echo $apart_new_contract_tax_by_id['PAYMENT_TERM']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input name="refund_for_tenant" class="refund_for_tenant" type="text" value="<?php echo $apart_new_contract_tax_by_id['REFUND_FOR_TENANT']?>">
                        </div>             
                    </div>
                    <div class="note">
                        <textarea  class="selling_note" name="note" cols="30" rows="10"><?php echo $apart_new_contract_tax_by_id['NOTE']?></textarea>
                    </div>
                    <?php 
                    if(isset($apartNewContractTaxEdit))
                    {
                        echo $apartNewContractTaxEdit;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="EDITING">
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="newContractTax.php">BACK TO NEW CONTRACT TAX LIST</a></button>
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