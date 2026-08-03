<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$conexion->prepare(

"INSERT INTO cargos

(nombre,descripcion)

VALUES(?,?)"

)->execute([


$_POST["nombre"],

$_POST["descripcion"]

]);


}



$cargos=$conexion->query(

"SELECT *

FROM cargos"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Cargos

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-2"

name="nombre"

placeholder="Nombre cargo">



<textarea class="form-control mb-2"

name="descripcion"

placeholder="Descripción">

</textarea>



<button class="btn btn-success">

Guardar

</button>


</form>


<hr>


<?php foreach($cargos as $c): ?>


<p>

<?=$c["nombre"]?>

</p>


<?php endforeach; ?>


</div>


</div>


</div>