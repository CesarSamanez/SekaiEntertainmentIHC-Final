<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Table $table
 */
?>





<section class="content-header">
  <h1>
    Table
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
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= h($table->id) ?></dd>
            <dt scope="row"><?= __('Price') ?></dt>
            <dd><?= $this->Number->format($table->price) ?></dd>
            <dt scope="row"><?= __('Date') ?></dt>
            <dd><?= h($table->date) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= h($table->status) ?></dd>
            <dt scope="row"><?= __('Total uses') ?></dt>
            <dd><?= h($table->total_uses) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
