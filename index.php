<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$sql="
SELECT

COUNT(*) AS productos,

SUM(stock) AS unidades

FROM productos

";


$stmt=$conexion->prepare($sql);

$stmt->execute();


$inventario=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<h2 class="mb-4">

Inventario

</h2>



<div class="row">


<div class="col-md-6">


<div class="card text-white"

style="background:#14532d">


<div class="card-body">


<h4>

Productos registrados

</h4>


<h2>

<?=$inventario["productos"]?>

</h2>


</div>


</div>


</div>



<div class="col-md-6">


<div class="card text-white"

style="background:#166534">


<div class="card-body">


<h4>

Unidades disponibles

</h4>


<h2>

<?=$inventario["unidades"]?>

</h2>


</div>


</div>


</div>


</div>



<div class="card mt-4">


<div class="card-header">

Movimientos rápidos

</div>


<div class="card-body">


<a href="entradas.php"

class="btn btn-success">

Entrada

</a>


<a href="salidas.php"

class="btn btn-danger">

Salida

</a>


<a href="ajustes.php"

class="btn btn-warning">

Ajuste

</a>


<a href="traslados.php"

class="btn btn-primary">

Traslado

</a>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>