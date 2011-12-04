<div class="liquidations">
    <?php  
        $status = ($liquidation['Liquidation']['isAccepted'] == null) ? 'Pending' : (($liquidation['Liquidation']['isAccepted'] == '0') ? 'Disapproved' : 'Approved');
    ?>
    <fieldset>
        <legend><?php echo $status;?></legend>
        <div id="actions">
            <?php 
                echo $this->Form->create('Liquidation');
                echo $this->Form->input('Liquidation.id', array('type'=>'hidden', 'value'=>$liquidation['Liquidation']['id']));
                echo $this->Form->input('Liquidation.isApproved', array('type'=>'hidden', 'value'=>1));
                echo $this->Form->end('Approve', array('div'=>false, 'class'=>'action approve', 'id'=>'ApproveLiquidation')); 
            ?>
            <?php 
                echo $this->Form->create('Liquidation');
                echo $this->Form->input('Liquidation.id', array('type'=>'hidden', 'value'=>$liquidation['Liquidation']['id']));
                echo $this->Form->input('Liquidation.isApproved', array('type'=>'hidden', 'value'=>0));
                echo $this->Form->end('Disapprove', array('div'=>false,'class'=>'action disapprove', 'id'=>'DisapproveLiquidation')); 
            ?>
        </div>
        <table>
            <tr>
                <td>Name: <?php echo sprintf("%s %s %s", $userInfo['first_name'], $userInfo['middle_name'], $userInfo['last_name']); ?></td>
                <td>Department: <?php echo $liquidation['User']['Department']['department']; ?></td>
                <td>Destination: <?php echo $liquidation['Location']['location']; ?></td>
                <td>Region: <?php echo $liquidation['Location']['region']; ?></td>
            </tr>
            <tr>
                <td>Position: <?php echo $liquidation['User']['Position']['position']; ?></td>
                <td>Job Class: <?php echo $liquidation['User']['Position']['class']; ?></td>
                <td>Destination Class: <?php echo $liquidation['Location']['class']; ?></td>
                <td>Lodging: <?php echo $liquidation['Liquidation']['lodging']; ?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Date</th>
                <th>Basic Expenses</th>
                <th>Amount</th>
                <th>Travel Expenses</th>
                <th>Amount</th>
                <th>Miscellaneous</th>
                <th>Amount</th>
            </tr>
            <?php for($i = 0; $i < count($liquidation['Report']); $i++){ ?>
                <tr>
                    <td rowspan ="5<?php 
//                    $length = (count($liquidation['Report'][$i]['Transportation']) > count($liquidation['Report'][$i]['MiscellaneousFee'])) ? ((count($liquidation['Report'][$i]['Transportation']) > 3) ? count($liquidation['Report'][$i]['Transportation']) : 3) : ((count($liquidation['Report'][$i]['MiscellaneousFee']) > 3) ? count($liquidation['Report'][$i]['MiscellaneousFee']) : 3);
//                      echo $length;
                    ?>"><?php echo date('F j, Y', strtotime($liquidation['Report'][$i]['date'])); ?></td>
                    <td>Breakfast</td>
                    <td><?php echo $liquidation['Report'][$i]['breakfast']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][0])) echo $liquidation['Report'][$i]['Transportation'][0]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][0])) echo $liquidation['Report'][$i]['Transportation'][0]['amount']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][0])) echo $liquidation['Report'][$i]['MiscellaneousFee'][0]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][0])) echo $liquidation['Report'][$i]['MiscellaneousFee'][0]['amount']; ?></td>
                </tr>
                <tr>
                    <td>Lunch</td>
                    <td><?php echo $liquidation['Report'][$i]['lunch']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][1])) echo $liquidation['Report'][$i]['Transportation'][1]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][1])) echo $liquidation['Report'][$i]['Transportation'][1]['amount']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][1])) echo $liquidation['Report'][$i]['MiscellaneousFee'][1]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][1])) echo $liquidation['Report'][$i]['MiscellaneousFee'][1]['amount']; ?></td>
                </tr>
                <tr>
                    <td>Dinner</td>
                    <td><?php echo $liquidation['Report'][$i]['dinner']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][2])) echo $liquidation['Report'][$i]['Transportation'][2]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][2])) echo $liquidation['Report'][$i]['Transportation'][2]['amount']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][2])) echo $liquidation['Report'][$i]['MiscellaneousFee'][2]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][2])) echo $liquidation['Report'][$i]['MiscellaneousFee'][2]['amount']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][3])) echo $liquidation['Report'][$i]['Transportation'][3]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][3])) echo $liquidation['Report'][$i]['Transportation'][3]['amount']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][3])) echo $liquidation['Report'][$i]['MiscellaneousFee'][3]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][3])) echo $liquidation['Report'][$i]['MiscellaneousFee'][3]['amount']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][4])) echo $liquidation['Report'][$i]['Transportation'][4]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['Transportation'][4])) echo $liquidation['Report'][$i]['Transportation'][4]['amount']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][4])) echo $liquidation['Report'][$i]['MiscellaneousFee'][4]['description']; ?></td>
                    <td><?php if(!empty ($liquidation['Report'][$i]['MiscellaneousFee'][4])) echo $liquidation['Report'][$i]['MiscellaneousFee'][4]['amount']; ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td>Total Expense:</td>
                    <td colspan ="6"><?php echo $liquidation['Liquidation']['total'];?></td>
                </tr>
        </table>
    </fieldset>
</div>