<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/userClass.php';
?>
<?php
    $user = new user();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $userAdd = $user->insert_new_user($_POST);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>USER</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add New User</div>

                <form action="userAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="full_name" placeholder="Enter your full name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">User Name</span>
                            <input type="text" name="user_name" placeholder="Enter user name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Level</span>
                            <select name="level">
                                <option value="0">Admin</option>
                                <option value="1">Employee</option>
                            </select>
                        </div> 
                    </div>
                    <?php 
                    if(isset($userAdd))
                    {
                        echo $userAdd;
                    }
                    ?>
                    <div class="button">
                        <input class="btn btn-primary" name="submit" type="submit" value="ADDING">
                    </div>
                </form>

            </div>
        </div>
</section>
<?php 
    include_once "Include/footer.php";
?>