<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaTemporalUse $timbaTemporalUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timba Temporal Use'), ['action' => 'edit', $timbaTemporalUse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timba Temporal Use'), ['action' => 'delete', $timbaTemporalUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaTemporalUse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timba Temporal Uses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timba Temporal Use'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timbas'), ['controller' => 'Timbas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timba'), ['controller' => 'Timbas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timbaTemporalUses view large-9 medium-8 columns content">
    <h3><?= h($timbaTemporalUse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timbaTemporalUse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timbas Id') ?></th>
            <td><?= $this->Number->format($timbaTemporalUse->timbas_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($timbaTemporalUse->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $timbaTemporalUse->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
