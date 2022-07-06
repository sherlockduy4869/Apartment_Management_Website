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
                <span>APARTMENT CART</span>
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
                <div>
                    <a href="cartAdd.php">Add Apart Cart</a>
                </div>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <div>
                    <a href="apartRentedAdd.php">Add Apart Rented</a>
                </div>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <div>
                    <a href="#">Add Apart Selling</a>
                </div>
            </div>
            <div class="val-box clickable">
                <i class="fa-solid fa-plus"></i>
                <div>
                    <a href="#">Add Apart Not Rented</a>
                </div>
            </div>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>