<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= __('Profit') ?>
  </h1>
</section>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<!-- Main content -->
<section class="content">
<p id="titulo" style="display: none"><?= __('Profit made by each Seller') ?></p>
  <div id="myDiv" class="myDiv" align="center" style="transform: translate(0, 20%);">
    <?php
    $arr=array();
    foreach ($sales as $sale){
      if(array_key_exists($sale->user->name, $arr)){
        $arr[$sale->user->name]+=$sale->total;
      }else{
        $arr[$sale->user->name]=$sale->total;
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
<script>
var arr=<?php echo json_encode($arr); ?>;
var title=document.getElementById('titulo').innerHTML;
console.log(arr);
let tot=0;
for(let name in arr){
  tot+=arr[name];
}
var data = [{
  type: "sunburst",
  labels: ["Ganancias"],
  parents: [""],
  values:  [""],
  outsidetextfont: {size: 20, color: "#377eb8"},
  leaf: {opacity: 0.7},
  marker: {line: {width: 2}},
}];
console.log(data);
for(let name in arr){
  console.log(name +" = " +arr[name]);
  data[0].labels.push(name);
  data[0].parents.push("Ganancias");
  data[0].values.push(arr[name]);
}
var layout = {
  title: title,
  margin: {l: 10, r: 10, b: 10, t: 60},
  width:1000,
  height:500,
  font:{
    size:18
  }
};



Plotly.newPlot('myDiv', data, layout, {responsive: true});
</script>

<?php $this->start('scriptBottom'); ?>
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
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>

</script>
<script>
function sum() {
var sum1 = document.getElementsByClassName("sum1");
var sum2 = document.getElementsByClassName("sum2");
var total1 = 0;
var total2 = 0;

for (i = 0; i < sum1.length; i++) {
    total1 = total1+parseFloat(sum1[i].innerHTML);
}
for (i = 0; i < sum2.length; i++) {

    total2 = total2+parseFloat(sum2[i].innerHTML);
}
document.getElementById("total1").innerHTML="Total Ventas: "+total1;
document.getElementById("total2").innerHTML="Total Compras: "+total2;
document.getElementById("total3").innerHTML="Total Ganacias: "+(total1-total2);

}
</script>

<?php $this->end(); ?>
