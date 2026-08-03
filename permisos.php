<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"];



if($_POST){


$conexion->prepare(

"DELETE FROM permisos_usuario 
WHERE id_usuario=?"

)->execute([$id]);



foreach($_POST["permiso"] as $p){


$stmt=$conexion->prepare(

"INSERT INTO permisos_usuario

(id_usuario,permiso)

VALUES(?,?)"

);



$stmt->execute([

$id,

$p

]);


}



}



$permisos=[

"usuarios",

"clientes",

"productos",

"inventario",

"ventas",

"compras",

"reportes"

];


?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Permisos usuario

</div>


<div class="card-body">


<form method="POST">


<?php foreach($permisos as $p): ?>


<div class="form-check">


<input

class="form-check-input"

type="checkbox"

name="permiso[]"

value="<?=$p?>">


<label class="form-check-label">

<?=$p?>

</label>


</div>


<?php endforeach; ?>


<br>


<button class="btn btn-success">

Guardar permisos

</button>


</form>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>