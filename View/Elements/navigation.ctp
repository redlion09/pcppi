<div id="branding" class="box">
    <?php echo $this->Html->image('logo.png', array('alt'=>'Logo', 'height'=>'150px', 'id'=>'logo')); ?>
</div>
<div id="navigation" class="box">
    <ul>
        <li><?php echo $this->Html->link(__('Home', true), array('controller'=>'pages', 'action'=>'display', 'home'));?></li>
        <?php if($userInfo['group_id'] == ADMINISTRATOR): ?>
            <li><?php echo $this->Html->link(__('Master Files', true), array('controller'=>'users', 'action'=>'index'));?></li>
        <?php elseif($userInfo['group_id'] == ACCOUNTING || $userInfo['group_id'] == REGULAR): ?>
            <li><?php echo $this->Html->link(__('Expense', true), array('controller'=>'liquidations', 'action'=>'index'));?></li>
        <?php endif; ?>
        <li><?php echo $this->Html->link(__('Profile', true), array('controller'=>'users', 'action'=>'profile'));?></li>
        <li><?php echo $this->Html->link(__('Search', true), array('controller'=>'pages', 'action'=>'display', 'search'));?></li>
        <li><?php echo $this->Html->link(__('About', true), array('controller'=>'pages', 'action'=>'display', 'about'));?></li>
        <li><?php echo $this->Html->link(__('User Guide', true), array('controller'=>'pages', 'action'=>'display', 'guide'));?></li>
    </ul>
</div>