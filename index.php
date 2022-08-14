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
            <span>DATA SUMMARY AND ANALYTICS</span>
        </div>
        <div class="profile">
            <img src="./Resource/img/profile-1.jpg">
        </div>
    </div>
    <main>
    <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>$25,024</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!----------------------------END OF SALES---------------------------->
                <div class="expenses">
                    <span class="material-symbols-sharp">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1>$25,024</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!----------------------------END OF EXPENSES---------------------------->
                <div class="income">
                    <span class="material-symbols-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>$25,024</h1>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!----------------------------END OF INCOME---------------------------->
    </div>
    </main>
</section>

<?php 
    include_once "Include/footer.php";
?>