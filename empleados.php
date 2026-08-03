<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"INSERT INTO empleados

(nombre,

documento,

telefono,

correo,

cargo,

salario,

estado)

VALUES(?,?,?,?,?,?,1)"

);



$stmt->execute([


$_POST["nombre"],

$_POST["documento"],

$_POST["telefono"],

$_POST["correo"],

$_POST["cargo"],

$_POST["salario"]


]);


}



$empleados=$conexion->query(

"SELECT *

FROM empleados

ORDER BY id_empleado DESC"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Empleados

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-2"

name="nombre"

placeholder="Nombre completo">


<input class="form-control mb-2"

name="documento"

placeholder="Documento">


<input class="form-control mb-2"

name="telefono"

placeholder="Teléfono">


<input class="form-control mb-2"

name="correo"

placeholder="Correo">


<input class="form-control mb-2"

name="cargo"

placeholder="Cargo">


<input class="form-control mb-2"

name="salario"

placeholder="Salario">


<button class="btn btn-success">

Guardar empleado

</button>


</form>


<hr>


<table class="table">


<tr>

<th>Nombre</th>

<th>Cargo</th>

<th>Salario</th>

</tr>



<?php foreach($empleados as $e): ?>


<tr>


<td>

<?=$e["nombre"]?>

</td>


<td>

<?=$e["cargo"]?>

</td>


<td>

<?=formatoDinero($e["salario"])?>

</td>


</tr>


<?php endforeach; ?>


</table>


</div>


</div>


</div>