<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/waitingContractClass.php';
?>
<?php
    $waitingContractApart = new waitingContractApart();
    
    if(isset($_GET['redoID']))
    {
        $redoID = $_GET['redoID'];
        $reDoWaitingContract = $waitingContractApart->redo_apart_contract_waiting($redoID);
    }  

    if(isset($_GET['skipID']))
    {
        $skipID = $_GET['skipID'];
        $skipApartContract = $waitingContractApart->skip_apart_contract_waiting($skipID);
    } 
?>
<section id="interface">
    
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>CĂN HỘ SẮP TRẢ</span>
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
                        <th class="text-center">Owner Name</th>
                        <th class="text-center">Apartment Code</th>
                        <th class="text-center">Bedroom</th>
                        <th class="text-center">SQM</th>
                        <th class="text-center">Available From</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $apartWaitingList = $waitingContractApart->show_apart_waiting_list();
                            
                            if($apartWaitingList)
                            {   
                                $ID = 0;
                                while($result = $apartWaitingList->fetch_assoc())
                                {
                                    $ID++;
                                    $end_day= date("d-m-Y", strtotime($result['END_DAY']));
                                    
                        ?>
                    <tr class="text-center">
                        <td><?php echo $ID ?></td>
                        <td class="people">
                            <div class="people-de">
                                <h5><?php echo $result['HOUSE_OWNER'];?></h5>
                            </div>
                        </td>
                        <td class="people-de">
                            <h5><?php echo $result['APARTMENT_CODE'];?></h5>
                        </td>
                        <td class="active">
                            <p><?php echo $result['BEDROOM'];?></p>
                        </td>
                        <td class="active">
                            <p><?php echo $result['SQM'];?>m<sup>2</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $end_day;?></p>
                        </td>
                        <td class="active">
                            <p><?php echo number_format($result['FEE_PER_MONTH']);?><sup>đ</sup></p>
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