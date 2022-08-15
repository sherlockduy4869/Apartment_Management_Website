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
        <div class="sales">
            <span class="material-symbols-sharp">analytics</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Aparts</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF SALES---------------------------->
        <div class="expenses">
            <span class="material-symbols-sharp">bar_chart</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Aparts</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF EXPENSES---------------------------->
        <div class="income">
            <span class="material-symbols-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Aparts</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF INCOME---------------------------->
        <div class="total">
            <span class="material-symbols-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Rented-Tax</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
        <div class="total">
            <span class="material-symbols-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Rented-No-Tax</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
        <div class="total">
            <span class="material-symbols-sharp">stacked_line_chart</span>
            <div class="middle">
                <div class="left">
                    <h4><num>300</num> Aparts</h4>
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
            <button class="btn btn-primary"><a href="">See More</a></button>
        </div>
        <!----------------------------END OF TOTAL---------------------------->
</section>
<?php 
    include_once "Include/footer.php";
?>