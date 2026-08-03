<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();

$lista=$conexion->query("

SELECT *

FROM notificaciones

ORDER BY fecha DESC

")->fetchAll();

?>

<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>

<div class="content">

<div class="card">

<div class="card-header">

Notificaciones del Sistema

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>

<th>ID</th>

<th>Tipo</th>

<th>Destino</th>

<th>Título</th>

<th>Estado</th>

<th>Fecha</th>

</tr>

<?php foreach($lista as $n): ?>

<tr>

<td><?=$n["id"]?></td>

<td><?=$n["tipo"]?></td>

<td><?=$n["destinatario"]?></td>

<td><?=$n["titulo"]?></td>

<td><?=$n["estado"]?></td>

<td><?=$n["fecha"]?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

</div>

<?php include "../includes/footer.php"; ?>