<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartNoMoneyRentedClass.php';
?>
<?php
    $apartNoMoneyRented = new apartnomoneyrented();

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
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Apartment Info</th>
                        <th class="text-center">Agency Info</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">Fee Per Month</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartNoMoneyRentedList = $apartNoMoneyRented->show_apart_no_money_rented_list();
                            
                            if($apartNoMoneyRentedList)
                            {   
                                $ID = 0;
                                while($result = $apartNoMoneyRentedList->fetch_assoc())
                                {
                                    $ID++;
                                    
                        ?>
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                                <p><?php echo $result['APARTMENT_CODE'];?></p>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5>Software Developer</h5>
                            <p>Web dev</p>
                        </td>
                        <td class="active">
                            <p>Active</p>
                        </td>
                        <td class="role">
                            <p>Owner</p>
                        </td>
                        <td class="edit">
                            <a href="#">Edit</a>
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