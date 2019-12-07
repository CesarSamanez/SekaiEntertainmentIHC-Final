<section class="content-header">
  <h1>
    Timba
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
            <dd><?= $this->Number->format($timba->id) ?></dd>
            <dt scope="row"><?= __('CantidadUsos') ?></dt>
            <dd><?= $this->Number->format($timba->total_uses) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $timba->status ? __('Yes') : __('No'); ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Timba Uses') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($timba->timba_uses)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Timba Id') ?></th>
                    <th scope="col"><?= __('Users Id') ?></th>
                    <th scope="col"><?= __('Personas') ?></th>
                    <th scope="col"><?= __('Tiempo') ?></th>
                    <th scope="col"><?= __('Total') ?></th>
                    <th scope="col"><?= __('Initial Date') ?></th>
                    <th scope="col"><?= __('Final Date') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($timba->timba_uses as $timbaUses): ?>
              <tr>
                    <td><?= h($timbaUses->id) ?></td>
                    <td><?= h($timbaUses->timba_id) ?></td>
                    <td><?= h($timbaUses->users_id) ?></td>
                    <td><?= h($timbaUses->personas) ?></td>
                    <td><?= h($timbaUses->tiempo) ?></td>
                    <td><?= h($timbaUses->total) ?></td>
                    <td><?= h($timbaUses->initial_date) ?></td>
                    <td><?= h($timbaUses->final_date) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'TimbaUses', 'action' => 'view', $timbaUses->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'TimbaUses', 'action' => 'edit', $timbaUses->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'TimbaUses', 'action' => 'delete', $timbaUses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaUses->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
