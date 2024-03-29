<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedNoTaxClass.php';
?>
<?php
    $apartrentednotax = new apartrentednotax();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartRentedNoTax = $apartrentednotax->delete_apart_rented_no_tax($delID);
    }  

?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT RENTED NO TAX</span>
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
                        <th class="text-center">Area</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">Fee/Month</th>
                        <th class="text-center">Owner Recieved</th>
                        <th class="text-center">Duration</th>
                        <th class="text-center">Payment Term</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartRentedNoTaxList = $apartrentednotax->show_apart_rented_no_tax_list();
                            
                            if($apartRentedNoTaxList)
                            {   
                                $ID = 0;
                                while($result = $apartRentedNoTaxList->fetch_assoc())
                                {
                                    $ID++;
                                    $start_date = date("d-m-Y", strtotime($result['START_DAY']));  
                                    $end_date = date("d-m-Y", strtotime($result['END_DAY'])); 
                                    
                        ?>
                    <tr class="text-center">
                        <td><?php echo $ID ?></td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                                <p><?php echo $result['AGENCY_NAME'];?></p>
                            </div>
                        </td>
                        <td class="role">
                            <p><?php echo $result['AREA_APART'];?></p>
                        </td>
                        <td class="people-de">
                            <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                            <p><?php echo $result['PHONE_OWNER'];?>-<?php echo $result['EMAIL_OWNER'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['FEE_PER_MONTH']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['OWNER_RECIEVED']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $start_date;?><br>/<?php echo $end_date;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['PAYMENT_TERM'].' Month(s)';?></p>
                        </td>
                        <td class="edit">
                            <a href="apartRentedNoTaxDetails.php?detailsID=<?php echo $result['APARTMENT_CODE'];?>">Details</a>|<a style="color: #41f1b6;" href="apartRentedNoTaxEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a><br>
                            <a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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