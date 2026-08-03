<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



if($_POST){



$sql="

INSERT INTO productos

(

nombre,

descripcion,

id_categoria,

id_marca,

id_modelo,

precio,

costo,

stock,

codigo,

estado

)

VALUES

(?,?,?,?,?,?,?,?,?,1)

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["descripcion"],

$_POST["categoria"],

$_POST["marca"],

$_POST["modelo"],

$_POST["precio"],

$_POST["costo"],

$_POST["stock"],

$_POST["codigo"]


]);



header("Location:index.php");

exit();


}



$categorias=$conexion->query(

"SELECT * FROM categorias"

)->fetchAll();



$marcas=$conexion->query(

"SELECT * FROM marcas"

)->fetchAll();



$modelos=$conexion->query(

"SELECT * FROM modelos"

)->fetchAll();



?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Nuevo producto

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-3"

name="nombre"

placeholder="Nombre producto"

required>



<textarea class="form-control mb-3"

name="descripcion"

placeholder="Descripción">

</textarea>



<select class="form-control mb-3"

name="categoria">


<?php foreach($categorias as $c): ?>

<option value="<?=$c['id_categoria']?>">

<?=$c["nombre"]?>

</option>

<?php endforeach; ?>


</select>



<select class="form-control mb-3"

name="marca">


<?php foreach($marcas as $m): ?>

<option value="<?=$m['id_marca']?>">

<?=$m["nombre"]?>

</option>

<?php endforeach; ?>


</select>



<select class="form-control mb-3"

name="modelo">


<?php foreach($modelos as $m): ?>

<option value="<?=$m['id_modelo']?>">

<?=$m["nombre"]?>

</option>

<?php endforeach; ?>


</select>



<input class="form-control mb-3"

name="precio"

placeholder="Precio venta">



<input class="form-control mb-3"

name="costo"

placeholder="Costo">



<input class="form-control mb-3"

name="stock"

placeholder="Stock">



<input class="form-control mb-3"

name="codigo"

placeholder="Código barras">



<button class="btn btn-success">

Guardar

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>