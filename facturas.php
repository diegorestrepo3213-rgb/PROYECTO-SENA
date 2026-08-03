<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"];



$stmt=$conexion->prepare(

"

SELECT

ventas.*,

clientes.nombre


FROM ventas


INNER JOIN clientes

ON clientes.id_cliente=
ventas.id_cliente


WHERE id_venta=?

"

);



$stmt->execute([$id]);


$v=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Factura venta #<?=$id?>

</div>


<div class="card-body">


<h3>

Celustar Web

</h3>


Cliente:

<?=$v["nombre"]?>


<br><br>


Total:

<?=formatoDinero($v["total"])?>



<br><br>


<button onclick="window.print()"

class="btn btn-success">

Imprimir factura

</button>


</div>


</div>


</div>