<div class="reports view">
<h2><?php  echo __('Report');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($report['Report']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Day'); ?></dt>
		<dd>
			<?php echo h($report['Report']['day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($report['Report']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Breakfast'); ?></dt>
		<dd>
			<?php echo h($report['Report']['breakfast']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lunch'); ?></dt>
		<dd>
			<?php echo h($report['Report']['lunch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dinner'); ?></dt>
		<dd>
			<?php echo h($report['Report']['dinner']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['User']['username'], array('controller' => 'users', 'action' => 'view', $report['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Liquidation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($report['Liquidation']['id'], array('controller' => 'liquidations', 'action' => 'view', $report['Liquidation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($report['Report']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($report['Report']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Report'), array('action' => 'edit', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Report'), array('action' => 'delete', $report['Report']['id']), null, __('Are you sure you want to delete # %s?', $report['Report']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Miscellaneous Fees');?></h3>
	<?php if (!empty($report['MiscellaneousFee'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Report Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($report['MiscellaneousFee'] as $miscellaneousFee): ?>
		<tr>
			<td><?php echo $miscellaneousFee['id'];?></td>
			<td><?php echo $miscellaneousFee['description'];?></td>
			<td><?php echo $miscellaneousFee['amount'];?></td>
			<td><?php echo $miscellaneousFee['report_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'miscellaneous_fees', 'action' => 'view', $miscellaneousFee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'miscellaneous_fees', 'action' => 'edit', $miscellaneousFee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'miscellaneous_fees', 'action' => 'delete', $miscellaneousFee['id']), null, __('Are you sure you want to delete # %s?', $miscellaneousFee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Miscellaneous Fee'), array('controller' => 'miscellaneous_fees', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transportations');?></h3>
	<?php if (!empty($report['Transportation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Report Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($report['Transportation'] as $transportation): ?>
		<tr>
			<td><?php echo $transportation['id'];?></td>
			<td><?php echo $transportation['description'];?></td>
			<td><?php echo $transportation['amount'];?></td>
			<td><?php echo $transportation['report_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transportations', 'action' => 'view', $transportation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transportations', 'action' => 'edit', $transportation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transportations', 'action' => 'delete', $transportation['id']), null, __('Are you sure you want to delete # %s?', $transportation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transportation'), array('controller' => 'transportations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
