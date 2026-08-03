<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();


$sql="

SELECT

ventas.id_venta,
clientes.nombre,
ventas.total,
ventas.fecha

FROM ventas

INNER JOIN clientes

ON clientes.id_cliente=ventas.id_cliente

ORDER BY ventas.fecha DESC

";


$ventas=$conexion->query($sql)->fetchAll();

?>


<?php include "../includes/header.php"; ?>


<div class="content">

<h2>
Reporte de ventas
</h2>


<div class="card">

<div class="card-header">

Ventas realizadas

</div>


<div class="card-body">


<table class="table">

<tr>

<th>Factura</th>
<th>Cliente</th>
<th>Total</th>
<th>Fecha</th>

</tr>


<?php foreach($ventas as $v): ?>


<tr>

<td>
<?=$v["id_venta"]?>
</td>


<td>
<?=$v["nombre"]?>
</td>


<td>
<?=formatoDinero($v["total"])?>
</td>


<td>
<?=$v["fecha"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>

</div>


</div>