<div class="reports index">
	<h2><?php echo __('Reports');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('day');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('breakfast');?></th>
			<th><?php echo $this->Paginator->sort('lunch');?></th>
			<th><?php echo $this->Paginator->sort('dinner');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('liquidation_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($reports as $report): ?>
	<tr>
		<td><?php echo h($report['Report']['id']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['day']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['date']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['breakfast']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['lunch']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['dinner']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($report['User']['username'], array('controller' => 'users', 'action' => 'view', $report['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($report['Liquidation']['id'], array('controller' => 'liquidations', 'action' => 'view', $report['Liquidation']['id'])); ?>
		</td>
		<td><?php echo h($report['Report']['created']); ?>&nbsp;</td>
		<td><?php echo h($report['Report']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $report['Report']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $report['Report']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $report['Report']['id']), null, __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Liquidations'), array('controller' => 'liquidations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liquidation'), array('controller' => 'liquidations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Miscellaneous Fees'), array('controller' => 'miscellaneous_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Miscellaneous Fee'), array('controller' => 'miscellaneous_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transportations'), array('controller' => 'transportations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transportation'), array('controller' => 'transportations', 'action' => 'add')); ?> </li>
	</ul>
</div>
