<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/newContractClass.php';
?>
<?php
    $apartNewContractNoTax = new apartNewContractNoTax();

    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $reDoNewContractNoTax = $apartNewContractNoTax->re_do_new_contract_no_tax($redoID);
    }  
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT NEW CONTRAC NO TAX</span>
            </div>
            <div class="profile">
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>
<div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Apartment Info</th>
                        <th class="text-center">Area</th>
                        <th class="text-center">House Owner</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartNewContractNoTaxList = $apartNewContractNoTax->show_apart_new_contract_no_tax__list();
                            
                            if($apartNewContractNoTaxList)
                            {   
                                $ID = 0;
                                while($result = $apartNewContractNoTaxList->fetch_assoc())
                                {
                                    $ID++;
                                    
                        ?>
                    <tr class="text-center">
                        <td><?php echo $ID ?></td>
                        <td class="people-de">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                            <p><?php echo $result['AGENCY_NAME'];?></p>
                        </td>
                        <td class="role">
                            <p><?php echo $result['AREA_APART'];?></p>
                        </td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                                <p><?php echo $result['PHONE_OWNER'];?>-<?php echo $result['EMAIL_OWNER'];?></p>
                            </div>
                        </td>
                        <td class="edit">
                            <a style="color: #41f1b6;" href="?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a style="color: #ffbb55;" onclick="return confirm('Do you want to redo ?')" href="?redoID=<?php echo $result['APARTMENT_CODE'];?>">Redo</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to push to rented no tax list ?')" href="?skipID=<?php echo $result['APARTMENT_CODE'];?>">Push</a>
                        </td>
                        </td>
                    </tr>
                        <?php
                                }
                            }
                        ?>
                </tbody>
            </table>
        </div>
</section>

<?php 
    include_once "Include/footer.php";
?>