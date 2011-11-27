<div class="miscellaneousFees view">
<h2><?php  echo __('Miscellaneous Fee');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($miscellaneousFee['MiscellaneousFee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($miscellaneousFee['MiscellaneousFee']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($miscellaneousFee['MiscellaneousFee']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Report'); ?></dt>
		<dd>
			<?php echo $this->Html->link($miscellaneousFee['Report']['id'], array('controller' => 'reports', 'action' => 'view', $miscellaneousFee['Report']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Miscellaneous Fee'), array('action' => 'edit', $miscellaneousFee['MiscellaneousFee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Miscellaneous Fee'), array('action' => 'delete', $miscellaneousFee['MiscellaneousFee']['id']), null, __('Are you sure you want to delete # %s?', $miscellaneousFee['MiscellaneousFee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Miscellaneous Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Miscellaneous Fee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reports'), array('controller' => 'reports', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Report'), array('controller' => 'reports', 'action' => 'add')); ?> </li>
	</ul>
</div>
