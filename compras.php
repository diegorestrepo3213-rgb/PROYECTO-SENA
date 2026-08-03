<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$compras=$conexion->query(

"

SELECT

compras.*,

proveedores.nombre


FROM compras


INNER JOIN proveedores

ON proveedores.id_proveedor=

compras.id_proveedor


ORDER BY fecha DESC


"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Reporte compras

</h2>


<table class="table">


<tr>

<th>ID</th>

<th>Proveedor</th>

<th>Total</th>

<th>Fecha</th>

</tr>


<?php foreach($compras as $c): ?>


<tr>

<td>
<?=$c["id_compra"]?>
</td>


<td>
<?=$c["nombre"]?>
</td>


<td>
<?=formatoDinero($c["total"])?>
</td>


<td>
<?=$c["fecha"]?>
</td>


</tr>


<?php endforeach; ?>


</table>


</div>