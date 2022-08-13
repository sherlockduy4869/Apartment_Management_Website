<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/userClass.php';
?>
<?php
    $user = new user();

    if(isset($_GET['delID']))
    {
        $delID = $_GET['delID'];
        $delUser = $user->delete_user($delID);
    }  

    $user_list = $user->show_all_user();
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
                <i class="fa-solid fa-plus"></i>
                <a href="userAdd.php">Add New User</a>
            </div>
        </div>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Customize</th> 
                    </tr>
                </thead>
                <tbody>
                        <?php
                            if($user_list)
                            {   
                                $ID = 0;
                                while($result = $user_list->fetch_assoc())
                                {
                                    $ID++;
                                    
                        ?>
                    <tr>
                        <td><?php echo $ID ?></td>
                        <td class="role">
                            <p><?php echo $result['NAME'];?></p>
                        </td>
                        <td class="active">
                            <p>
                                <?php
                                    if($result['LEVEL'] == 0){
                                        echo "Admin";
                                    }
                                    else{
                                        echo "Employee";
                                    }
                                ?>
                            </p>
                        </td>
                        <td class="edit <?php if($result['NAME'] == 'Giang'){echo 'not_display';} ?>">
                            <a onclick="return confirm('Do you want to remove ?')" href="?delID=<?php echo $result['ACCOUNT_ID'];?>">Remove</a>
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