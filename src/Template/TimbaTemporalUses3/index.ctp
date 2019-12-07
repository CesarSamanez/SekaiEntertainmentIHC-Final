<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaTemporalUse[]|\Cake\Collection\CollectionInterface $timbaTemporalUses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timba Temporal Use'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timbas'), ['controller' => 'Timbas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timba'), ['controller' => 'Timbas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timbaTemporalUses index large-9 medium-8 columns content">
    <h3><?= __('Timba Temporal Uses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('timbas_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timbaTemporalUses as $timbaTemporalUse): ?>
            <tr>
                <td><?= $this->Number->format($timbaTemporalUse->id) ?></td>
                <td><?= $this->Number->format($timbaTemporalUse->timbas_id) ?></td>
                <td><?= h($timbaTemporalUse->status) ?></td>
                <td><?= h($timbaTemporalUse->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timbaTemporalUse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timbaTemporalUse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timbaTemporalUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaTemporalUse->id)]) ?>
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
