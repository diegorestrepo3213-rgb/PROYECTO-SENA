<?php


function alerta($tipo,$mensaje){


?>

<div class="alert alert-<?=$tipo?> alert-dismissible fade show">


<?=$mensaje?>


<button 
type="button"
class="btn-close"
data-bs-dismiss="alert">

</button>


</div>


<?php

}




function alertaExito($mensaje){

    alerta(
        "success",
        $mensaje
    );

}



function alertaError($mensaje){

    alerta(
        "danger",
        $mensaje
    );

}



function alertaInfo($mensaje){

    alerta(
        "info",
        $mensaje
    );

}



?>