<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedClass.php';
?>
<?php
    $apartrented = new apartrented();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $apartRentedAdd = $apartrented->insert_apart_rented($_POST);
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
                <div class="title">Add Apartment Rented</div>

                <form action="apartRentedAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input  type="text" name="apartment_code" placeholder="Enter apartment code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input type="text" name="tax_code" placeholder="Enter tax code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input type="text" name="tax_declare_form" placeholder="Enter tax declaration form" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input type="text" name="tax_department" placeholder="Enter tax department" required>
                        </div>     
                        <div class="input-box">
                            <span class="details">Payment Term</span>
                            <input type="number" value="1" min="1" name="payment_term" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input class="renting_fee_per_month" type="text" min="0" name="renting_fee_per_month" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input class="tax_fee" min="0" type="text" name="tax_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input class="tax_declare_fee" min="0" type="text" name="tax_declare_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" min="0" type="text" name="management_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input class="cleaning_fee" type="text" min="0" name="cleaning_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input class="refund_for_tenant" type="text" min="0" name="refund_for_tenant" required>
                        </div>            
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input type="number" min="0" name="day_remind_negotiate" required>
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
<?php 
    include_once "Include/footer.php";
?>