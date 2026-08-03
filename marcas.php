<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();



if($_POST){

$conexion->prepare(

"INSERT INTO marcas(nombre)

VALUES(?)"

)->execute([

$_POST["nombre"]

]);

}


$marcas=$conexion->query(

"SELECT * FROM marcas"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">

<div class="card-header">

Marcas

</div>


<div class="card-body">


<form method="POST">


<input class="form-control"

name="nombre">


<button class="btn btn-success mt-2">

Guardar

</button>


</form>



<?php foreach($marcas as $m): ?>

<p>

<?=$m["nombre"]?>

</p>

<?php endforeach; ?>


</div>

</div>

</div>