<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartSellingClass.php';
?>
<?php
    $apartSelling = new apartselling();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartSelling = $apartSelling->delete_apart_selling($delID);
    }  

?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT FOR SELL</span>
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
                        <th class="text-center">Area</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">Apart Details</th>
                        <th class="text-center">Price <p style="font-size: 8px;">(USD/VND)</p> </th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartSellingList = $apartSelling->show_apart_selling_list();
                            
                            if($apartSellingList)
                            {   
                                $ID = 0;
                                while($result = $apartSellingList->fetch_assoc())
                                {
                                    $ID++;
                                    $date_input_date = date("d-m-Y", strtotime($result['DATE_INPUT_DATA']));
                                    
                        ?>
                    <tr>
                        <td><?php echo $ID ?></td>
                        <td class="people-de">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                            <p><?php echo $result['AGENCY_NAME'];?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['AREA_APART'];?></p>
                        </td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                                <p><?php echo $result['PHONE_OWNER'];?>-<?php echo $result['EMAIL_OWNER'];?></p>
                            </div>
                        </td>
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?>/<?php echo $result['SQM'];?>m<sup>2</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo '$'.number_format($result['USD_PRICE']);?>/<br><?php echo number_format($result['VND_PRICE']);?><sup>đ</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $date_input_date;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['NOTE'];?></p>
                        </td>
                        <td class="edit">
                            <a href="apartSellingDetails.php?detailsID=<?php echo $result['APARTMENT_CODE'];?>">Details</a>|<a style="color: #41f1b6;" href="apartSellingEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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