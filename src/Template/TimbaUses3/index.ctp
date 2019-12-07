<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaUse[]|\Cake\Collection\CollectionInterface $timbaUses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timba Use'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timbaUses index large-9 medium-8 columns content">
    <h3><?= __('Timba Uses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timbas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('people') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('initial_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('final_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timbaUses as $timbaUse): ?>
            <tr>
                <td><?= $this->Number->format($timbaUse->id) ?></td>
                <td><?= $this->Number->format($timbaUse->timbas_id) ?></td>
                <td><?= $timbaUse->has('user') ? $this->Html->link($timbaUse->user->name, ['controller' => 'Users', 'action' => 'view', $timbaUse->user->id]) : '' ?></td>
                <td><?= $this->Number->format($timbaUse->people) ?></td>
                <td><?= h($timbaUse->time) ?></td>
                <td><?= $this->Number->format($timbaUse->total) ?></td>
                <td><?= h($timbaUse->initial_date) ?></td>
                <td><?= h($timbaUse->final_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timbaUse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timbaUse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timbaUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaUse->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
