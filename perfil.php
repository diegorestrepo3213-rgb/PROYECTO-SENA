<?php

require_once "../config/config.php";
require_once "../config/sesiones.php";
require_once "../config/conexion.php";


verificarSesion();


$id=$_GET["id"] ?? $_SESSION["id_usuario"];


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

Perfil usuario

</div>


<div class="card-body">


<h3>

<?=$usuario["nombre"]?>

</h3>


<p>

Usuario:
<?=$usuario["usuario"]?>

</p>


<p>

Correo:
<?=$usuario["email"]?>

</p>


</div>


</div>


</div>


<?php include "../includes/footer.php"; ?>