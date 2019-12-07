<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= __('Ingresos de las Ventas') ?>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <?php
  $mysqli = new mysqli('localhost', 'root', '', 'system2');
  $mysqli->set_charset("utf8");

//Ingresos de la Semana Pasada
$semanaPasada = "SELECT *FROM sale_details WHERE date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
$resultSemanaPasada = $mysqli->query($semanaPasada);
$ingresosSemanaPasada = 0;
  while ($row = $resultSemanaPasada->fetch_array()) {
    $ingresosSemanaPasada+=$row['total'];
  }

//Ingresos de la Semana Actual
$semanaActual= "SELECT *FROM sale_details WHERE YEARWEEK(date) = YEARWEEK(CURDATE())";
$resultSemanaActual= $mysqli->query($semanaActual);
$totalSemanaActual = 0;
  while ($row = $resultSemanaActual->fetch_array()) {
    $totalSemanaActual+= $row['total'];
  }

//Ingresos del Ultimo Mes
$ultimoMes = "SELECT * FROM sale_details WHERE date BETWEEN date_sub(now(), interval 1 month) AND NOW()";
$resultUltimoMes = $mysqli->query($ultimoMes);
$totalUltimoMes = 0;
  while ($row = $resultUltimoMes->fetch_array()) {
    $totalUltimoMes += $row['total'];
  }

//Ingresos totales
$query = "SELECT * FROM sale_details";
$result = $mysqli->query($query);
$ingresosTotales = 0;
  while ($row = $result->fetch_array()) {
      $ingresosTotales+= $row['total'];
  }

?>
  <table class="table table-hover">
    <center><tr>
      <td>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" style="width: 520px;">
            <div class="inner">
              <h3><?php echo __('Ingresos Totales Acumulados'); ?></h3>
              <h2><center><?php echo $ingresosTotales; ?></center></h2>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
          </div>
        </div>
      </td>

    <td>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="width: 520px">
        <div class="inner">
          <h3><?php echo __('Ingresos de la Semana Pasada'); ?></h3>

          <h2><center><?php echo $ingresosSemanaPasada; ?></center></h2>
        </div>
        <div class="icon">
          <i class="ion ion-archive"></i>
        </div>
      </div>
    </div>
  </td>
<tr>
  <tr>
  <td>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="width: 520px">
        <div class="inner">
          <h3><?php echo __('Ingresos de la Semana Actual'); ?></h3>

          <h2><center><?php echo $totalSemanaActual; ?></center></h2>
        </div>
        <div class="icon">
          <i class="ion ion-archive"></i>
        </div>
      </div>
    </div>
  </td>
    <td>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green" style="width: 520px">
        <div class="inner">
          <h3><?php echo __('Ingresos del Ultimo Mes'); ?></h3>

          <h2><center><?php echo $totalUltimoMes; ?></center></h2>
        </div>
        <div class="icon">
          <i class="ion ion-archive"></i>
        </div>
      </div>
    </div>
  </td>
</tr>
  </table>



</section>
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>
<!-- DataTables -->
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net/js/jquery.dataTables.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net-bs/js/dataTables.bootstrap.min', ['block' => 'script']); ?>


<?php $this->start('scriptBottom'); ?>


<?php $this->end(); ?>
