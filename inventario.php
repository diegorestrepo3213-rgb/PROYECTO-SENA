<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$productos=$conexion->query(

"

SELECT

nombre,

stock,

precio


FROM productos


ORDER BY stock ASC


"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<h2>

Reporte inventario

</h2>


<table class="table">


<tr>

<th>Producto</th>

<th>Stock</th>

<th>Precio</th>

</tr>


<?php foreach($productos as $p): ?>


<tr>

<td>
<?=$p["nombre"]?>
</td>


<td>

<span class="badge bg-success">

<?=$p["stock"]?>

</span>

</td>


<td>

<?=formatoDinero($p["precio"])?>

</td>


</tr>


<?php endforeach; ?>


</table>


</div>