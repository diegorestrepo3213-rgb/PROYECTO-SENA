<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$productos=$conexion->query(

"SELECT * FROM productos ORDER BY stock ASC"

)->fetchAll();


?>


<?php include "../includes/header.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Stock actual

</div>


<div class="card-body">


<table class="table">


<tr>

<th>Producto</th>

<th>Stock</th>

</tr>



<?php foreach($productos as $p): ?>


<tr>


<td>

<?=$p["nombre"]?>

</td>


<td>


<?php if($p["stock"]<=5): ?>


<span class="badge bg-danger">

<?=$p["stock"]?>

</span>


<?php else: ?>


<span class="badge bg-success">

<?=$p["stock"]?>

</span>


<?php endif; ?>


</td>


</tr>


<?php endforeach; ?>


</table>


</div>


</div>


</div>