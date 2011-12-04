<?php
    $count = $this->Session->read("Report.date.count");
?>
<script>
    $(document).ready(function(){
        var count = <?php echo $count;?>;
        var counter =  new Array(count);
        for(i = 0; i < count; i++){
            counter[i] = new Array(0, 0);
        }
        var dayCount = 0;
        
        $('.panel').hide();
        $('.remove').attr('disabled', true);
        
        $('.flip').click(function(){
            var attributes = $(this).attr('class');
            attributes = attributes.split(' ');
            $('.panel').slideUp();
            $('#Report' + attributes[2]).slideDown();
            $('.flip').attr('disabled', false);
            $('.flip').removeClass('disabled');
            $(this).attr('disabled', true);
            $(this).addClass('disabled');
            dayCount = attributes[3];
        });
    
        $('.add').click(function(){
            var attributes = $(this).attr('class').split(' ');
//            var id = attributes[1].charAt(0).toUpperCase() + attributes[1].slice(1);
            var selection = attributes[1].charAt(0).toUpperCase() + attributes[1].slice(1);
            var tableID = (selection == 'Transportation') ? selection + 'Fees' : selection+'s';
            var day = attributes[3];
            var option = (selection == 'Transportation') ? 0 : 1;
            var value = 0;

            $('#' + day + tableID + ' tr:last').after('<tr><td><input name="data['+selection+']['+dayCount+']['+counter[dayCount][option]+'][description]" type="text" maxlength="100" id="'+selection + dayCount + counter[dayCount][option]+'Description"></td><td><input name="data['+selection+']['+dayCount+']['+counter[dayCount][option]+'][amount]" type="number" maxlength="8" id="'+selection + dayCount + counter[dayCount][option]+'Amount"></td</tr>');
            counter[dayCount][option]++;
            value = counter[dayCount][option];
            if(value > 0){
                $('#' + day + 'Remove' + selection).attr('disabled', false);
                $('#' + day + 'Remove' + selection).removeClass('disabled');
            }
        });
        
        $('.remove').click(function(){
            var attributes = $(this).attr('class').split(' ');
            var selection = attributes[1].charAt(0).toUpperCase() + attributes[1].slice(1);
            var tableID = (selection == 'Transportation') ? selection + 'Fees' : selection+'s';
//            var tableID = selection + 'Fees';
            var day = attributes[3];
            var option = (selection == 'Transportation') ? 0 : 1;
            var value = 0;
            
            $('#' + day + tableID + ' tr:last').remove();
            counter[dayCount][option]--;
            value = counter[dayCount][option];
            if(value == 0){
                $('#' + day + 'Remove' + selection).attr('disabled', true);
                $('#' + day + 'Remove' + selection).addClass('disabled');
            }
        });
    });
</script>
<div class="liquidations">
<?php echo $this->Form->create('Liquidation');?>
	<fieldset>
		<legend><?php __('Generate Report'); ?></legend>
	<?php
//		echo $this->Form->input('user_id', array('type'=>'hidden'));
//		echo $this->Form->input('total');
//		echo $this->Form->input('isAccepted');
       ?>
        <table>
            <tr>
        <?php
		echo '<td>'. $this->Form->input('lodging', array('type'=>'checkbox')) .'</td>';
		echo '<td style="float: right;">'. $this->Form->input('location_id', array('empty'=>'Select Location', 'label' => false)) .'</td>';
        ?>
            </tr>
        </table>
        <table>
            <tr>
        <?php
                for($i = 0; $i<$count; $i++){
                    echo '<td>' . $this->Form->submit($this->Session->read("Report.$i.date"), array('type'=>'button', 'class'=>'action flip ' .date("l", strtotime($this->Session->read("Report.$i.date"))). ' ' . $i)) .'</td>';
                }
	?>
            </tr>
        </table>
        <?php for($i = 0; $i < $count; $i++){ ?>
        <?php  $day = date("l", strtotime($this->Session->read("Report.$i.date"))); ?>
        <div id="Report<?php echo $day; ?>" class="panel <?php echo $day; ?>">
            <fieldset>
                <legend><?php __($day); ?></legend>
                <table>
                    <tr>
                    <?php
                        echo '<td>' . $this->Form->input("Report.$i.breakfast", array('type'=>'checkbox')) .'</td>';
                        echo '<td>' . $this->Form->input("Report.$i.lunch", array('type'=>'checkbox')) .'</td>';
                        echo '<td>' . $this->Form->input("Report.$i.dinner", array('type'=>'checkbox')) .'</td>';
                        /**
                         * There's a bug here. I'm just sleepy.
                         */
                        echo $this->Form->input("Report.$i.date", array('type'=>'hidden', 'value'=>date('Y-m-d', strtotime($this->Session->read("Report.$i.date")))));
                        echo $this->Form->input("Report.$i.day", array('type'=>'hidden', 'value'=>$day));
                        echo $this->Form->input("Report.$i.user_id", array('type'=>'hidden', 'value'=>$userInfo['id']));
                    ?>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <fieldset class="fees">
                                <legend><?php __('Transportation Fees'); ?></legend>
                                <table>
                                    <tr>
                                        <td><?php echo $this->Form->submit('Add', array('type'=>'button', 'id'=>$day ."AddTransportation", 'class'=>"action transportation add $day")); ?></td>
                                        <td><?php echo $this->Form->submit('Remove', array('type'=>'button', 'id'=>$day.'RemoveTransportation', 'class'=>"action transportation remove $day disabled")); ?></td>
                                    </tr>
                                </table>
                                <table id="<?php echo $day; ?>TransportationFees">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                        <td colspan="2"  >
                            <fieldset class="fees">
                                <legend><?php __('Miscellaneous Fees'); ?></legend>
                                <table>
                                    <tr>
                                        <td><?php echo $this->Form->submit('Add', array('type'=>'button', 'id'=>$day."AddMiscellaneousFee", 'class'=>"action miscellaneousFee add $day")); ?></td>
                                        <td><?php echo $this->Form->submit('Remove', array('type'=>'button', 'id'=>$day.'RemoveMiscellaneousFee', 'class'=>"action miscellaneousFee remove $day disabled")); ?></td>
                                    </tr>
                                </table>
                                <table id="<?php echo $day; ?>MiscellaneousFees">
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                    </tr>
                                </table>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <?php } ?>
	</fieldset>
    <table>
        <tr>
            <td><?php echo $this->Form->submit(__('Back', true), array('class'=>'back' ,'type'=>'button', 'onclick'=>'location.href="date"'));?></td>
            <td id="submit"><?php echo $this->Form->end(__('Submit', true), array('id'=>'LiquidationSubmit'));?></td>
        </tr>
    </table>
</div>
