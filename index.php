<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartCart = new apartcart();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartCart = $apartCart->delete_apart_cart($delID);
    }  
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT CART</span>
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
                    <span>Cart Aparts</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>Different Areas</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>12</h3>
                    <span>Different Agents</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>Bedroom Styles</span>
                </div>
            </div>
        </div>

<div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Apartment Infor</th>
                        <th>House Owner</th>
                        <th>Bedroom</th>
                        <th>SQM</th>
                        <th>Customization</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartCartList = $apartCart->show_apart_cart_list();
                            
                            if($apartCartList)
                            {   
                                $ID = 0;
                                while($result = $apartCartList->fetch_assoc())
                                {
                                    $ID++;
                                    
                        ?>
                    <tr>
                        <td><?php echo $ID ?></td>
                        <td class="people-des">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                            <p><?php echo $result['AGENT_NAME'];?> - <?php echo $result['AREA'];?></p>
                        </td>
                        <td class="people">
                            <img src="Uploads/<?php echo $result['IMG_OWNER'];?>">
                            <div class="people-de">
                                <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                                <p><?php echo $result['PHONE'];?></p>
                            </div>
                        </td>
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['SQM'];?>m<sup>2</sup></p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>|<a href="cartEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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