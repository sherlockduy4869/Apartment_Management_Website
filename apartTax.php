<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartTaxClass.php';
?>
<?php
    $apartTax = new aparttax();
?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT TAX</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
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
                        <th>STT</th>
                        <th>Apartment Info</th>
                        <th>House Owner</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartTaxList = $apartTax->show_apart_tax_list();
                            
                            if($apartTaxList)
                            {   
                                $ID = 0;
                                while($result = $apartTaxList->fetch_assoc())
                                {
                                    $ID++;
                                    $start_day_term = date("d-m-Y", strtotime($result['START_DAY_TERM']));
                                    $end_day_term = date("d-m-Y", strtotime($result['END_DAY_TERM']));
                                    
                                    
                        ?>
                    <tr>
                        <td><?php echo $ID ?></td>
                        <td class="people-des">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                            <p><?php echo $result['AGENCY_NAME'];?> - <?php echo $result['AREA_APART'];?></p>
                        </td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                                <p><?php echo $result['PHONE_OWNER'];?>-<?php echo $result['EMAIL_OWNER'];?></p>
                            </div>
                        </td>
                        <td class="role">
                            <p><?php echo $start_day_term;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $end_day_term;?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['TOTAL_AMOUNT']);?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['STATUS_APART'];?><sup>đ</sup></p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>
                        </td>
                    </tr>
                        <?php
                                }
                            }
                        ?>
                </tbody>
            </table>
        </div>
</section>
<?php 
include_once "Include/footer.php";
?>