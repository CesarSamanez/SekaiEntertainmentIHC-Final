<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timba $timba
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timba'), ['action' => 'edit', $timba->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timba'), ['action' => 'delete', $timba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timba->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timbas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timba'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timbas view large-9 medium-8 columns content">
    <h3><?= h($timba->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($timba->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Uses') ?></th>
            <td><?= $this->Number->format($timba->total_uses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($timba->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $timba->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
