<div class="transportations view">
<h2><?php  echo __('Transportation');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transportation['Transportation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($transportation['Transportation']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($transportation['Transportation']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Report'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transportation['Report']['id'], array('controller' => 'reports', 'action' => 'view', $transportation['Report']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transportation'), array('action' => 'edit', $transportation['Transportation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transportation'), array('action' => 'delete', $transportation['Transportation']['id']), null, __('Are you sure you want to delete # %s?', $transportation['Transportation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transportations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transportation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
