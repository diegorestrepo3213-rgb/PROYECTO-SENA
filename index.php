<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();


$sql="

SELECT

ventas.*,

clientes.nombre AS cliente


FROM ventas


LEFT JOIN clientes

ON ventas.id_cliente=clientes.id_cliente


ORDER BY ventas.id_venta DESC

";


$stmt=$conexion->prepare($sql);
$stmt->execute();


$ventas=$stmt->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-3">


<h2>

Ventas

</h2>


<a href="nueva.php"

class="btn btn-success">

Nueva venta

</a>


</div>



<div class="card">


<div class="card-header">

Registro de ventas

</div>


<div class="card-body">


<table class="table table-striped">


<tr>

<th>ID</th>

<th>Cliente</th>

<th>Total</th>

<th>Estado</th>

<th>Fecha</th>

<th>Acciones</th>

</tr>



<?php foreach($ventas as $v): ?>


<tr>


<td>

<?=$v["id_venta"]?>

</td>


<td>

<?=$v["cliente"]?>

</td>


<td>

<?=formatoDinero($v["total"])?>

</td>


<td>

<?=$v["estado"]?>

</td>


<td>

<?=$v["fecha"]?>

</td>


<td>


<a href="facturas.php?id=<?=$v['id_venta']?>"

class="btn btn-dark btn-sm">

Factura

</a>


<a href="pagos.php?id=<?=$v['id_venta']?>"

class="btn btn-success btn-sm">

Pago

</a>


</td>


</tr>


<?php endforeach; ?>


</table>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>