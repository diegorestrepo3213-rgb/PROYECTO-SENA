<?php

require_once "../config/config.php";
require_once "../config/conexion.php";

$errores=$conexion->query(

"SELECT *

FROM logs

WHERE tipo='ERROR'

ORDER BY fecha DESC"

)->fetchAll();

include "../includes/header.php";
?>

<div class="content">

<h2>Errores del Sistema</h2>

<table class="table table-bordered">

<tr>

<th>Fecha</th>

<th>Descripción</th>

</tr>

<?php foreach($errores as $e): ?>

<tr>

<td><?=$e["fecha"]?></td>

<td><?=$e["descripcion"]?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

<?php include "../includes/footer.php"; ?>