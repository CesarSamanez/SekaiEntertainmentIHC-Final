<section class="content-header">
  <h1>
    Table Use
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
            <dt scope="row"><?= __('Table') ?></dt>
            <dd><?= $tableUse->has('table') ? $this->Html->link($tableUse->table->id, ['controller' => 'Tables', 'action' => 'view', $tableUse->table->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $tableUse->has('user') ? $this->Html->link($tableUse->user->name, ['controller' => 'Users', 'action' => 'view', $tableUse->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($tableUse->id) ?></dd>
            <dt scope="row"><?= __('Total') ?></dt>
            <dd><?= $this->Number->format($tableUse->total) ?></dd>
            <dt scope="row"><?= __('Time') ?></dt>
            <dd><?= h($tableUse->time) ?></dd>
            <dt scope="row"><?= __('Initial Date') ?></dt>
            <dd><?= h($tableUse->initial_date) ?></dd>
            <dt scope="row"><?= __('Final Date') ?></dt>
            <dd><?= h($tableUse->final_date) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
