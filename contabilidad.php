<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$datos=$conexion->query(

"

SELECT *

FROM asientos

ORDER BY fecha DESC

"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Reporte contable

</h2>


<table class="table">


<tr>

<th>Fecha</th>

<th>Debe</th>

<th>Haber</th>

</tr>


<?php foreach($datos as $d): ?>


<tr>

<td>
<?=$d["fecha"]?>
</td>

<td>
<?=$d["debe"]?>
</td>

<td>
<?=$d["haber"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>