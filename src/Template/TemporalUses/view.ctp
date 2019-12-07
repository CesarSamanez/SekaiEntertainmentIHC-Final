<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TemporalUse $temporalUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Temporal Use'), ['action' => 'edit', $temporalUse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Temporal Use'), ['action' => 'delete', $temporalUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $temporalUse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Temporal Uses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Temporal Use'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tables'), ['controller' => 'Tables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Table'), ['controller' => 'Tables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="temporalUses view large-9 medium-8 columns content">
    <h3><?= h($temporalUse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Table') ?></th>
            <td><?= $temporalUse->has('table') ? $this->Html->link($temporalUse->table->id, ['controller' => 'Tables', 'action' => 'view', $temporalUse->table->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($temporalUse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($temporalUse->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $temporalUse->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
