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
                <span>APARTMENT SELLING</span>
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
                        <th>Bedroom</th>
                        <th>SQM</th>
                        <th>Price <p style="font-size: 8px;">(USD-VND)</p> </th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Customize</th>
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
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['SQM'];?>m<sup>2</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo '$'.number_format($result['USD_PRICE']);?>-<br><?php echo number_format($result['USD_PRICE']);?><sup>đ</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $date_input_date;?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['NOTE'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>|<a href="apartSellingEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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