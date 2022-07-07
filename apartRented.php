<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartRentedClass.php';
?>
<?php
    $apartRented = new apartrented();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartRented = $apartRented->delete_apart_rented($delID);
    }  

?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT Rented</span>
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
                        <th>Tax Info</th>
                        <th>Duration</th>
                        <th>Total</th>
                        <th>Customization</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartRentedList = $apartRented->show_apart_rented_list();
                            
                            if($apartRentedList)
                            {   
                                $ID = 0;
                                $totalAmount = 0;
                                while($result = $apartRentedList->fetch_assoc())
                                {
                                    $ID++;
                                    $totalAmount = $result['TAX_FEE'] + $result['TAX_DECLARE'] + $result['TAX_MANAGEMENT'] 
                                                + $result['REFUND_FOR_TENANT'] + $result['CLEANING_FEE'];

                                    $start_date = date("d-m-Y", strtotime($result['START_DAY']));  
                                    $end_date = date("d-m-Y", strtotime($result['END_DAY'])); 
                                    
                        ?>
                    <tr>
                        <td><?php echo $ID ?></td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                                <p><?php echo $result['AGENCY_NAME'];?> - <?php echo $result['AREA_APART'];?></p>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                            <p><?php echo $result['PHONE_OWNER'];?>-<?php echo $result['EMAIL_OWNER'];?></p>
                        </td>
                        <td class="people-des">
                            <h5><?php echo $result['TAX_CODE'];?></h5>
                            <p><?php echo $result['TAX_DECLARATION_FORM'];?>-<?php echo $result['TAX_APARTMENT'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $start_date;?> - <?php echo $end_date;?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($totalAmount);?><sub>đ</sub></p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>|<a href="apartRentedEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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