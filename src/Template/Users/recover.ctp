<!-- File: src/Template/Users/email.ctp -->
<?php $this->layout = 'AdminLTE.forgot'; ?>

<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><center><?= __('Please enter your six digit code') ?></center></legend>
        <?= $this->Form->control('code') ?>

		<legend><center><?= __('Please enter your new password') ?></center></legend>
        <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button(__('Change my password')); ?>
<?= $this->Form->end() ?>
</div>
