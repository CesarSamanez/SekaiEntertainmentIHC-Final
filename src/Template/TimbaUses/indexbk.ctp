<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Usos - Timba

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
    <div class="pull-right"><?php echo $this->Html->link(__('Control'), ['action' => 'control'], ['class'=>'btn btn-success btn-xs']) ?></div>

  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('timba_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('personas') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tiempo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('initial_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('final_date') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($timbaUses as $timbaUse): ?>
                <tr>
                  <td><?= $this->Number->format($timbaUse->id) ?></td>
                  <td><?= $timbaUse->has('timba') ? $this->Html->link($timbaUse->timba->id, ['controller' => 'Timba', 'action' => 'view', $timbaUse->timba->id]) : '' ?></td>
                  <td><?= $timbaUse->has('user') ? $this->Html->link($timbaUse->user->name, ['controller' => 'Users', 'action' => 'view', $timbaUse->user->id]) : '' ?></td>
                  <td><?= $this->Number->format($timbaUse->personas) ?></td>
                  <td><?= h($timbaUse->tiempo) ?></td>
                  <td><?= $this->Number->format($timbaUse->total) ?></td>
                  <td><?= h($timbaUse->initial_date) ?></td>
                  <td><?= h($timbaUse->final_date) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $timbaUse->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timbaUse->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timbaUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timbaUse->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
