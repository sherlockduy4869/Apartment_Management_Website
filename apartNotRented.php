<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartNotRentedClass.php';
?>
<?php
    $apartNotRented = new apartnotrented();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartNotRented = $apartNotRented->delete_apart_not_rented($delID);
    }  

?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT NOT RENTED</span>
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
                        <th>Bedroom</th>
                        <th>SQM</th>
                        <th>Status Apart</th>
                        <th>Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartNotRentedList = $apartNotRented->show_apart_not_rented_list();
                            
                            if($apartNotRentedList)
                            {   
                                $ID = 0;
                                while($result = $apartNotRentedList->fetch_assoc())
                                {
                                    $ID++;
                                    
                                    
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
                                <p><?php echo $result['PHONE_OWNER'];?></p>
                            </div>
                        </td>
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['SQM'];?>m<sup>2</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['STATUS_APART'];?></p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>|<a href="apartNotRentedEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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