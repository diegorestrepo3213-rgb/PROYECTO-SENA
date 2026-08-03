<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$ventas=$conexion->query(

"

SELECT

ventas.*,

clientes.nombre


FROM ventas


INNER JOIN clientes

ON clientes.id_cliente=
ventas.id_cliente


ORDER BY fecha DESC

"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Historial ventas

</div>


<div class="card-body">


<table class="table">


<tr>

<th>Cliente</th>

<th>Total</th>

<th>Fecha</th>

</tr>



<?php foreach($ventas as $v): ?>


<tr>


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