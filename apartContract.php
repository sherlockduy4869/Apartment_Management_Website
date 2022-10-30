<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractClass.php';
?>
<?php
    $apartContract = new apartcontract();
    if(isset($_GET['waitingID']))
    {
        $waitingID = $_GET['waitingID'];
        $waitingApartContract = $apartContract->waiting_apart_contract($waitingID);
    }  

    if(isset($_GET['skipID']))
    {
        $skipID = $_GET['skipID'];
        $skipApartContract = $apartContract->skip_apart_contract($skipID);
    } 
?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT CONTRACT TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>
        <h3 class="i-name">Dashboard</h3>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Apartment Info</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                        <th class="text-center">Renting_Fee<br>Per Month</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Customize</th>
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
                    <tr class="text-center">
                        <td><?php echo $ID ?></td>
                        <td class="people-de">
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
                            <p style="color: red; font-weight: bold;"><?php echo $result['STATUS_APART'];?></p>
                        </td>
                        <td class="edit">
                            <a style="color: #41f1b6;" onclick="return confirm('Do you want to change to waiting ?')" href="waitingContractTax.php?waitingID=<?php echo $result['APARTMENT_CODE'];?>">Waiting</a>|<a href="apartContractDetails.php?detailsID=<?php echo $result['APARTMENT_CODE'];?>">Details</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to skip ?')" href="?skipID=<?php echo $result['APARTMENT_CODE'];?>">Skip</a>
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