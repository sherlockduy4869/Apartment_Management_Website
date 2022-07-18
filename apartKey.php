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

        <h3 class="i-name">Dashboard</h3>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="people">
                            <div class="people-de">
                                <h5>John Doe</h5>
                                <p>john@gmail.com</p>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5>Software Developer</h5>
                            <p>Web dev</p>
                        </td>
                        <td class="active">
                            <p>Active</p>
                        </td>
                        <td class="role">
                            <p>Owner</p>
                        </td>
                        <td class="edit">
                            <a href="#">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php 
include_once "Include/footer.php";
?>