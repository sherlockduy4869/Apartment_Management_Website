<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartNoMoneyRentedClass.php';
?>
<?php
    $apartnomoneyrented = new apartnomoneyrented();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartNoMoneyRentedAdd = $apartnomoneyrented->insert_apart_no_money_rented($_POST);
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
                <div class="title">Add Apartment No Money Rented</div>

                <form action="apartNoMoneyRentedAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment Code</span>
                            <input  type="text" name="apartment_code" placeholder="Enter apartment code" required>
                        </div>   
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input type="number" value="1" min="1" name="payment_term" required>
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
                            <span class="details">From</span>
                            <input class="from" type="text" name="from"  required>
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input class="to" type="text" name="to" required>
                        </div>  
                    </div>
                    <?php 
                    if(isset($apartNoMoneyRentedAdd))
                    {
                        echo $apartNoMoneyRentedAdd;
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