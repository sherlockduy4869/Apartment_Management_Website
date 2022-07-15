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
                <span>APARTMENT RENTED NO TAX AREA</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartRentedNoTaxAdd.php">Apart Rented No Tax</a>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartRentedNoTax.php">Apart Rented No Tax</a>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartContractNoTax.php">Negotiate Rented No Tax</a>
            </div>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>