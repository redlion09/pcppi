<script>
    $(document).ready(function(){
        var count = <?php echo count($this->data['Report']);?>;
        var counter =  new Array(count);
        var i = 0;
        <?php for($i = 0;  $i < count($this->data['Report']); $i++): ?>
            counter[i] = new Array(<?php echo count($this->data['Report'][$i]['Transportation']); ?>, <?php echo count($this->data['Report'][$i]['MiscellaneousFee']); ?>);
            i++;
        <?php endfor; ?>
        
        var dayCount = 0;
        
        $('.panel').hide();
        
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
		<legend><?php __('Edit Liquidation'); ?></legend>
                <table>
                    <tr>
                        <?php 
                            $liquidation = ($this->data['Liquidation']['lodging'] > 0) ?  true : false;
                        ?>
                        <?php echo $this->Form->input('Liquidation.id'); ?>
                        <td><?php echo $this->Form->input('lodging', array('type'=>'checkbox', 'value'=>1, 'checked'=>$liquidation)); ?></td>
                        <td style="float: right;"><?php echo $this->Form->input('location_id', array('empty'=>'Select Location', 'label' => false)); ?></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <?php for($i = 0; $i < count($this->data['Report']); $i++): ?>
                        <td><?php echo $this->Form->submit(date('F j, Y', strtotime($this->data['Report'][$i]['date'])), array('type'=>'button', 'class'=>'action flip ' . date('l', strtotime($this->data['Report'][$i]['date'])) . ' ' . $i)); ?></td>
                        <?php endfor;?>
                    </tr>
                </table>
                <?php 
                    for($i = 0; $i < count($this->data['Report']); $i++):
                        $day = date('l', strtotime($this->data['Report'][$i]['date']));
                        $generalExpense = array();
                        $generalExpense[0] = ($this->data['Report'][$i]['breakfast'] > 0) ?  true : false;
                        $generalExpense[1] = ($this->data['Report'][$i]['lunch']  > 0) ? true : false;
                        $generalExpense[2] = ($this->data['Report'][$i]['dinner'] >  0) ? true : false;
                        $transportationButton = array();
                        $transportationButton[0] = (!empty($this->data['Report'][$i]['Transportation'])) ? '' : 'disabled';
                        $transportationButton[1] = (!empty($this->data['Report'][$i]['Transportation'])) ? true : false;
                        $miscellaneousButton = array();
                        $miscellaneousButton[0] = (!empty($this->data['Report'][$i]['MiscellaneousFee'])) ? '' : 'disabled';
                        $miscellaneousButton[1] = (!empty($this->data['Report'][$i]['MiscellaneousFee'])) ? true : false;
                ?>
                <div id="Report<?php echo $day; ?>" class="panel <?php echo $day; ?>">
                    <fieldset>
                        <legend><?php __($day); ?></legend>
                        <table>
                            <tr>
                            <?php
                                echo  $this->Form->input("Report.$i.id", array('type'=>'hidden'));
                                echo '<td>' . $this->Form->input("Report.$i.breakfast", array('type'=>'checkbox', 'value'=>1, 'checked'=>$generalExpense[0])) .'</td>';
                                echo '<td>' . $this->Form->input("Report.$i.lunch", array('type'=>'checkbox', 'value'=>1, 'checked'=>$generalExpense[1])) .'</td>';
                                echo '<td>' . $this->Form->input("Report.$i.dinner", array('type'=>'checkbox', 'value'=>1, 'checked'=>$generalExpense[2])) .'</td>';
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
                                                <td><?php echo $this->Form->submit('Remove', array('type'=>'button', 'id'=>$day.'RemoveTransportation', 'class'=>"action transportation remove $day $transportationButton[0]", $transportationButton[0])); ?></td>
                                            </tr>
                                        </table>
                                        <table id="<?php echo $day; ?>TransportationFees">
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                            <?php 
                                                if(!empty($this->data['Report'][$i]['Transportation'])):
                                                    for($j = 0; $j < count($this->data['Report'][$i]['Transportation']); $j++):
                                            ?>
                                            <tr>
                                                <?php echo $this->Form->input("Transportation.$i.$j.id", array('type'=>'hidden', 'value'=>$this->data['Report'][$i]['Transportation'][$j]['id'])); ?>
                                                <td><?php echo $this->Form->input("Transportation.$i.$j.description", array('div'=>false, 'label'=>false, 'value'=>$this->data['Report'][$i]['Transportation'][$j]['description'])); ?></td>
                                                <td><?php echo $this->Form->input("Transportation.$i.$j.amount", array('div'=>false, 'label'=>false, 'value'=>$this->data['Report'][$i]['Transportation'][$j]['amount'], 'disabled'=>false)); ?></td>
                                            </tr>
                                            <?php 
                                                    endfor;
                                                endif; 
                                            ?>
                                        </table>
                                    </fieldset>
                                </td>
                                <td colspan="2"  >
                                    <fieldset class="fees">
                                        <legend><?php __('Miscellaneous Fees'); ?></legend>
                                        <table>
                                            <tr>
                                                <td><?php echo $this->Form->submit('Add', array('type'=>'button', 'id'=>$day."AddMiscellaneousFee", 'class'=>"action miscellaneousFee add $day")); ?></td>
                                                <td><?php echo $this->Form->submit('Remove', array('type'=>'button', 'id'=>$day.'RemoveMiscellaneousFee', 'class'=>"action miscellaneousFee remove $day $miscellaneousButton[0]", $miscellaneousButton[0])); ?></td>
                                            </tr>
                                        </table>
                                        <table id="<?php echo $day; ?>MiscellaneousFees">
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount</th>
                                            </tr>
                                            <?php 
                                                if(!empty($this->data['Report'][$i]['MiscellaneousFee'])):
                                                    for($j = 0; $j < count($this->data['Report'][$i]['MiscellaneousFee']); $j++):
                                            ?>
                                            <tr>
                                                <?php echo $this->Form->input("MiscellaneousFee.$i.$j.id", array('type'=>'hidden', 'value'=>$this->data['Report'][$i]['MiscellaneousFee'][$j]['id'])); ?>
                                                <td><?php echo $this->Form->input("MiscellaneousFee.$i.$j.description", array('div'=>false, 'label'=>false, 'value'=>$this->data['Report'][$i]['MiscellaneousFee'][$j]['description'])); ?></td>
                                                <td><?php echo $this->Form->input("MiscellaneousFee.$i.$j.amount", array('div'=>false, 'label'=>false, 'value'=>$this->data['Report'][$i]['MiscellaneousFee'][$j]['amount'])); ?></td>
                                            </tr>
                                            <?php 
                                                    endfor;
                                                endif; 
                                            ?>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <?php endfor;?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>