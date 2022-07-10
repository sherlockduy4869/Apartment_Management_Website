<?php
    include_once "Include/header.php";
    include_once "Include/slider.php";
    include_once $_SERVER['DOCUMENT_ROOT'].'/Class/financeApartClass.php';
?>
<?php
    $financeDetails = new finance();

    if(isset($_GET['apartCode']))
    {
        $apartCode = $_GET['apartCode'];
        $showStatusFeeElement = $financeDetails->show_status_fee_element($apartCode)->fetch_assoc();
        $getDuration = $financeDetails->get_duration_apartment($apartCode)->fetch_assoc();

        $check_status_apart = $financeDetails->check_status_apart_finance($apartCode)->fetch_assoc()['STATUS_APART'];

        $outcome = ($showStatusFeeElement['TAX_FEE']*$showStatusFeeElement['STATUS_TAX_FEE'])
                    + ($showStatusFeeElement['TAX_DECLARE']*$showStatusFeeElement['STATUS_TAX_DECLARE'])
                    + ($showStatusFeeElement['TAX_MANAGEMENT']*$showStatusFeeElement['STATUS_TAX_MANAGEMENT'])
                    + ($showStatusFeeElement['REFUND_FOR_TENANT']*$showStatusFeeElement['STATUS_REFUND_FOR_TENANT'])
                    + ($showStatusFeeElement['CLEANING_FEE']*$showStatusFeeElement['STATUS_CLEANING_FEE']);

        $income = 0;

        if($check_status_apart == 'Collected'){
            $income = ($showStatusFeeElement['TAX_FEE']+$showStatusFeeElement['TAX_MANAGEMENT']
                      + $showStatusFeeElement['REFUND_FOR_TENANT'] 
                      + $showStatusFeeElement['CLEANING_FEE'])*$getDuration['PAYMENT_TERM']
                      + $showStatusFeeElement['TAX_DECLARE'];
        }

        $balance = $income - $outcome;

        $start_day_term = $getDuration['START_DAY_TERM'];
        $end_day_term = $getDuration['END_DAY_TERM'];
    }  

    if(isset($_GET['markDone'])){
        $markDone = $_GET['markDone'];
        if($markDone == 'STATUS_TAX_DECLARE'){
            if($showStatusFeeElement[$markDone]<1){
                $current_value = $showStatusFeeElement[$markDone] + 1;
                $update_finance_markdone = $financeDetails->update_finance($apartCode,$markDone,$current_value);
            }
        }
        else if($showStatusFeeElement[$markDone]<$getDuration['PAYMENT_TERM']){
            $current_value = $showStatusFeeElement[$markDone] + 1;
            $update_finance_markdone = $financeDetails->update_finance($apartCode,$markDone,$current_value);
        }
    }

    if(isset($_GET['reDo'])){
        $reDo = $_GET['reDo'];
        if($showStatusFeeElement[$reDo] > 0){
            $current_value = $showStatusFeeElement[$reDo] - 1;
            $update_finance_redo = $financeDetails->update_finance($apartCode,$reDo,$current_value);
        }
    }
?>
    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <span>FINANCE DETAILS</span>
            </div>
            <div class="profile">
                <i class="fas fa-chart-bar"></i>
                <img src="./Resource/img/profile-1.jpg">
            </div>
        </div>
            
        <h3 class="i-name">Apartment Code: <?php echo $apartCode; ?> | From: <?php echo $start_day_term;?> To: <?php echo $end_day_term;?> </h3>
        <div class="values">
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3><text class="num"><?php echo number_format($income); ?></text><sup>đ</sup></h3>
                    <span>Income</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3><text class="num"><?php echo number_format($outcome); ?></text><sup>đ</sup></h3>
                    <span>Outcome</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3><text class="num"><?php echo number_format($balance); ?></text><sup>đ</sup></h3>
                    <span>Balance</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-chart-bar"></i>
                <div>
                    <h3><text class="num"><?php echo $getDuration['PAYMENT_TERM'];?></text></h3>
                    <span>Months Period</span>
                </div>
            </div>
        </div>
        <div class="board">
            <table id="tbl_cart" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Fee Elements</th>
                        <th class="text-center">Values</th>
                        <th class="text-center">Number Of Paying</th>
                        <th class="text-center">Customize</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td class="role">
                            <p>Tax Fee</p>
                        </td>
                        <td class="role">
                            <p><?php echo number_format($showStatusFeeElement['TAX_FEE']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_FEE'];?></p>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&markDone=STATUS_TAX_FEE">Markdone</a>|<a onclick="return confirm('Do you want to redo ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&reDo=STATUS_TAX_FEE">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td class="role">
                            <p>Tax Declaration</p>
                        </td>
                        <td class="role">
                            <p><?php echo number_format($showStatusFeeElement['TAX_DECLARE']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_DECLARE'];?></p>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&markDone=STATUS_TAX_DECLARE">Markdone</a>|<a onclick="return confirm('Do you want to redo ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&reDo=STATUS_TAX_DECLARE">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3</td>
                        <td class="role">
                            <p>Tax Management</p>
                        </td>
                        <td class="role">
                            <p><?php echo number_format($showStatusFeeElement['TAX_MANAGEMENT']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_TAX_MANAGEMENT'];?></p>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&markDone=STATUS_TAX_MANAGEMENT">Markdone</a>|<a onclick="return confirm('Do you want to redo ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&reDo=STATUS_TAX_MANAGEMENT">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>4</td>
                        <td class="role">
                            <p>Refund For Tenant</p>
                        </td>
                        <td class="role">
                            <p><?php echo number_format($showStatusFeeElement['REFUND_FOR_TENANT']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_REFUND_FOR_TENANT'];?></p>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&markDone=STATUS_REFUND_FOR_TENANT">Markdone</a>|<a onclick="return confirm('Do you want to redo ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&reDo=STATUS_REFUND_FOR_TENANT">Redo</a>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>5</td>
                        <td class="role">
                            <p>Cleaning Fee</p>
                        </td>
                        <td class="role">
                            <p><?php echo number_format($showStatusFeeElement['CLEANING_FEE']);?><sup>đ</sup></p>
                        </td>
                        <td class="active">
                            <p><?php echo $showStatusFeeElement['STATUS_CLEANING_FEE'];?></p>
                        </td>
                        <td class="edit">
                            <a onclick="return confirm('Do you want to markdone ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&markDone=STATUS_CLEANING_FEE">Markdone</a>|<a onclick="return confirm('Do you want to redo ?')" href="financeApart.php?apartCode=<?php echo $apartCode ?>&reDo=STATUS_CLEANING_FEE">Redo</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php 
    include_once "Include/footer.php";
?>