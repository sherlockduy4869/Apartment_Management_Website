<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/newContractClass.php';
?>
<?php
    $apartNewContractTax = new apartNewContract();
    
    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $reDoNewContractTax = $apartNewContractTax->re_do_new_contract_tax($redoID);
    }  

    if(isset($_GET['pushID']))
    {
        $pushID = $_GET['pushID'];
        $pushNewContractTax = $apartNewContractTax->push_apart_new_contract_tax($pushID);
    }  
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT NEW CONTRAC TAX</span>
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
                        <th class="text-center">Customer</th>
                        <th class="text-center">Fee/Month</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartNewContractTaxList = $apartNewContractTax->show_apart_new_contract_tax_list();
                            
                            if($apartNewContractTaxList)
                            {   
                                $ID = 0;
                                while($result = $apartNewContractTaxList->fetch_assoc())
                                {
                                    $ID++;
                                    
                        ?>
                    <tr class="text-center">
                        <td><?php echo $ID ?></td>
                        <td class="people-de">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                            <p><?php echo $result['AGENCY_NAME'];?></p>
                        </td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['CUTOMER_NAME'];?></h5>
                                <p><?php echo $result['CUTOMER_PHONE'];?>-<?php echo $result['CUTOMER_EMAIL'];?></p>
                            </div>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['FEE_PER_MONTH']);?></p>
                        </td>
                        <td class="edit">
                            <a style="color: #41f1b6;" href="newContractTaxEdit.php?editID=<?php echo $result['APARTMENT_CODE'];?>">Edit</a>|<a style="color: #ffbb55;" onclick="return confirm('Do you want to redo ?')" href="?redoID=<?php echo $result['APARTMENT_CODE'];?>">Redo</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to push to rented no tax list ?')" href="?pushID=<?php echo $result['APARTMENT_CODE'];?>">Push</a>
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