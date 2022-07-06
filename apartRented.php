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
                <span>APARTMENT Rented</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
        <div class="values">
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3>8,567</h3>
                    <span>New Users</span>
                </div>
            </div>
        </div>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Apartment Info</th>
                        <th>House Owner</th>
                        <th>Tax Info</th>
                        <th>Duration</th>
                        <th>Total</th>
                        <th>Customization</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="people">
                            <div class="people-de">
                                <h5>AC.56.DA</h5>
                                <p>Agent Duy - Vinhomes Golden River</p>
                            </div>
                        </td>
                        <td class="people-des">
                            <h5>Tran Dong Giang</h5>
                            <p>0977647866 - giang@gmail.com</p>
                        </td>
                        <td class="people-des">
                            <h5>TC0978677</h5>
                            <p>Online - CA Quan 3</p>
                        </td>
                        <td class="active">
                            <p>03/04/2022 - 09/09/2022</p>
                        </td>
                        <td class="active">
                            <p>1.000.000</p>
                        </td>
                        <td class="edit">
                            <a href="#">Details</a>|<a href="#">Edit</a>|<a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    
<?php 
include_once "Include/footer.php";
?>