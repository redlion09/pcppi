<div class="groups view">
<h2><?php  echo __('Group');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo h($group['Group']['group']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group'), array('action' => 'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notifications'), array('controller' => 'notifications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notification'), array('controller' => 'notifications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Notifications');?></h3>
	<?php if (!empty($group['Notification'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Notification'] as $notification): ?>
		<tr>
			<td><?php echo $notification['id'];?></td>
			<td><?php echo $notification['created'];?></td>
			<td><?php echo $notification['user_id'];?></td>
			<td><?php echo $notification['group_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'notifications', 'action' => 'view', $notification['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'notifications', 'action' => 'edit', $notification['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'notifications', 'action' => 'delete', $notification['id']), null, __('Are you sure you want to delete # %s?', $notification['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Notification'), array('controller' => 'notifications', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users');?></h3>
	<?php if (!empty($group['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Middle Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Home'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Position Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Dirname'); ?></th>
		<th><?php echo __('Basename'); ?></th>
		<th><?php echo __('Checksum'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['first_name'];?></td>
			<td><?php echo $user['middle_name'];?></td>
			<td><?php echo $user['last_name'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['address'];?></td>
			<td><?php echo $user['city'];?></td>
			<td><?php echo $user['mobile'];?></td>
			<td><?php echo $user['home'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['position_id'];?></td>
			<td><?php echo $user['department_id'];?></td>
			<td><?php echo $user['group_id'];?></td>
			<td><?php echo $user['file'];?></td>
			<td><?php echo $user['dirname'];?></td>
			<td><?php echo $user['basename'];?></td>
			<td><?php echo $user['checksum'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
