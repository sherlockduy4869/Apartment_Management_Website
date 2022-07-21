<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartKeyClass.php';
?>
<?php
    $apartKey = new apartkey();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $keyAdd = $apartKey->insert_apart_key($_POST);
    }
?>
<section id="interface">
    <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT MANAGEMENT</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Apartment Management</div>

                <form action="apartKeyAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input type="text" name="apartment_code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Project</span>
                            <input type="text" name="project">
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
                            <span class="details">Door Pass</span>
                            <input type="text" name="door_pass" >
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_fee" >
                        </div>   
                        <div class="input-box">
                            <span class="details">Wifi Pass</span>
                            <input type="text" name="wifi_pass">
                        </div>
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input type="text" name="electric_code">
                        </div>
                        <div class="input-box">
                            <span class="details">PN1</span>
                            <input type="text" name="pn1">
                        </div>
                        <div class="input-box">
                            <span class="details">Key</span>
                            <input type="text" name="key_info">
                        </div>
                        <div class="input-box">
                            <span class="details">PN2</span>
                            <input type="text" name="pn2">
                        </div>
                        <div class="input-box">
                            <span class="details">Kho</span>
                            <input type="text" name="kho">
                        </div>
                        <div class="input-box">
                            <span class="details">PN3</span>
                            <input type="text" name="pn3">
                        </div>
                        <div class="input-box">
                            <span class="details">Lo Gia</span>
                            <input type="text" name="lo_gia">
                        </div>
                        <div class="input-box">
                            <span class="details">PN4</span>
                            <input type="text" name="pn4">
                        </div>
                        <div class="input-box">
                            <span class="details">Balcony</span>
                            <input type="text" name="balcony">
                        </div>
                        <div class="input-box">
                            <span class="details"></span>
                            <input type="hidden">
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Code</span>
                            <input type="text" name="internet_code">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="internet_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Cu Dan</span>
                            <input type="text" name="the_cu_dan">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_cu_dan_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Kho Co</span>
                            <input type="text" name="chia_khoa_co">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="chia_khoa_co_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_tu_lon_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="the_tu_nho_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Key Hom Thu</span>
                            <input type="text" name="key_hom_thu">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="key_hom_thu_note"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Remote Dieu Hoa</span>
                            <input type="text" name="remote_dieu_hoa">
                        </div>
                        <div class="input-box">
                            <span class="details">Note</span>
                            <textarea name="remote_dieu_hoa_note"></textarea>
                        </div>
                    </div>
                    <div class="note">
                        <textarea class="selling_note" placeholder="Other note here" name="other_note" cols="30" rows="10"></textarea>
                    </div>
                    <?php 
                    if(isset($keyAdd))
                    {
                        echo $keyAdd;
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
    new Cleave('.management_fee', {
        numeral: true,
        numeralThousandGroupStyle: 'thousand'
    });
</script>
<?php 
    include_once "Include/footer.php";
?>