<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/apartContractClass.php';
?>
<?php
    $apartContract = new apartcontract();
    
    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $reDoWaitingContract = $apartContract->redo_apart_contract($redoID);
    }  

    if(isset($_GET['skipID']))
    {
        $skipID = $_GET['skipID'];
        $skipApartContract = $apartContract->skip_apart_contract($skipID);
    } 
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>APARTMENT WAITING CONTRACT TAX</span>
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
                            $apartWaitingList = $apartContract->show_apart_Waiting_contract_tax();
                            
                            if($apartWaitingList)
                            {   
                                $ID = 0;
                                while($result = $apartWaitingList->fetch_assoc())
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