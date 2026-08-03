<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$sql="

SELECT *

FROM roles

ORDER BY id_rol DESC

";


$stmt=$conexion->prepare($sql);

$stmt->execute();


$roles=$stmt->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-3">


<h2>

Roles

</h2>


<a href="crear.php"

class="btn btn-success">

Nuevo rol

</a>


</div>



<div class="card">


<div class="card-header">

Administración de roles

</div>


<div class="card-body">


<table class="table table-striped">


<thead>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Descripción</th>

<th>Acciones</th>

</tr>

</thead>



<tbody>


<?php foreach($roles as $r): ?>


<tr>


<td>

<?=$r["id_rol"]?>

</td>


<td>

<?=$r["nombre"]?>

</td>


<td>

<?=$r["descripcion"]?>

</td>


<td>


<a href="editar.php?id=<?=$r['id_rol']?>"

class="btn btn-primary btn-sm">

Editar

</a>



<a href="permisos.php?id=<?=$r['id_rol']?>"

class="btn btn-success btn-sm">

Permisos

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