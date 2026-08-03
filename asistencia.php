<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$conexion->prepare(

"INSERT INTO asistencia

(id_empleado,

fecha,

entrada,

salida,

estado)

VALUES(?,?,?,?,?)"

)->execute([


$_POST["empleado"],

date("Y-m-d"),

$_POST["entrada"],

$_POST["salida"],

$_POST["estado"]


]);


}



$empleados=$conexion->query(

"SELECT *

FROM empleados"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Control asistencia

</div>


<div class="card-body">


<form method="POST">


<select class="form-control mb-2"

name="empleado">


<?php foreach($empleados as $e): ?>


<option value="<?=$e["id_empleado"]?>">

<?=$e["nombre"]?>

</option>


<?php endforeach; ?>


</select>



<input class="form-control mb-2"

name="entrada"

placeholder="Hora entrada">


<input class="form-control mb-2"

name="salida"

placeholder="Hora salida">



<select class="form-control mb-2"

name="estado">


<option>

Presente

</option>


<option>

Ausente

</option>


<option>

Permiso

</option>


</select>



<button class="btn btn-success">

Registrar

</button>


</form>


</div>


</div>


</div>