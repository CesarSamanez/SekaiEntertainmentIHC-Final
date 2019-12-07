<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timba[]|\Cake\Collection\CollectionInterface $timbas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timba'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timbas index large-9 medium-8 columns content">
    <h3><?= __('Timbas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_uses') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timbas as $timba): ?>
            <tr>
                <td><?= $this->Number->format($timba->id) ?></td>
                <td><?= h($timba->status) ?></td>
                <td><?= h($timba->date) ?></td>
                <td><?= $this->Number->format($timba->total_uses) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timba->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timba->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timba->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timba->id)]) ?>
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
