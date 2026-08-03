<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){


$id_producto=$_POST["producto"];

$cantidad=$_POST["cantidad"];



$conexion->prepare(

"UPDATE productos

SET stock=stock+?

WHERE id_producto=?"

)->execute([

$cantidad,

$id_producto

]);



$conexion->prepare(

"INSERT INTO inventario_movimientos

(tipo,id_producto,cantidad,fecha)

VALUES

('ENTRADA',?,?,NOW())"

)->execute([

$id_producto,

$cantidad

]);


}



$productos=$conexion->query(

"SELECT * FROM productos"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Entrada de inventario

</div>


<div class="card-body">


<form method="POST">


<select class="form-control mb-3"

name="producto">


<?php foreach($productos as $p): ?>

<option value="<?=$p['id_producto']?>">

<?=$p["nombre"]?>

</option>

<?php endforeach; ?>


</select>



<input

class="form-control mb-3"

name="cantidad"

placeholder="Cantidad">



<button class="btn btn-success">

Registrar entrada

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>