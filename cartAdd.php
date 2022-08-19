<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartCartClass.php';
?>
<?php
    $apartCart = new apartcart();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $cartAdd = $apartCart->insert_apart_cart($_POST);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT FOR RENT</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Apartment For Rent</div>

                <form action="cartAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment Code</span>
                            <input type="text" name="apartment_code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Name</span>
                            <input type="text" name="agent_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <select name="area" class="select2_tag">
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Vinhomes Grand Park">Vinhomes Grand Park</option>
                                <option value="Estella Height">Estella Height</option>
                                <option value="Celesta Rise">Celesta Rise</option>
                                <option value="The Estella">The Estella</option>
                                <option value="Celesta">Celesta</option>
                                <option value="Sunwah Pearl">Sunwah Pearl</option>
                                <option value="Thao Dien Green">Thao Dien Green</option>
                                <option value="The Vista An Phu">The Vista An Phu</option>
                                <option value="Xi Riverview">Xi Riverview</option>
                                <option value="The View Riviera Point">The View Riviera Point</option>
                                <option value="The Infiniti">The Infiniti</option>
                                <option value="Zennity">Zennity</option>
                                <option value="Empire City">Empire City</option>
                                <option value="Metropole">Metropole</option>
                                <option value="Sun Avenue">Sun Avenue</option>
                                <option value="Saigon Pearl">Saigon Pearl</option>
                                <option value="Palm Heights">Palm Heights</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input type="text" name="agency_phone" >
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom" class="select2_tag">
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
                            <span class="details">Agency Email</span>
                            <input type="email" name="agency_email" >
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" min="1" name="sqm" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House Owner</span>
                            <input type="text" name="house_owner" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Status Furniture</span>
                            <select name="status_furniture" class="select2_tag">
                                <option value="No Furniture">No Furniture</option>
                                <option value="Semi Furniture">Semi Furniture</option>
                                <option value="Full Furniture">Full Furniture</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner">
                        </div>   
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input class="apart_price" type="text" name="apart_price" required>
                        </div> 
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_owner">
                        </div>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"></textarea>
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
<script>
    new Cleave('.apart_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>
