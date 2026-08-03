<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$sql="

SELECT *

FROM proveedores

ORDER BY id_proveedor DESC

";


$stmt=$conexion->prepare($sql);

$stmt->execute();


$proveedores=$stmt->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-3">


<h2>

Proveedores

</h2>


<a href="crear.php"

class="btn btn-success">

Nuevo proveedor

</a>


</div>



<div class="card">


<div class="card-header">

Listado de proveedores

</div>


<div class="card-body">


<table class="table table-striped">


<thead>

<tr>

<th>ID</th>

<th>Empresa</th>

<th>NIT</th>

<th>Contacto</th>

<th>Teléfono</th>

<th>Acciones</th>

</tr>

</thead>


<tbody>


<?php foreach($proveedores as $p): ?>


<tr>


<td>

<?=$p["id_proveedor"]?>

</td>


<td>

<?=$p["nombre"]?>

</td>


<td>

<?=$p["nit"]?>

</td>


<td>

<?=$p["contacto"]?>

</td>


<td>

<?=$p["telefono"]?>

</td>



<td>


<a href="editar.php?id=<?=$p['id_proveedor']?>"

class="btn btn-primary btn-sm">

Editar

</a>



<a href="eliminar.php?id=<?=$p['id_proveedor']?>"

onclick="return confirmarEliminar()"

class="btn btn-danger btn-sm">

Eliminar

</a>


</td>


</tr>


<?php endforeach; ?>


</tbody>


</table>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>