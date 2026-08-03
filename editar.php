<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";

verificarSesion();


$id=$_GET["id"];



if($_POST){


$sql="
UPDATE usuarios SET

nombre=?,

usuario=?,

email=?,

id_rol=?,

estado=?

WHERE id_usuario=?

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["usuario"],

$_POST["email"],

$_POST["rol"],

$_POST["estado"],

$id


]);


header("Location:index.php");

exit();


}



$stmt=$conexion->prepare(

"SELECT * FROM usuarios WHERE id_usuario=?"

);


$stmt->execute([$id]);


$usuario=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Editar usuario

</div>


<div class="card-body">


<form method="POST">


<input class="form-control mb-3"

name="nombre"

value="<?=$usuario['nombre']?>">


<input class="form-control mb-3"

name="usuario"

value="<?=$usuario['usuario']?>">


<input class="form-control mb-3"

name="email"

value="<?=$usuario['email']?>">


<select class="form-control mb-3"

name="estado">


<option value="1">

Activo

</option>


<option value="0">

Inactivo

</option>


</select>


<input type="hidden"

name="rol"

value="<?=$usuario['id_rol']?>">


<button class="btn btn-success">

Actualizar

</button>


</form>


</div>

</div>


</div>


<?php include "../includes/footer.php"; ?>