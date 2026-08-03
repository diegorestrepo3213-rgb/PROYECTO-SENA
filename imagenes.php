<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



if($_FILES["imagen"]){


$nombre=time()

."_".$_FILES["imagen"]["name"];



move_uploaded_file(

$_FILES["imagen"]["tmp_name"],

"../assets/uploads/".$nombre

);



$stmt=$conexion->prepare(

"INSERT INTO productos_imagenes

(id_producto,imagen)

VALUES(?,?)"

);


$stmt->execute([

$id,

$nombre

]);


}


?>


<form method="POST"

enctype="multipart/form-data">


<input type="file"

name="imagen">


<button>

Subir

</button>


</form>