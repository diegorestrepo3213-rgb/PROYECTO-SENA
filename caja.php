<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$mov=$conexion->query(

"

SELECT *

FROM caja_movimientos

ORDER BY fecha DESC

"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Reporte caja

</h2>


<table class="table">


<tr>

<th>Tipo</th>

<th>Concepto</th>

<th>Valor</th>

</tr>


<?php foreach($mov as $m): ?>


<tr>

<td>
<?=$m["tipo"]?>
</td>


<td>
<?=$m["concepto"]?>
</td>


<td>
<?=formatoDinero($m["monto"])?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>