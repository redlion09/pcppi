<div class="locations form">
<?php echo $this->Form->create('Location');?>
	<fieldset>
		<legend><?php echo __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('location');
		echo $this->Form->input('class');
		echo $this->Form->input('region');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Liquidations'), array('controller' => 'liquidations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liquidation'), array('controller' => 'liquidations', 'action' => 'add')); ?> </li>
	</ul>
</div>
