<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();



$sql="
SELECT

productos.*,

categorias.nombre AS categoria,

marcas.nombre AS marca


FROM productos


LEFT JOIN categorias

ON productos.id_categoria=categorias.id_categoria



LEFT JOIN marcas

ON productos.id_marca=marcas.id_marca



ORDER BY productos.id_producto DESC

";


$stmt=$conexion->prepare($sql);

$stmt->execute();


$productos=$stmt->fetchAll();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="d-flex justify-content-between mb-3">


<h2>

Productos

</h2>


<a href="crear.php"

class="btn btn-success">

Nuevo producto

</a>


</div>



<div class="card">


<div class="card-header">

Inventario de productos

</div>


<div class="card-body">


<table class="table table-striped">


<thead>

<tr>

<th>ID</th>

<th>Producto</th>

<th>Categoría</th>

<th>Marca</th>

<th>Precio</th>

<th>Stock</th>

<th>Acciones</th>


</tr>

</thead>


<tbody>


<?php foreach($productos as $p): ?>


<tr>


<td>

<?=$p["id_producto"]?>

</td>


<td>

<?=$p["nombre"]?>

</td>


<td>

<?=$p["categoria"]?>

</td>


<td>

<?=$p["marca"]?>

</td>


<td>

<?=formatoDinero($p["precio"])?>

</td>


<td>

<?=$p["stock"]?>

</td>


<td>


<a href="editar.php?id=<?=$p['id_producto']?>"

class="btn btn-primary btn-sm">

Editar

</a>


<a href="imagenes.php?id=<?=$p['id_producto']?>"

class="btn btn-dark btn-sm">

Imagen

</a>


<a href="codigos.php?id=<?=$p['id_producto']?>"

class="btn btn-success btn-sm">

Código

</a>


<a href="eliminar.php?id=<?=$p['id_producto']?>"

onclick="return confirmarEliminar()"

class="btn btn-danger btn-sm">

Eliminar

</a>


</td>


</tr>


<?php endforeach; ?>


</tbody>


</table>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>