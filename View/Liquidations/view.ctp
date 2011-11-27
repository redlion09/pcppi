<div class="liquidations view">
<h2><?php  echo __('Liquidation');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($liquidation['Liquidation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lodging'); ?></dt>
		<dd>
			<?php echo h($liquidation['Liquidation']['lodging']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($liquidation['Liquidation']['total']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsAccepted'); ?></dt>
		<dd>
			<?php echo h($liquidation['Liquidation']['isAccepted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($liquidation['User']['username'], array('controller' => 'users', 'action' => 'view', $liquidation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($liquidation['Location']['location'], array('controller' => 'locations', 'action' => 'view', $liquidation['Location']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Liquidation'), array('action' => 'edit', $liquidation['Liquidation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Liquidation'), array('action' => 'delete', $liquidation['Liquidation']['id']), null, __('Are you sure you want to delete # %s?', $liquidation['Liquidation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Liquidations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liquidation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Reports');?></h3>
	<?php if (!empty($liquidation['Report'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Day'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Breakfast'); ?></th>
		<th><?php echo __('Lunch'); ?></th>
		<th><?php echo __('Dinner'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Liquidation Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($liquidation['Report'] as $report): ?>
		<tr>
			<td><?php echo $report['id'];?></td>
			<td><?php echo $report['day'];?></td>
			<td><?php echo $report['date'];?></td>
			<td><?php echo $report['breakfast'];?></td>
			<td><?php echo $report['lunch'];?></td>
			<td><?php echo $report['dinner'];?></td>
			<td><?php echo $report['user_id'];?></td>
			<td><?php echo $report['liquidation_id'];?></td>
			<td><?php echo $report['created'];?></td>
			<td><?php echo $report['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reports', 'action' => 'view', $report['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reports', 'action' => 'edit', $report['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reports', 'action' => 'delete', $report['id']), null, __('Are you sure you want to delete # %s?', $report['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
