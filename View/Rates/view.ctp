<div class="rates view">
<h2><?php  echo __('Rate');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expense'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['expense']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location Class'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['location_class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position Class'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['position_class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($rate['Rate']['rate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rate'), array('action' => 'edit', $rate['Rate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rate'), array('action' => 'delete', $rate['Rate']['id']), null, __('Are you sure you want to delete # %s?', $rate['Rate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rate'), array('action' => 'add')); ?> </li>
	</ul>
</div>
