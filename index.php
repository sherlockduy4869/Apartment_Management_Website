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
        </div>
        <div class="profile">
            <img src="./Resource/img/profile-1.jpg">
        </div>
    </div>

    <h3 class="i-name">DATA SUMMARY AND ANALYTICS</h3>
    <div class="values">
        <div class="val-box clickable">
            <i class="fas fa-house"></i>
            <a href="cartAdd.php">Add Apart For Rent</a>
        </div>
        <div class="val-box clickable">
            <i class="fas fa-comments"></i>
            <a href="apartContractNoTax.php">Add Apart For Sell</a>
        </div>
        <div class="val-box clickable">
            <i class="fas fa-comments-dollar"></i>
            <a href="apartContract.php">Add Apart UC</a>
        </div>
        <div class="val-box clickable">
            <i class="fas fa-sack-dollar"></i>
            <a href="apartTax.php">Quan Ly Can Ho</a>
        </div>
    </div>
</section>

<?php 
    include_once "Include/footer.php";
?>