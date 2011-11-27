<div class="miscellaneousFees form">
<?php echo $this->Form->create('MiscellaneousFee');?>
	<fieldset>
		<legend><?php echo __('Edit Miscellaneous Fee'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MiscellaneousFee.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MiscellaneousFee.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Miscellaneous Fees'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
