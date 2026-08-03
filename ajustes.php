<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$stmt=$conexion->prepare(

"UPDATE productos

SET stock=?

WHERE id_producto=?"

);



$stmt->execute([


$_POST["stock"],

$_POST["producto"]

]);



}



$productos=$conexion->query(

"SELECT * FROM productos"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Ajuste de inventario

</div>


<div class="card-body">


<form method="POST">


<select name="producto"

class="form-control mb-3">


<?php foreach($productos as $p): ?>

<option value="<?=$p["id_producto"]?>">

<?=$p["nombre"]?>

</option>

<?php endforeach; ?>


</select>



<input

class="form-control mb-3"

name="stock"

placeholder="Nuevo stock">



<button class="btn btn-warning">

Actualizar

</button>


</form>


</div>

</div>

</div>