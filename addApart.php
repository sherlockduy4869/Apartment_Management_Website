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
                <span>ADDING APARTMENT</span>
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
                <a href="cartAdd.php">Add Apart For Rent</a>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartSellingAdd.php">Add Apart For Sell</a>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartNotRentedAdd.php">Add Apart UC</a>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <a href="apartKeyAdd.php">Add Apart Info</a>
            </div>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>