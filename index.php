<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
?>

<div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Apartment Infor</th>
                        <th>House Owner</th>
                        <th>Bedroom</th>
                        <th>SQM</th>
                        <th>Customization</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="people-des">
                            <h5>Apartment_Code</h5>
                            <p>Agent_Name - Area</p>
                        </td>
                        <td class="people">
                            <img src="./Resource/img/profile-1.jpg">
                            <div class="people-de">
                                <h5>House Owner</h5>
                                <p>Phone of ower</p>
                            </div>
                        </td>
                        <td class="active">
                            <p>Bedroom</p>
                        </td>
                        <td class="role">
                            <p>SQM</p>
                        </td>
                        <td class="edit">
                            <a href="#">Add</a>|<a href="#">Edit</a>|<a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>