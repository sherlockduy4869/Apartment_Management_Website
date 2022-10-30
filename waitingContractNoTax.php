<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractNoTaxClass.php';
?>
<?php
    $apartContractNoTax = new apartcontractnotax();
    
    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $reDoWaitingContractNoTax = $apartContractNoTax->redo_apart_contract_no_tax($redoID);
    }  

    if(isset($_GET['skipID']))
    {
        $skipID = $_GET['skipID'];
        $skipApartContract = $apartContractNoTax->skip_apart_contract_no_tax($skipID);
    } 
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT WAITING CONTRACT NO TAX</span>
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
                            $apartWaitingContractNoTaxList = $apartContractNoTax->show_apart_waiting_contract_no_tax_list();
                            
                            if($apartWaitingContractNoTaxList)
                            {   
                                $ID = 0;
                                while($result = $apartWaitingContractNoTaxList->fetch_assoc())
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
                        <td class="role">
                            <p><?php echo number_format($result['FEE_PER_MONTH']);?></p>
                        </td>
                        <td class="edit">
                            <a style="color: #ffbb55;" onclick="return confirm('Do you want to redo ?')" href="?redoID=<?php echo $result['APARTMENT_CODE'];?>">Redo</a>|<a style="color: #ff7782;" onclick="return confirm('Do you want to skip ?')" href="?skipID=<?php echo $result['APARTMENT_CODE'];?>">Skip</a>
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