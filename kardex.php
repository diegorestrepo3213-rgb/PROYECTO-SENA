<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$sql="

SELECT

inventario_movimientos.*,

productos.nombre


FROM inventario_movimientos


INNER JOIN productos

ON productos.id_producto=
inventario_movimientos.id_producto


ORDER BY fecha DESC

";


$movimientos=$conexion->query($sql)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Kardex

</div>


<div class="card-body">


<table class="table">


<tr>

<th>Producto</th>

<th>Tipo</th>

<th>Cantidad</th>

<th>Fecha</th>

</tr>



<?php foreach($movimientos as $m): ?>


<tr>


<td>

<?=$m["nombre"]?>

</td>


<td>

<?=$m["tipo"]?>

</td>


<td>

<?=$m["cantidad"]?>

</td>


<td>

<?=$m["fecha"]?>

</td>


</tr>


<?php endforeach; ?>


</table>


</div>


</div>


</div>