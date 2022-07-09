<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/financeApartClass.php';
?>
<?php
    $financeDetails = new finance();

    if(isset($_GET['apartCode']))
    {
        $apartCode = $_GET['apartCode'];
        $showStatusFeeElement = $financeDetails->show_status_fee_element($apartCode)->fetch_assoc();
    }  
?>
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>FINANCE DETAILS</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Apartment Code: <?php echo $apartCode; ?> </h3>
        <div class="values">
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
        </div>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Fee Elements</th>
                        <th class="text-center">Values</th>
                        <th class="text-center">Number Of Paying</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td class="role">
                            <p>Tax Fee</p>
                        </td>
                        <td class="role">
                            <p><?php echo $showStatusFeeElement['TAX_FEE'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_FEE'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td class="role">
                            <p>Tax Declaration</p>
                        </td>
                        <td class="role">
                            <p><?php echo $showStatusFeeElement['TAX_DECLARE'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_DECLARE'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3</td>
                        <td class="role">
                            <p>Tax Management</p>
                        </td>
                        <td class="role">
                            <p><?php echo $showStatusFeeElement['TAX_MANAGEMENT'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_MANAGEMENT'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>4</td>
                        <td class="role">
                            <p>Refund For Tenant</p>
                        </td>
                        <td class="role">
                            <p><?php echo $showStatusFeeElement['REFUND_FOR_TENANT'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_REFUND_FOR_TENANT'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>5</td>
                        <td class="role">
                            <p>Cleaning Fee</p>
                        </td>
                        <td class="role">
                            <p><?php echo $showStatusFeeElement['CLEANING_FEE'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_CLEANING_FEE'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>