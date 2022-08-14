    <!--------------MENU BAR AREA-------------->
    <?php $adminName = Session::get('adminName') ?>
    <section id="menu">
        <div class="logo clickable">
            <a href="index.php"><img src="./Resource/img/logo.jpg"></a>
            <span>BETTER HOMES</span>
        </div>
        <div class="items">
            <div class="clickable"><i class="fas fa-plus"></i><a href="addApart.php">Add Apart</a></div>
            <div class="clickable"><i class="fas fa-cart-plus"></i><a href="cartList.php">Apart For Rent</a></div>
            <div class="clickable"><i class="fas fa-hand-holding-usd"></i><a href="areApartRented.php">Rented Tax</a></div>
            <div class="clickable"><i class="fas fa-home-lg"></i><a href="areaApartRentedNoTax.php">Rented No Tax </a></div>
            <div class="clickable"><i class="fas fa-key"></i><a href="apartKey.php">Quan ly can ho</a></div>
            <div class="clickable"><i class="fab fa-sellcast"></i><a href="apartSelling.php">Apart For Sell</a></div>
            <div class="clickable"><i class="fas fa-chart-bar"></i><a href="apartNotRented.php">Apart UC</a></div>
            <div class="clickable"><i class="fas fa-chart-line"></i><a href="index.php">Data Analytics</a></div>
            <div class="clickable <?php if($adminName != 'Giang'){echo 'not_display';} ?>"><i class="fas fa-users"></i><a href="user.php">User</a></div>
        </div>
    </section>