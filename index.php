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
                    <h4 style="color: var(--color-primary);"><span>300</span> Aparts</h4>
                    <h3>Available for rent</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 60) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>60%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="cartList.php">See More</a></button>
        </div>
        <!----------------------------END OF SALES---------------------------->
        <div class="rented_tax">
            <i class="fas fa-house-user"></i>
            <div class="middle">
                <div class="left">
                    <h4 style="color: var(--color-primary);"><span>300</span> Aparts</h4>
                    <h3>Rented with tax</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 30) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>30%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="apartRented.php">See More</a></button>
        </div>
        <!----------------------------END OF EXPENSES---------------------------->
        <div class="rented_no_tax">
            <i class="fas fa-home"></i>
            <div class="middle">
                <div class="left">
                    <h4 style="color: var(--color-primary);"><span>300</span> Aparts</h4>
                    <h3>Rented with no tax</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 90) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>90%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="apartRentedNoTax.php">See More</a></button>
        </div>
        <!----------------------------END OF INCOME---------------------------->
        <div class="contract_tax">
            <i class="fas fa-comments-dollar"></i>
            <div class="middle">
                <div class="left">
                    <h4 style="color: var(--color-primary);"><span>300</span> Rented-Tax</h4>
                    <h3>Need to negotiate</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 50) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>50%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="apartContract.php">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
        <div class="contract_no_tax">
            <i class="fas fa-comments"></i>
            <div class="middle">
                <div class="left">
                    <h4 style="color: var(--color-primary);"><span>300</span> Rented-No-Tax</h4>
                    <h3>Need to negotiate</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 50) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>50%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="apartContractNoTax.php">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
        <div class="collect_tax_fee">
            <i class="fas fa-sack-dollar"></i>
            <div class="middle">
                <div class="left">
                    <h4 style="color: var(--color-primary);"><span>300</span> Aparts</h4>
                    <h3>Need to collect tax fees</h3>
                </div>
                <div class="percent">
                    <svg>
                        <circle cx="50" cy="50" r = "50"></circle>
                        <circle cx="50" cy="50" r = "50" style="stroke-dashoffset: calc(314 - (314 * 50) / 100);"></circle>
                    </svg>
                    <div class="number">
                        <h2>50%</h2>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary"><a href="apartTax.php">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
</section>
<?php 
    include_once "Include/footer.php";
?>