<div class="announcementsTags view">
<h2><?php  echo __('Announcements Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($announcementsTag['AnnouncementsTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Announcement'); ?></dt>
		<dd>
			<?php echo $this->Html->link($announcementsTag['Announcement']['title'], array('controller' => 'announcements', 'action' => 'view', $announcementsTag['Announcement']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($announcementsTag['Tag']['tag'], array('controller' => 'tags', 'action' => 'view', $announcementsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Announcements Tag'), array('action' => 'edit', $announcementsTag['AnnouncementsTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Announcements Tag'), array('action' => 'delete', $announcementsTag['AnnouncementsTag']['id']), null, __('Are you sure you want to delete # %s?', $announcementsTag['AnnouncementsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Announcements Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announcements Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Announcements'), array('controller' => 'announcements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Announcement'), array('controller' => 'announcements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
