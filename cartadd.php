<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartCart = new apartcart();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $cartAdd = $apartCart->insert_apart_cart($_POST, $_FILES);
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

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add apartment cart</div>

                <form action="cartadd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input type="text" name="apartment_code" placeholder="Enter apartment code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agent name</span>
                            <input type="text" name="agent_name" placeholder="Enter agent name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <select name="area">
                                <option value="">--Area--</option>
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Estella Height">Estella Height</option>
                                <option value="Estella">Estella</option>
                                <option value="Celesta">Celesta</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom">
                                <option value="">--Bedroom--</option>
                                <option value="1 Bed">1 Bed</option>
                                <option value="2 Bed">2 Bed</option>
                                <option value="2 Bed + 1">2 Bed + 1</option>
                                <option value="3 Bed">3 Bed</option>
                                <option value="3 Bed + 1">3 Bed + 1</option>
                                <option value="4 Bed">4 Bed</option>
                                <option value="4 Bed + 1">4 Bed + 1</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="text" name="sqm" placeholder="Enter aparment area" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" placeholder="Enter house owner name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner" placeholder="Enter phone number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House Owner Image</span>
                            <input type="file" name="image_owner" required>
                        </div>        
                    </div>
                    <?php 
                    if(isset($cartAdd))
                    {
                        echo $cartAdd;
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