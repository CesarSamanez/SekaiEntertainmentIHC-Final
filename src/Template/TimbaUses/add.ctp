<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TimbaUse $timbaUse
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Timba Use
      <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($timbaUse, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('timba_id', ['options' => $timba]);
                echo $this->Form->control('users_id', ['options' => $users]);
                echo $this->Form->control('personas');
                echo $this->Form->control('tiempo');
                echo $this->Form->control('total');
                echo $this->Form->control('initial_date');
                echo $this->Form->control('final_date');
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
