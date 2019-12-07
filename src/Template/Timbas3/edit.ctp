<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timba $timba
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timba->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timba->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Timbas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="timbas form large-9 medium-8 columns content">
    <?= $this->Form->create($timba) ?>
    <fieldset>
        <legend><?= __('Edit Timba') ?></legend>
        <?php
            echo $this->Form->control('status');
            echo $this->Form->control('date');
            echo $this->Form->control('total_uses');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
