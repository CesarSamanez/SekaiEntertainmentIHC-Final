
<head>
	<meta charset="UTF-8">
	<title>Gestión de Timbas</title>
	<script type="text/javascript" src="cronometro.js"></script>

</head>


<body>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h1 class="box-title"><?php echo __('Control de Timbas'); ?></h1>

          </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
                     <table id="example1" class="table table-bordered table-striped">
   <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('Timba') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Personas/Precio') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de inicio') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Hora de finalización') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Tiempo') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($timbas as $timba): ?>

								<?php
								$fecha="0/0/0 0:00:00";
									foreach($timbaTemporalUses as $tempUse){
										if($tempUse->timbas_id==$timba->id){
											$fecha=$tempUse->date->format('Y-m-d H:i:s');
										}
									}
									?>
                <tr>
                  <td>Timba <?= $this->Number->format($timba->id) ?></td>
                  <td><input type='number' value=0 name="price<?= $timba->id?>" id="price<?= $timba->id?>" min=0></td>
                  <td><span id="horai<?= $timba->id?>"><?= $fecha ?></span></td>
                  <td><span id="horaf<?= $timba->id?>">Cuando quieras :v</td>
                  <td><span id="horas<?= $timba->id?>"></td>
                  <td><input id="total<?= $timba->id?>" type="number" step="0.10" value="0" min="0" ></td>
									<td><?= $this->Html->link(__('Iniciar'), ['controller'=> 'TimbaTemporalUses', 'action' => 'update', $timba->id	], ['class'=>'btn btn-info btn-xs' , 'id'=>'in'.$timba->id ]) ?>
									<?= $this->Html->link(__('Finalizar'), ['controller'=> 'timbasUses', 'action' => 'add', $timba->id, 1	], ['class'=>'btn btn-info btn-xs' , style=>"display: none;" , 'id'=>'fi'.$timba->id ]) ?></td>
                  
                  <td><button type="button" id="s<?= $timba->id?>" class="btn btn-outline-success" onclick="cargaMesa(<?= $timba->id?>)" style="display: none;">Iniciar</button>
              		<button type="button" id="e<?= $timba->id?>" disabled="true" class="btn btn-outline-warning" onclick="detenerMesa(<?= $timba->id?>)" style="display: none;">Finalizar</button></td>
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
	foreach($timbaTemporalUses as $tempU){
		echo "<script >cargaMesa($tempU->timbas_id);</script>";
	}
	?>
