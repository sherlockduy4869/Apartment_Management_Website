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
                <span>QUAN LY CAN HO</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

    <h3 class="i-name"></h3>

    <div class="boddyy">
            <div class="container">
                <div class="title">Add Quan Ly Can Ho</div>

                <form action="apartKeyAdd.php" method="POST" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Apartment code</span>
                            <input type="text" name="apartment_code" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Project</span>
                            <select name="project" class="select2_tag">
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
                            <span class="details">House owner</span>
                            <input type="text" name="house_owner" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Door Pass</span>
                            <input type="text" name="door_pass" >
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
                            <span class="details">Wifi Pass</span>
                            <input type="text" name="wifi_pass">
                        </div>
                        <div class="input-box">
                            <span class="details">Management Fee</span>
                            <input class="management_fee" type="text" name="management_fee" >
                        </div>  
                        <div class="input-box">
                            <span class="details">Electric Code</span>
                            <input type="text" name="electric_code">
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Code</span>
                            <textarea name="internet_code"></textarea>
                        </div>
                        <div class="input-box">
                            <span class="details">Internet Note</span>
                            <textarea name="internet_note"></textarea>
                        </div>
                        
                        <div class="input-box">
                            <span style="color: red;" class="details">Key stored in Office:</span>
                            <input type="hidden">
                        </div>
                        <div class="input-box">
                            <span style="color: red;" class="details">Key handover for customer: </span>
                            <input type="hidden">
                        </div>

                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" name="chia_khoa_co_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Chia Khoa Co</span>
                            <input type="text" name="chia_khoa_co_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" name="pn1_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN1</span>
                            <input type="text" name="pn1_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" name="pn2_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN2</span>
                            <input type="text" name="pn2_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" name="pn3_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN3</span>
                            <input type="text" name="pn3_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" name="pn4_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Key PN4</span>
                            <input type="text" name="pn4_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" name="balcony_office">
                        </div>
                        <div class="input-box">
                            <span class="details">Key Balcony</span>
                            <input type="text" name="balcony_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" name="mail_box_office">
                        </div>
                        <div class="input-box">
                            <span class="details">MailBox</span>
                            <input type="text" name="mail_box_customer">
                        </div>

                        <div class="note">
                        <span class="details">Note for key</span>
                        <textarea class="selling_note" name="note_for_key" cols="30" rows="10"></textarea>
                        </div>

                        <div class="input-box">
                            <span style="color: red;" class="details">Card stored in Office:</span>
                            <input type="hidden">
                        </div>
                        <div class="input-box">
                            <span style="color: red;" class="details">Card handover for customer: </span>
                            <input type="hidden">
                        </div>

                        <div class="input-box">
                            <span class="details">The Thang May</span>
                            <input type="text" name="the_thang_may_office">
                        </div>
                        <div class="input-box">
                            <span class="details">The Thang May</span>
                            <input type="text" name="the_thang_may_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon_office">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Lon</span>
                            <input type="text" name="the_tu_lon_customer">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho_office">
                        </div>
                        <div class="input-box">
                            <span class="details">The Tu Nho</span>
                            <input type="text" name="the_tu_nho_customer">
                        </div>
                    </div>
                    <div class="note">
                        <span class="details">Remote Dieu Hoa</span>
                        <textarea class="selling_note" name="remote_dieu_hoa" cols="30" rows="10"></textarea>
                    </div>
                    <div class="note">
                        <span class="details">Other Note</span>
                        <textarea class="selling_note" name="other_note" cols="30" rows="10"></textarea>
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