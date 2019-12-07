<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TemporalUse $temporalUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Temporal Uses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="temporalUses form large-9 medium-8 columns content">
    <?= $this->Form->create($temporalUse) ?>
    <fieldset>
        <legend><?= __('Add Temporal Use') ?></legend>
        <?php
            echo $this->Form->control('tables_id', ['options' => $tables]);
            echo $this->Form->control('status');
            echo $this->Form->control('date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
