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
                <span>APARTMENT RENTED</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Apartment Rented</div>

                <form action="cartAdd.php" method="POST" enctype="multipart/form-data">
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
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Estella Height">Estella Height</option>
                                <option value="Estella">Estella</option>
                                <option value="Celesta">Celesta</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Code</span>
                            <input type="text" name="sqm" placeholder="Enter aparment area" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Declaration Form</span>
                            <input type="text" name="house_owner" placeholder="Enter house owner name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tax Department</span>
                            <input type="text" name="phone_owner" placeholder="Enter phone number" required>
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