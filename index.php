<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();


$sql="
SELECT 
usuarios.*,
roles.nombre AS rol_nombre

FROM usuarios

LEFT JOIN roles

ON usuarios.id_rol = roles.id_rol

ORDER BY id_usuario DESC
";


$stmt=$conexion->prepare($sql);

$stmt->execute();


$usuarios=$stmt->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-3">

<h2>

Usuarios

</h2>


<a href="crear.php"

class="btn btn-success">

Nuevo usuario

</a>


</div>



<div class="card">


<div class="card-header">

Listado de usuarios

</div>



<div class="card-body">


<table class="table table-striped">


<thead>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Usuario</th>

<th>Rol</th>

<th>Estado</th>

<th>Acciones</th>

</tr>

</thead>


<tbody>


<?php foreach($usuarios as $u): ?>


<tr>


<td>
<?=$u["id_usuario"]?>
</td>


<td>
<?=$u["nombre"]?>
</td>


<td>
<?=$u["usuario"]?>
</td>


<td>
<?=$u["rol_nombre"]?>
</td>



<td>

<?php if($u["estado"]): ?>

<span class="badge bg-success">

Activo

</span>

<?php else: ?>

<span class="badge bg-danger">

Inactivo

</span>

<?php endif; ?>


</td>



<td>


<a class="btn btn-primary btn-sm"

href="editar.php?id=<?=$u['id_usuario']?>">

Editar

</a>


<a class="btn btn-danger btn-sm"

onclick="return confirmarEliminar()"

href="eliminar.php?id=<?=$u['id_usuario']?>">

Eliminar

</a>


<a class="btn btn-dark btn-sm"

href="perfil.php?id=<?=$u['id_usuario']?>">

Perfil

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