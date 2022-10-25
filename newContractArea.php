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
                <span>APARTMENT NEW CONTRACT</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <div class="val-box clickable">
                <i class="fas fa-info"></i>
                <a href="newContract.php">New Contract No Tax</a>
            </div>
            <div class="val-box clickable">
                <i class="fas fa-info"></i>
                <a href="apartSellingAdd.php">New Contract Tax</a>
            </div>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>