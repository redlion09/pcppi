<div class="liquidations index">
	<h2><?php echo __('Liquidations');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('lodging');?></th>
			<th><?php echo $this->Paginator->sort('total');?></th>
			<th><?php echo $this->Paginator->sort('isAccepted');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($liquidations as $liquidation): ?>
	<tr>
		<td><?php echo h($liquidation['Liquidation']['id']); ?>&nbsp;</td>
		<td><?php echo h($liquidation['Liquidation']['lodging']); ?>&nbsp;</td>
		<td><?php echo h($liquidation['Liquidation']['total']); ?>&nbsp;</td>
		<td><?php echo h($liquidation['Liquidation']['isAccepted']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($liquidation['User']['username'], array('controller' => 'users', 'action' => 'view', $liquidation['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($liquidation['Location']['location'], array('controller' => 'locations', 'action' => 'view', $liquidation['Location']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $liquidation['Liquidation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $liquidation['Liquidation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $liquidation['Liquidation']['id']), null, __('Are you sure you want to delete # %s?', $liquidation['Liquidation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Liquidation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
