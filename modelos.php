<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();



if($_POST){

$conexion->prepare(

"INSERT INTO modelos(nombre,id_marca)

VALUES(?,?)"

)->execute([

$_POST["nombre"],

$_POST["marca"]

]);

}


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">

<div class="card-header">

Modelos

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-2"

name="nombre"

placeholder="Modelo">


<input class="form-control mb-2"

name="marca"

placeholder="ID Marca">


<button class="btn btn-success">

Guardar

</button>


</form>


</div>

</div>

</div>