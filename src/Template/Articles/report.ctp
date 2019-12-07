<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= __('Articles') ?>
    <div class="pull-right"><?php echo $this->Html->link(__('Sell'), ['action' => 'sell'], ['class'=>'btn btn-info btn-xs']) ?></div>
    <div class="pull-right"><?php echo $this->Html->link(__('Buy'), ['action' => 'buy'], ['class'=>'btn btn-info btn-xs']) ?></div>
    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <p id="titulo" style="display: none"><?= __('Articles for each Category') ?></p>
  <div class="myDiv" id="myDiv" align="center" style="transform: translate(0, 5%)">
    <?php
    $arr=array();
    foreach ($articles as $article){
      if($article->stock>0){
        if(array_key_exists($article->name, $arr)){
          $arr[$article->name][0]+=$article->stock;
        }else{
          $arr[$article->name]=[$article->stock, $article->category->name];
        }
      }
    }
    ?>
  </div>
</section>
<?php echo $this->Html->css('AdminLTE./bower_components/datatables.net-bs/css/dataTables.bootstrap.min', ['block' => 'css']); ?>

<!-- DataTables -->
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net/js/jquery.dataTables.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('AdminLTE./bower_components/datatables.net-bs/js/dataTables.bootstrap.min', ['block' => 'script']); ?>
<?php echo $this->Html->script('plotly.js'); ?>


<?php $this->start('scriptBottom'); ?>
<script>
var arr=<?php echo json_encode($arr); ?>;
var title=document.getElementById('titulo').innerHTML;
console.log(title);
console.log(arr);
let tot=0;
let splitnames=[];
for(let name in arr){
  let n="";
  let sp=name.split(" ");
  n=name.replace(" ", "<br>");
  splitnames[name]=n;
}
var data = [{
  type: "sunburst",
  labels: ["Stock"],
  parents: [""],
  values:  [""],
  outsidetextfont: {size: 20, color: "#377eb8"},
  leaf: {opacity: 0.7},
  marker: {line: {width: 2}},
}];
console.log(data);
for(let name in arr){
  if(!data[0].labels.includes(arr[name][1])){
    data[0].labels.push(arr[name][1]);
    data[0].parents.push("Stock")
    data[0].values.push("0");
  }
}
for(let name in arr){
  console.log(name +" = " +arr[name]);
  data[0].labels.push(splitnames[name]);
  data[0].parents.push(arr[name][1]);
  data[0].values.push(arr[name][0]);
}
console.log(data[0]);
var layout = {
  title: title,
  margin: {l: 10, r: 10, b: 10, t: 60},
  width: 1000,
  height: 500,
  font:{
    size:18
  }
};


Plotly.newPlot('myDiv', data, layout, {responsive: true});
</script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
<?php $this->end(); ?>
