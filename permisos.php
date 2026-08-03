<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();



$id=$_GET["id"];



$listaPermisos=[


"dashboard",

"usuarios",

"roles",

"clientes",

"proveedores",

"productos",

"inventario",

"compras",

"ventas",

"caja",

"bancos",

"contabilidad",

"reportes"


];




if($_POST){



$conexion->prepare(

"DELETE FROM roles_permisos

WHERE id_rol=?"

)

->execute([$id]);




foreach($_POST["permiso"] as $permiso){



$stmt=$conexion->prepare(

"INSERT INTO roles_permisos

(

id_rol,

permiso

)

VALUES(?,?)

"

);



$stmt->execute([


$id,


$permiso


]);



}



}



?>


<?php include "../includes/header.php"; ?>
<?php include "../includes/navbar.php"; ?>
<?php include "../includes/sidebar.php"; ?>


<div class="content">


<div class="card">


<div class="card-header">

Permisos del rol

</div>


<div class="card-body">


<form method="POST">



<?php foreach($listaPermisos as $p): ?>


<div class="form-check mb-2">


<input

class="form-check-input"

type="checkbox"

name="permiso[]"

value="<?=$p?>"

>


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