<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedNoTaxClass.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartrentednotax = new apartrentednotax();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartRentedNoTaxAdd = $apartrentednotax->insert_apart_rented_no_tax($_POST);
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
                <span>APARTMENT RENTED NO TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Apartment Rented No Tax</div>

                <form action="apartRentedNoTaxAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment Code</span>
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
                            <span class="details">Agency Name</span>
                            <input  type="text" name="agency_name" required >
                        </div>
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input class="renting_fee_per_month" type="text" name="renting_fee_per_month" required>
                        </div>    
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input  type="text" name="agency_phone" >
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_Fee" >
                        </div>   
                        <div class="input-box">
                            <span class="details">Agency Email</span>
                            <input type="email" name="agency_email" >
                        </div>
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input type="number" value="1" min="1" name="payment_term" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Name</span>
                            <input  type="text" name="customer_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input type="number" min="1" name="day_remind_negotiate" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Phone</span>
                            <input  type="text" name="customer_phone" >
                        </div>
                        <div class="input-box">
                            <span class="details">From</span>
                            <input class="from" type="text" name="from" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Customer Email</span>
                            <input  type="email" name="customer_email">
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input class="to" type="text" name="to" required>
                        </div> 
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <?php 
                    if(isset($apartRentedNoTaxAdd))
                    {
                        echo $apartRentedNoTaxAdd;
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
    new Cleave('.management_fee', {
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