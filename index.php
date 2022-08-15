<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/dataAnalyticsClass.php';
?>

<?php
    $dataAnalytic = new dataAnalytic();
    $result_cart_for_rent = $dataAnalytic->get_apart_for_rent_percentage();
    $result_rented_tax_contract = $dataAnalytic->get_apart_rented_tax_contract_percentage();
    $result_rented_no_tax_contract = $dataAnalytic->get_apart_rented_no_tax_contract_percentage();
    $result_rented_money = $dataAnalytic->get_apart_rented_money_percentage();
?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>DATA ANALYTICS</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <div class="insights">
        <div class="for_rent">
            <i class="fas fa-house"></i>
            <div class="middle">
                <div class="left">
                    <h4><span class="num"><?php echo $result_cart_for_rent[0]; ?></span> Aparts</h4>
                    <h3>Available for rent</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle class="circle_for_rent" cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * <?php echo $result_cart_for_rent[1]; ?>) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2><span class="num"><?php echo number_format($result_cart_for_rent[1], 1); ?></span> %</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="cartList.php">See More</a></button>
        </div>
        <!----------------------------END---------------------------->
        <div class="collect_tax_fee">
            <i class="fas fa-sack-dollar"></i>
            <div class="middle">
                <div class="left">
                    <h4><span class="num"><?php echo $result_rented_money[0]; ?></span> Aparts</h4>
                    <h3>Need to collect tax fees</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle class="circle_tax_fee" cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * <?php echo $result_rented_money[1]; ?>) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2><span class="num"><?php echo number_format($result_rented_money[1], 1); ?></span>%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-danger"><a href="apartTax.php">See More</a></button>
        </div>
        <!----------------------------END---------------------------->
        <div class="contract_tax">
            <i class="fas fa-comments-dollar"></i>
            <div class="middle">
                <div class="left">
                    <h4><span class="num"><?php echo $result_rented_tax_contract[0]; ?></span> Rented-Tax</h4>
                    <h3>Need to negotiate</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle class="circle_contract_tax" cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * <?php echo $result_rented_tax_contract[1]; ?>) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2><span class="num"><?php echo number_format($result_rented_tax_contract[1], 1); ?></span> %</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-success"><a href="apartContract.php">See More</a></button>
        </div>
        <!----------------------------END---------------------------->
        <div class="contract_no_tax">
            <i class="fas fa-comments"></i>
            <div class="middle">
                <div class="left">
                    <h4><span class="num"><?php echo $result_rented_no_tax_contract[0]; ?></span> Rented-No-Tax</h4>
                    <h3>Need to negotiate</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle class="circle_contract_no_tax" cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * <?php echo $result_rented_no_tax_contract[1]; ?>) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2><span class="num"><?php echo number_format($result_rented_no_tax_contract[1], 1); ?></span> %</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-warning"><a href="apartContractNoTax.php">See More</a></button>
        </div>
        <!----------------------------END---------------------------->
</section>
<?php 
    include_once "Include/footer.php";
?>