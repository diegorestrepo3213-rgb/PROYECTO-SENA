<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"];



if($_POST){


$sql="

UPDATE productos SET

nombre=?,

descripcion=?,

precio=?,

costo=?,

stock=?

WHERE id_producto=?

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["descripcion"],

$_POST["precio"],

$_POST["costo"],

$_POST["stock"],

$id


]);



header("Location:index.php");

exit();


}



$stmt=$conexion->prepare(

"SELECT *

FROM productos

WHERE id_producto=?"

);


$stmt->execute([$id]);


$producto=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Editar producto

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-3"

name="nombre"

value="<?=$producto['nombre']?>">



<textarea class="form-control mb-3"

name="descripcion">

<?=$producto['descripcion']?>

</textarea>



<input class="form-control mb-3"

name="precio"

value="<?=$producto['precio']?>">



<input class="form-control mb-3"

name="costo"

value="<?=$producto['costo']?>">



<input class="form-control mb-3"

name="stock"

value="<?=$producto['stock']?>">



<button class="btn btn-success">

Actualizar

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>