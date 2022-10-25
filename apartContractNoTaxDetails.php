<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractNoTaxClass.php';
?>
<?php
    $apartContractNoTax = new apartcontractnotax();

    if(isset($_GET['detailsID']))
    {
        $apart_contract_no_tax_id = $_GET['detailsID'];
        $apart_contract_no_tax_by_id = $apartContractNoTax->get_apart_contract_no_tax_by_id($apart_contract_no_tax_id);  

        $start_date = date("d-m-Y", strtotime($apart_contract_no_tax_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_contract_no_tax_by_id['END_DAY'])); 
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT CONTRACT NO TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Details Apartment Contract No Tax</div>

                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment Code</span>
                            <input  type="text" name="apartment_code" value="<?php echo $apart_contract_no_tax_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['AGENCY_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['AREA_APART']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['AGENCY_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Start Day</span>
                            <input  class="start_day" type="text"
                            value="<?php echo $start_date; ?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input  type="email" value="<?php echo $apart_contract_no_tax_by_id['AGENCY_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">End Day</span>
                            <input  class="end_day" type="text"
                            value="<?php echo $end_date; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House Owner</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['HOUSE_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Fee Per Month</span>
                            <input  class="fee_per_month" type="text" value="<?php echo $apart_contract_no_tax_by_id['FEE_PER_MONTH']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['PHONE_OWNER']?>">
                        </div>   
                        <div class="input-box">
                            <span class="details">Status Apart</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['STATUS_APART']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input  type="email" value="<?php echo $apart_contract_no_tax_by_id['EMAIL_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Num Day Remind</span>
                            <input  type="number" value="<?php echo $apart_contract_no_tax_by_id['NUM_DAY_REMIND']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['CUTOMER_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['CUTOMER_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input  type="text" value="<?php echo $apart_contract_no_tax_by_id['CUTOMER_EMAIL']?>">
                        </div>
                        
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartContractNoTax.php">BACK TO CONTRACT NO TAX LIST</a></button>
                    </div>
                </form>

            </div>
        </div>
</section>
<script>
    new Cleave('.fee_per_month', {
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