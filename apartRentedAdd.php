<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedClass.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartrented = new apartrented();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartRentedAdd = $apartrented->insert_apart_rented($_POST);
    }
?>
<?php
    $apartCart = new apartcart();

    $listApartCode = $apartCart->show_apart_cart_list();
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
                <div class="title">Add Apartment Rented Tax</div>

                <form action="apartRentedAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input <?php if($listApartCode == false){echo 'disabled';} ?> list="apart_code_list" name="apartment_code" required>
                            <datalist id="apart_code_list">
                            <?php
                            
                                if($listApartCode)
                                {   
                                    $ID = 0;
                                    while($result = $listApartCode->fetch_assoc())
                                    {
                                    
                                ?>
                                <option value="<?php echo $result['APARTMENT_CODE']; ?>">
                            <?php
                                    }
                                }
                            ?>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input type="text" name="customer_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input type="text" name="tax_department" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input  type="text" name="customer_phone" >
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input type="text" name="tax_code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input  type="email" name="customer_email">
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input type="text" name="tax_declare_form" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input class="renting_fee_per_month" type="text" name="renting_fee_per_month" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input type="number" min="1" name="day_remind_negotiate" required>
                        </div>    
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input class="tax_fee" type="text" name="tax_fee">
                        </div> 
                        <div class="input-box">
                            <span class="details">From</span>
                            <input class="from" type="text" name="from" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input class="tax_declare_fee" type="text" name="tax_declare_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input class="to" type="text" name="to" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_fee">
                        </div> 
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input type="number" min="1" name="payment_term" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input class="cleaning_fee" type="text" name="cleaning_fee">
                        </div> 
                        <div class="input-box">
                            <span class="details"></span>
                            <input type="hidden" >
                        </div>    
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input class="refund_for_tenant" type="text" name="refund_for_tenant">
                        </div>            
                    </div>
                    <?php 
                    if(isset($apartRentedAdd))
                    {
                        echo $apartRentedAdd;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="ADDING">
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