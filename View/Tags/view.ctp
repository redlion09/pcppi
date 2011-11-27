<div class="tags view">
<h2><?php  echo __('Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['tag']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Announcements'), array('controller' => 'announcements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announcement'), array('controller' => 'announcements', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Announcements');?></h3>
	<?php if (!empty($tag['Announcement'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Announcement'] as $announcement): ?>
		<tr>
			<td><?php echo $announcement['id'];?></td>
			<td><?php echo $announcement['title'];?></td>
			<td><?php echo $announcement['content'];?></td>
			<td><?php echo $announcement['created'];?></td>
			<td><?php echo $announcement['modified'];?></td>
			<td><?php echo $announcement['user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'announcements', 'action' => 'view', $announcement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'announcements', 'action' => 'edit', $announcement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'announcements', 'action' => 'delete', $announcement['id']), null, __('Are you sure you want to delete # %s?', $announcement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Announcement'), array('controller' => 'announcements', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
