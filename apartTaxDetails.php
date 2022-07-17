<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartTaxClass.php';
?>
<?php
    $apartTax = new aparttax();

    if(isset($_GET['detailsID']))
    {
        $apart_tax_id = $_GET['detailsID'];
        $apart_tax_by_id = $apartTax->get_apart_contract_by_id($apart_tax_id);  

        $start_day_term = date("d-m-Y", strtotime($apart_tax_by_id['START_DAY_TERM']));  
        $end_day_term = date("d-m-Y", strtotime($apart_tax_by_id['END_DAY_TERM'])); 

        $term = $apart_tax_by_id['PAYMENT_TERM'];

        $total = ($apart_tax_by_id['TAX_FEE']+$apart_tax_by_id['TAX_MANAGEMENT']
                      + $apart_tax_by_id['REFUND_FOR_TENANT'] 
                      + $apart_tax_by_id['CLEANING_FEE'])*$term
                      + $apart_tax_by_id['TAX_DECLARE'];
    }
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
                <div class="title">DEBIT NOTE</div>
                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_tax_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Mr/Mrs</span>
                            <input disabled type="text" value="<?php echo $apart_tax_by_id['HOUSE_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">From</span>
                            <input disabled class="start_day" type="text"
                            value="<?php echo $start_day_term; ?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input disabled class="end_day" type="text"
                            value="<?php echo $end_day_term; ?>">
                        </div> 
                    </div>
                    <div class="debit-note-list">
                        <div class="debit_note <?php if($apart_tax_by_id['TAX_FEE'] == 0) {echo 'not_display';} ?>">
                            <span class="details">Tax Fee</span>
                            <input disabled class="tax_fee" type="text" value="<?php echo $apart_tax_by_id['TAX_FEE']*$term?>">
                        </div> 
                        <div class="debit_note <?php if($apart_tax_by_id['TAX_DECLARE'] == 0) {echo 'not_display';} ?>">
                            <span class="details">Tax Declaration</span>
                            <input disabled class="tax_declaration" type="text" value="<?php echo $apart_tax_by_id['TAX_DECLARE']?>">
                        </div> 
                        <div class="debit_note <?php if($apart_tax_by_id['TAX_MANAGEMENT'] == 0) {echo 'not_display';} ?>">
                            <span class="details">Management Fee</span>
                            <input disabled class="tax_management" type="text" value="<?php echo $apart_tax_by_id['TAX_MANAGEMENT']*$term?>">
                        </div> 
                        <div class="debit_note <?php if($apart_tax_by_id['REFUND_FOR_TENANT'] == 0) {echo 'not_display';} ?>">
                            <span class="details">Refund For Tenant</span>
                            <input disabled class="refund_for_tenant" type="text" value="<?php echo $apart_tax_by_id['REFUND_FOR_TENANT']*$term?>">
                        </div> 
                        
                        <div class="debit_note <?php if($apart_tax_by_id['CLEANING_FEE'] == 0) {echo 'not_display';} ?>">
                            <span class="details">Cleaning Fee</span>
                            <input disabled class="cleaning_fee" type="text" value="<?php echo $apart_tax_by_id['CLEANING_FEE']*$term?>">
                        </div>
                        <div class="debit_note">
                            <span style="font-weight: bold;" class="details">Total Amount</span>
                            <input style="font-weight: bold;" disabled class="total_amount" type="text" value="<?php echo $total; ?>">
                        </div>
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartTax.php">BACK TO TAX LIST</a></button>
                    </div>
                </form>

            </div>
        </div>
</section>
<script>
    new Cleave('.tax_declaration', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.tax_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.tax_management', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.refund_for_tenant', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.cleaning_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.total_amount', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.start_day', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
    new Cleave('.end_day', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
</script>
<?php 
    include_once "Include/footer.php";
?>