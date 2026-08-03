<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



if($_POST){


$sql="

UPDATE proveedores SET

nombre=?,

nit=?,

contacto=?,

telefono=?,

email=?,

direccion=?,

estado=?

WHERE id_proveedor=?

";



$stmt=$conexion->prepare($sql);



$stmt->execute([


$_POST["nombre"],

$_POST["nit"],

$_POST["contacto"],

$_POST["telefono"],

$_POST["email"],

$_POST["direccion"],

$_POST["estado"],

$id


]);



header("Location:index.php");

exit();


}



$stmt=$conexion->prepare(

"SELECT *

FROM proveedores

WHERE id_proveedor=?"

);


$stmt->execute([$id]);


$proveedor=$stmt->fetch();


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Editar proveedor

</div>


<div class="card-body">


<form method="POST">


<input

class="form-control mb-3"

name="nombre"

value="<?=$proveedor['nombre']?>">



<input

class="form-control mb-3"

name="nit"

value="<?=$proveedor['nit']?>">



<input

class="form-control mb-3"

name="contacto"

value="<?=$proveedor['contacto']?>">



<input

class="form-control mb-3"

name="telefono"

value="<?=$proveedor['telefono']?>">



<input

class="form-control mb-3"

name="email"

value="<?=$proveedor['email']?>">



<input

class="form-control mb-3"

name="direccion"

value="<?=$proveedor['direccion']?>">



<select

class="form-control mb-3"

name="estado">


<option value="1">

Activo

</option>


<option value="0">

Inactivo

</option>


</select>



<button class="btn btn-success">

Actualizar

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>