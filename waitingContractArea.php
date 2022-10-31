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
                <span>CĂN HỘ SẮP TRẢ</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <div class="val-box clickable">
                <i class="fas fa-handshake-slash"></i>
                <a href="waitingContractNoTax.php">Căn Hộ Sắp Trả No Tax</a>
            </div>
            <div class="val-box clickable">
                <i class="fas fa-handshake-slash"></i>
                <a href="waitingContractTax.php">Căn Hộ Sắp Trả Tax</a>
            </div>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>