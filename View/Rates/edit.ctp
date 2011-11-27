<div class="rates form">
<?php echo $this->Form->create('Rate');?>
	<fieldset>
		<legend><?php echo __('Edit Rate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('expense');
		echo $this->Form->input('location_class');
		echo $this->Form->input('position_class');
		echo $this->Form->input('rate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rates'), array('action' => 'index'));?></li>
	</ul>
</div>
