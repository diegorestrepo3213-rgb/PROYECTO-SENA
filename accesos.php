<?php

require_once "../config/config.php";
require_once "../config/conexion.php";

$datos=$conexion->query(

"SELECT *

FROM logs

WHERE tipo='LOGIN'

ORDER BY fecha DESC"

)->fetchAll();

include "../includes/header.php";
?>

<div class="content">

<h2>Accesos al Sistema</h2>

<table class="table table-bordered">

<tr>

<th>Usuario</th>

<th>Fecha</th>

<th>IP</th>

</tr>

<?php foreach($datos as $d): ?>

<tr>

<td><?=$d["usuario"]?></td>

<td><?=$d["fecha"]?></td>

<td><?=$d["ip"]?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

<?php include "../includes/footer.php"; ?>