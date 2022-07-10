<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartTaxClass.php';
?>
<?php
    $apartTax = new aparttax();

    if(isset($_GET['markdoneID']))
    {
        $markdoneID = $_GET['markdoneID'];
        $markdoneApartTax = $apartTax->markdone_apart_tax($markdoneID);
    }  

    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $redoApartTax = $apartTax->redo_apart_tax($redoID);
    } 

    if(isset($_GET['nextID']))
    {
        $nextID = $_GET['nextID'];
        $nextApartTax = $apartTax->skip_apart_tax($nextID);
    } 
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
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Apartment Info</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">From</th>
                        <th class="text-center">To</th>
                        <th class="text-center">Total Amount</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Info</th>
                        <th class="text-center">Customize</th>
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
                            <p><?php echo $start_day_term;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $end_day_term;?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['TOTAL_AMOUNT']);?><sup>đ</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['STATUS_APART'];?></p>
                        </td>
                        <td class="edit">
                            <a href="apartTaxDetails.php?detailsID=<?php echo $result['APARTMENT_CODE'];?>">Details</a><br><a href="financeApart.php?apartCode=<?php echo $result['APARTMENT_CODE'];?>">Finance</a>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="?markdoneID=<?php echo $result['APARTMENT_CODE'];?>">Markdone</a><br>
                            <a onclick="return confirm('Do you want to redo ?')" href="?redoID=<?php echo $result['APARTMENT_CODE'];?>">Redo</a>|<a onclick="return confirm('Do you want to next cycle ?')" href="?nextID=<?php echo $result['APARTMENT_CODE'];?>">Next</a>
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