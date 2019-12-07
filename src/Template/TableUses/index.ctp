<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Table Uses

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
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
                  <th scope="col"><?= $this->Paginator->sort('tables_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('time') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('initial_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('final_date') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tableUses as $tableUse): ?>
                <tr>
                  <td><?= $this->Number->format($tableUse->id) ?></td>
                  <td><?= $tableUse->has('table') ? $this->Html->link($tableUse->table->id, ['controller' => 'Tables', 'action' => 'view', $tableUse->table->id]) : '' ?></td>
                  <td><?= $tableUse->has('user') ? $this->Html->link($tableUse->user->name, ['controller' => 'Users', 'action' => 'view', $tableUse->user->id]) : '' ?></td>
                  <td><?= h($tableUse->time) ?></td>
                  <td><?= $this->Number->format($tableUse->total) ?></td>
                  <td><?= h($tableUse->initial_date) ?></td>
                  <td><?= h($tableUse->final_date) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $tableUse->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tableUse->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tableUse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tableUse->id), 'class'=>'btn btn-danger btn-xs']) ?>
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