<div class="locations view">
<h2><?php  echo __('Location');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($location['Location']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($location['Location']['class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo h($location['Location']['region']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Liquidations'), array('controller' => 'liquidations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Liquidation'), array('controller' => 'liquidations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Liquidations');?></h3>
	<?php if (!empty($location['Liquidation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Lodging'); ?></th>
		<th><?php echo __('Total'); ?></th>
		<th><?php echo __('IsAccepted'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($location['Liquidation'] as $liquidation): ?>
		<tr>
			<td><?php echo $liquidation['id'];?></td>
			<td><?php echo $liquidation['lodging'];?></td>
			<td><?php echo $liquidation['total'];?></td>
			<td><?php echo $liquidation['isAccepted'];?></td>
			<td><?php echo $liquidation['user_id'];?></td>
			<td><?php echo $liquidation['location_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'liquidations', 'action' => 'view', $liquidation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'liquidations', 'action' => 'edit', $liquidation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'liquidations', 'action' => 'delete', $liquidation['id']), null, __('Are you sure you want to delete # %s?', $liquidation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Liquidation'), array('controller' => 'liquidations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
