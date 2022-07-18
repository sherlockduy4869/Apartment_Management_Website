<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartSellingClass.php';
?>
<?php
    $apartSelling = new apartselling();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $sellingAdd = $apartSelling->insert_apart_selling($_POST);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT FOR SELL</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Apartment For Sell</div>

                <form action="apartSellingAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input type="text" name="apartment_code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency name</span>
                            <input type="text" name="agent_name" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Area</span>
                            <input list="area_list" name="area">
                            <datalist id="area_list">
                                <option value="Vinhomes Golden River">Vinhomes Golden River</option>
                                <option value="Vinhomes Central Park">Vinhomes Central Park</option>
                                <option value="Estella Height">Vinhomes Grand Park</option>
                                <option value="Estella">Sunwah Pearl</option>
                                <option value="Celesta">Estella Height</option>
                                <option value="Celesta">The Estella</option>
                                <option value="Celesta">The Vista An Phu</option>
                                <option value="Celesta">Xi Riverview</option>
                                <option value="Celesta">Empire City</option>
                                <option value="Celesta">Palm Heights</option>
                                <option value="Celesta">Saigon Pearl </option>
                                <option value="Celesta">Sun Avenue</option>
                                <option value="Celesta">Thao Dien Green</option>
                                <option value="Celesta">The Infiniti</option>
                                <option value="Celesta">The View Riviera Point</option>
                                <option value="Celesta">Zennity</option>
                                <option value="Celesta">Metropole</option>
                                <option value="Celesta">Other</option>
                            </datalist>
                        </div>
                        <div class="input-box">
                            <span class="details">Agency Phone</span>
                            <input type="text" name="agency_phone">
                        </div>
                        <div class="input-box">
                            <span class="details">Bedroom</span>
                            <select name="bedroom">
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
                            <input type="email" name="agency_email">
                        </div>
                        <div class="input-box">
                            <span class="details">SQM</span>
                            <input type="number" name="sqm" required>
                        </div>
                        <div class="input-box">
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" required>
                        </div>
                        <div class="input-box">
                            <span class="details">USD Price</span>
                            <input class="usd_price" type="text" name="usd_price" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="text" name="phone_owner" required>
                        </div>   
                        <div class="input-box">
                            <span class="details">VND Price</span>
                            <input class="vnd_price" type="text" name="vnd_price" required>
                        </div>  
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" name="email_owner" required>
                        </div>  
                    </div>
                    <div class="note">
                        <textarea class="selling_note" name="note" cols="30" rows="10"></textarea>
                    </div>
                    <?php 
                    if(isset($sellingAdd))
                    {
                        echo $sellingAdd;
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
    new Cleave('.vnd_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
    new Cleave('.usd_price', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>