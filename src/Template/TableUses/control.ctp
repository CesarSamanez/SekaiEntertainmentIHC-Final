
<head>
	<meta charset="UTF-8">
	<title>Gestión de mesas</title>
	<script type="text/javascript" src="cronometro.js"></script>

</head>


<body>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h1 class="box-title"><?php echo __('Control de Mesas'); ?></h1>

          </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
                     <table id="example1" class="table table-bordered table-striped">
   <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('Mesa') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Precio/Hora') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de inicio') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de finalización') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Tiempo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($tables as $table): ?>
								<?php
								$fecha="0/0/0 0:00:00";
									foreach($temporalUses as $tempUse){
										if($tempUse->tables_id==$table->id){
											$fecha=$tempUse->date->format('Y-m-d H:i:s');
										}
									}
									?>
                <tr>
                  <td>Mesa <?= $this->Number->format($table->id) ?></td>
                  <td><span id="price<?= $table->id?>"><?= $table->price?></td>
                  <td><span id="horai<?= $table->id?>"><?= $fecha ?></span></td>
                  <td><span id="horaf<?= $table->id?>">-- . -- . --</td>
                  <td><span id="horas<?= $table->id?>">-- . -- . --</td>
                  <td><input id="total<?= $table->id?>" type="number" step="0.10" value="0" min="0" ></td>
									<td><?= $this->Html->link(__('Iniciar'), ['controller'=> 'temporalUses', 'action' => 'update', $table->id	], ['class'=>'btn btn-info btn-xs' , 'id'=>'in'.$table->id]) ?>
									<?= $this->Html->link(__('Finalizar'), ['controller'=> 'tableUses', 'action' => 'add', $table->id, 1	], ['class'=>'btn btn-info btn-xs' , style=>"display: none;" , 'id'=>'fi'.$table->id]) ?></td>
                  
                  <td><button type="button" id="s<?= $table->id?>" class="btn btn-outline-success" onclick="cargaMesa(<?= $table->id?>)" style="display: none;">Iniciar</button>
              		<button type="button" id="e<?= $table->id?>" disabled="true" class="btn btn-outline-warning" onclick="detenerMesa(<?= $table->id?>)" style="display: none;">Finalizar</button></td>
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



</body>
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>
<?php echo $this->Html->script('cronometro2.js?'.filemtime('js/cronometro2.js')); ?>
<?php
	foreach($temporalUses as $tempU){
		echo "<script >cargaMesa($tempU->tables_id);</script>";
	}
	?>
