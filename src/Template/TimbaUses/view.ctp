<section class="content-header">
  <h1>
    Timba Use
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Timba') ?></dt>
            <dd><?= $timbaUse->has('timba') ? $this->Html->link($timbaUse->timba->id, ['controller' => 'Timba', 'action' => 'view', $timbaUse->timba->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $timbaUse->has('user') ? $this->Html->link($timbaUse->user->name, ['controller' => 'Users', 'action' => 'view', $timbaUse->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($timbaUse->id) ?></dd>
            <dt scope="row"><?= __('Personas') ?></dt>
            <dd><?= $this->Number->format($timbaUse->personas) ?></dd>
            <dt scope="row"><?= __('Total') ?></dt>
            <dd><?= $this->Number->format($timbaUse->total) ?></dd>
            <dt scope="row"><?= __('Tiempo') ?></dt>
            <dd><?= h($timbaUse->tiempo) ?></dd>
            <dt scope="row"><?= __('Initial Date') ?></dt>
            <dd><?= h($timbaUse->initial_date) ?></dd>
            <dt scope="row"><?= __('Final Date') ?></dt>
            <dd><?= h($timbaUse->final_date) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
