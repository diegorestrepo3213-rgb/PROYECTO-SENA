<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"INSERT INTO categorias(nombre)

VALUES(?)"

);


$stmt->execute([

$_POST["nombre"]

]);


}



$datos=$conexion->query(

"SELECT * FROM categorias"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Categorías

</div>


<div class="card-body">


<form method="POST">


<input class="form-control"

name="nombre"

placeholder="Nueva categoría">


<br>

<button class="btn btn-success">

Guardar

</button>


</form>



<hr>



<?php foreach($datos as $d): ?>

<p>

<?=$d["nombre"]?>

</p>

<?php endforeach; ?>


</div>

</div>

</div>