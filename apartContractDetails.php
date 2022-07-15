<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractClass.php';
?>
<?php
    $apartContract = new apartcontract();

    if(isset($_GET['detailsID']))
    {
        $apart_contract_id = $_GET['detailsID'];
        $apart_contract_by_id = $apartContract->get_apart_contract_by_id($apart_contract_id);  

        $start_date = date("d-m-Y", strtotime($apart_contract_by_id['START_DAY']));  
        $end_date = date("d-m-Y", strtotime($apart_contract_by_id['END_DAY'])); 
        $date_remind = date("d-m-Y", strtotime($apart_contract_by_id['DATE_REMIND'])); 
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT CONTRACT TAX</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Details Apartment Contract Tax</div>

                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment Code</span>
                            <input disabled type="text" name="apartment_code" value="<?php echo $apart_contract_by_id['APARTMENT_CODE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['AGENCY_NAME']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['AREA_APART']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['AGENCY_PHONE']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">From</span>
                            <input disabled class="start_day" type="text"
                            value="<?php echo $start_date; ?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input disabled type="email" value="<?php echo $apart_contract_by_id['AGENCY_EMAIL']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">To</span>
                            <input disabled class="end_day" type="text"
                            value="<?php echo $start_date; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">House Owner</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['HOUSE_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Fee Per Month</span>
                            <input disabled class="fee_per_month" type="text" value="<?php echo $apart_contract_by_id['FEE_PER_MONTH']?>">
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['PHONE_OWNER']?>">
                        </div>   
                        <div class="input-box">
                            <span class="details">Date Remind</span>
                            <input disabled class="date_remind" type="text"
                            value="<?php echo $date_remind; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input disabled type="email" value="<?php echo $apart_contract_by_id['EMAIL_OWNER']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Num Days Remind </span>
                            <input type="number" disabled value="<?php echo $apart_contract_by_id['NUM_DAY_REMIND']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['CUTOMER_NAME']?>">
                        </div>   
                        <div class="input-box">
                            <span class="details">Status Apart</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['STATUS_APART']?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['CUTOMER_PHONE']?>">
                        </div> 
                        <div class="input-box">
                            <span class="details"></span>
                            <input type="hidden" >
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input disabled type="text" value="<?php echo $apart_contract_by_id['CUTOMER_EMAIL']?>">
                        </div> 
                    </div>
                    <div class="button">
                        <button class="btn btn-primary"><a href="apartContract.php">BACK TO CONTRACT TAX LIST</a></button>
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
    new Cleave('.date_remind', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });
</script>
<?php 
    include_once "Include/footer.php";
?>