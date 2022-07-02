<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
?>

<section id="interface">
    <div class="navigation">
        <div class="n1"><span class="title-page">APARTMENT CART</span></div>
        <div class="profile">
            <i class="fas fa-chart-bar"></i>
            <img src="./Resource/img/profile-1.jpg">
        </div>
    </div>

    <h3 class="i-name">Add apartment cart</h3>

    <div class="admin-content-right-product_add">
                <form action="cartadd.php" method="POST" enctype="multipart/form-data">
                    <label for="">Enter product name<span style="color: red;">*</span></label>
                    <input type="text" name="product_name" required>

                    <label for="">Choose category<span style="color: red;">*</span></label>
                    <select name="category_id" id="select_category">
                        <option value="">--Category--</option>
                    </select>

                    <label for="">Product price<span style="color: red;">*</span></label>
                    <input type="text" required name="price">

                    <label for="">Choose type<span style="color: red;">*</span></label>
                    <select name="type" id="select_category">
                        <option value="">--Type--</option>
                        <option value="2">Best-Seller</option>
                        <option value="1">Featured</option>
                        <option value="0">Non-Featured</option>
                    </select>

                    <label for="">Product picture<span style="color: red;">*</span></label>
                    <input type="file" required name="image">

                    <button type="submit" name="submit">Add</button> 
                </form>
    </div>
</section>
<?php 
    include_once "Include/footer.php";
?>