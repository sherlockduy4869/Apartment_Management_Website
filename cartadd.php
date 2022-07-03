<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
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
                            <select name="area" id="select_area">
                                <option value="">--Area--</option>
                                <option value="VGR">Vinhomes Golden River</option>
                                <option value="VCP">Vinhomes Central Park</option>
                                <option value="EH">Estella Height</option>
                                <option value="E">Estella</option>
                                <option value="C">Celesta</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <input type="text" name="bedroom" placeholder="Enter bedroom" required>
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