<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaUse $timbaUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Timba Uses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timbaUses form large-9 medium-8 columns content">
    <?= $this->Form->create($timbaUse) ?>
    <fieldset>
        <legend><?= __('Add Timba Use') ?></legend>
        <?php
            echo $this->Form->control('timbas_id');
            echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('people');
            echo $this->Form->control('time');
            echo $this->Form->control('total');
            echo $this->Form->control('initial_date');
            echo $this->Form->control('final_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
