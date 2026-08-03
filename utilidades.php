<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$datos=$conexion->query(

"

SELECT

SUM(total) ventas

FROM ventas

"

)->fetch();



$compras=$conexion->query(

"

SELECT

SUM(total) compras

FROM compras

"

)->fetch();



$utilidad=

$datos["ventas"]

-

$compras["compras"];


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">

<div class="card-header">

Utilidades

</div>


<div class="card-body">


<h3>

Ventas:

<?=formatoDinero($datos["ventas"])?>

</h3>


<h3>

Compras:

<?=formatoDinero($compras["compras"])?>

</h3>


<hr>


<h2 class="text-success">

Utilidad:

<?=formatoDinero($utilidad)?>

</h2>


</div>

</div>


</div>