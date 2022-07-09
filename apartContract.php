<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractClass.php';
?>
<?php
    $apartContract = new apartcontract();
?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT CONTRACT</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>
        <h3 class="i-name">Dashboard</h3>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Apartment Info</th>
                        <th>House Owner</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Renting_Fee<br>Per Month</th>
                        <th>Status</th>
                        <th>Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartContractList = $apartContract->show_apart_contract_list();
                            
                            if($apartContractList)
                            {   
                                $ID = 0;
                                while($result = $apartContractList->fetch_assoc())
                                {
                                    $ID++;
                                    $start_day = date("d-m-Y", strtotime($result['START_DAY']));
                                    $end_day= date("d-m-Y", strtotime($result['END_DAY']));
                                    
                                    
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
                            <p><?php echo $start_day;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $end_day;?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['FEE_PER_MONTH']);?><sup>đ</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['STATUS_APART'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Markdone</a>|<a href="#">Redo</a> <br>
                            <a href="#">Details</a>|<a href="#">Skip</a>
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