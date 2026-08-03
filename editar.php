<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



if($_POST){


$sql="

UPDATE roles SET

nombre=?,

descripcion=?

WHERE id_rol=?

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],


$_POST["descripcion"],


$id


]);



header("Location:index.php");

exit();


}



$stmt=$conexion->prepare(

"SELECT * FROM roles WHERE id_rol=?"

);


$stmt->execute([$id]);


$rol=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Editar rol

</div>



<div class="card-body">


<form method="POST">


<input

class="form-control mb-3"

name="nombre"

value="<?=$rol['nombre']?>">


<textarea

class="form-control mb-3"

name="descripcion">

<?=$rol['descripcion']?>

</textarea>



<button class="btn btn-success">

Actualizar

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>