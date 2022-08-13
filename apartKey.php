<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartKeyClass.php';
?>
<?php
    $apartKey = new apartkey();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delApartKey = $apartKey->delete_apart_key($delID);
    }  
?>
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>QUAN LY CAN HO</span>
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
                        <th>STT</th>
                        <th>Apartment</th>
                        <th>Project</th>
                        <th>Bedroom</th>
                        <th>Management Fee</th>
                        <th>Note</th>
                        <th>Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartKeyList = $apartKey->show_apart_key_list();
                            
                            if($apartKeyList)
                            {   
                                $ID = 0;
                                while($result = $apartKeyList->fetch_assoc())
                                {
                                    $ID++;
                        ?>
                    <tr>
                        <td><?php echo $ID; ?> </td>
                        <td class="role">
                            <p><?php echo $result['APARTMENT_CODE'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $result['PROJECT'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['MANAGEMENT_FEE']);?><sup>đ</sup></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['OTHER_NOTE'];?></p>
                        </td>
                        <td class="edit">
                        <a href="apartKeyDetails.php?detailsID=<?php echo $result['APARTMENT_CODE'];?>">Details</a>|<a style="color: #41f1b6;" href="apartKeyEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to delete ?')" href="?delID=<?php echo $result['APARTMENT_CODE'];?>">Delete</a>
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