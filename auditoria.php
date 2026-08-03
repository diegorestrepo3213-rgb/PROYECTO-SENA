<?php

require_once "../config/config.php";
require_once "../config/conexion.php";

$datos=$conexion->query(

"SELECT *

FROM auditoria

ORDER BY fecha DESC"

)->fetchAll();

include "../includes/header.php";
?>

<div class="content">

<h2>Auditoría del Sistema</h2>

<table class="table table-bordered">

<tr>

<th>Usuario</th>

<th>Acción</th>

<th>Fecha</th>

</tr>

<?php foreach($datos as $d): ?>

<tr>

<td><?=$d["usuario"]?></td>

<td><?=$d["accion"]?></td>

<td><?=$d["fecha"]?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

<?php include "../includes/footer.php"; ?>