<div class="transportations form">
<?php echo $this->Form->create('Transportation');?>
	<fieldset>
		<legend><?php echo __('Edit Transportation'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transportation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Transportation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transportations'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
