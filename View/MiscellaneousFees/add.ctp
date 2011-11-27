<div class="miscellaneousFees form">
<?php echo $this->Form->create('MiscellaneousFee');?>
	<fieldset>
		<legend><?php echo __('Add Miscellaneous Fee'); ?></legend>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('amount');
		echo $this->Form->input('report_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Miscellaneous Fees'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
