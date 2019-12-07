<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaTemporalUse $timbaTemporalUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Timba Temporal Uses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Timbas'), ['controller' => 'Timbas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timba'), ['controller' => 'Timbas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timbaTemporalUses form large-9 medium-8 columns content">
    <?= $this->Form->create($timbaTemporalUse) ?>
    <fieldset>
        <legend><?= __('Add Timba Temporal Use') ?></legend>
        <?php
            echo $this->Form->control('timbas_id');
            echo $this->Form->control('status');
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
