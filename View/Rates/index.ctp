<div class="rates index">
	<h2><?php echo __('Rates');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('expense');?></th>
			<th><?php echo $this->Paginator->sort('location_class');?></th>
			<th><?php echo $this->Paginator->sort('position_class');?></th>
			<th><?php echo $this->Paginator->sort('rate');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rates as $rate): ?>
	<tr>
		<td><?php echo h($rate['Rate']['id']); ?>&nbsp;</td>
		<td><?php echo h($rate['Rate']['expense']); ?>&nbsp;</td>
		<td><?php echo h($rate['Rate']['location_class']); ?>&nbsp;</td>
		<td><?php echo h($rate['Rate']['position_class']); ?>&nbsp;</td>
		<td><?php echo h($rate['Rate']['rate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rate['Rate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rate['Rate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rate['Rate']['id']), null, __('Are you sure you want to delete # %s?', $rate['Rate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rate'), array('action' => 'add')); ?></li>
	</ul>
</div>
