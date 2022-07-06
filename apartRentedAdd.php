<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
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

                <form action="cartAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input  type="text" name="apartment_code" placeholder="Enter apartment code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agent name</span>
                            <input type="text" name="agent_name" placeholder="Enter agent name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <select name="area">
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Estella Height">Estella Height</option>
                                <option value="Estella">Estella</option>
                                <option value="Celesta">Celesta</option>
                            </select>
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
                            <input type="number" value="0" min="0" name="payment_term" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Renting Fee/Month</span>
                            <input type="number" value="0" min="0" name="renting_fee_per_month" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Fee</span>
                            <input class="formatNum" type="number" value="0" min="0" name="tax_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Tax Declare Fee</span>
                            <input class="formatNum" value="0" min="0" type="number" name="tax_declare_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="formatNum" value="0" min="0" type="number" name="management_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Cleaning Fee</span>
                            <input class="formatNum" type="number" value="0" min="0" name="cleaning_fee" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Refund For Tenant</span>
                            <input class="formatNum" type="number" value="0" min="0" name="refund_for_tenant" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Total Amount</span>
                            <input class="totalAmount" disabled type="number" name="total_amount">
                        </div>                  
                        <div class="input-box">
                            <span class="details">From</span>
                            <input type="date" name="from"required>
                        </div> 
                        <div class="input-box">
                            <span class="details">To</span>
                            <input type="date" name="to" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Day Remind Negotiate</span>
                            <input type="number" value="0" min="0" name="day_remind_negotiate" required>
                        </div> 
                    </div>
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