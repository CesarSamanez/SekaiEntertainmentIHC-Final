<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaUse $timbaUse
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timba Use'), ['action' => 'edit', $timbaUse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timba Use'), ['action' => 'delete', $timbaUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaUse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timba Uses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timba Use'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timbaUses view large-9 medium-8 columns content">
    <h3><?= h($timbaUse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $timbaUse->has('user') ? $this->Html->link($timbaUse->user->name, ['controller' => 'Users', 'action' => 'view', $timbaUse->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timbaUse->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Timbas Id') ?></th>
            <td><?= $this->Number->format($timbaUse->timbas_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('People') ?></th>
            <td><?= $this->Number->format($timbaUse->people) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($timbaUse->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time') ?></th>
            <td><?= h($timbaUse->time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Initial Date') ?></th>
            <td><?= h($timbaUse->initial_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Final Date') ?></th>
            <td><?= h($timbaUse->final_date) ?></td>
        </tr>
    </table>
</div>
