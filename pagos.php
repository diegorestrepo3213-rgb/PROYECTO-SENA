<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$conexion->prepare(

"INSERT INTO pagos_nomina

(id_empleado,

periodo,

valor,

fecha)

VALUES(?,?,?,NOW())"

)->execute([


$_POST["empleado"],

$_POST["periodo"],

$_POST["valor"]


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

Pagos de nómina

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

name="periodo"

placeholder="Periodo ejemplo: Julio 2026">



<input class="form-control mb-2"

name="valor"

placeholder="Valor pago">



<button class="btn btn-success">

Registrar pago

</button>


</form>


</div>


</div>


</div>