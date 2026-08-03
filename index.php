<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$sql="

SELECT

reparaciones.*,

clientes.nombre AS cliente


FROM reparaciones


LEFT JOIN clientes

ON clientes.id_cliente=
reparaciones.id_cliente


ORDER BY id_reparacion DESC

";


$reparaciones=$conexion->query($sql)->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between">


<h2>

Reparaciones

</h2>


<a href="recibir.php"

class="btn btn-success">

Nueva recepción

</a>


</div>



<div class="card mt-3">


<div class="card-header">

Órdenes técnicas

</div>


<div class="card-body">


<table class="table">


<tr>

<th>ID</th>

<th>Cliente</th>

<th>Equipo</th>

<th>Estado</th>

<th>Acciones</th>

</tr>



<?php foreach($reparaciones as $r): ?>


<tr>


<td>

<?=$r["id_reparacion"]?>

</td>


<td>

<?=$r["cliente"]?>

</td>


<td>

<?=$r["equipo"]?>

</td>


<td>

<?=$r["estado"]?>

</td>


<td>


<a href="diagnostico.php?id=<?=$r['id_reparacion']?>"

class="btn btn-warning btn-sm">

Diagnóstico

</a>


<a href="seguimiento.php?id=<?=$r['id_reparacion']?>"

class="btn btn-primary btn-sm">

Seguimiento

</a>


</td>


</tr>


<?php endforeach; ?>


</table>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>