<?php


function limpiar($dato){

    return htmlspecialchars(
        trim($dato),
        ENT_QUOTES,
        "UTF-8"
    );

}



function redireccionar($url){

    header(
        "Location: ".$url
    );

    exit();

}



function generarCodigo($prefijo="CEL"){


    return $prefijo .
    "-" .
    date("YmdHis") .
    rand(100,999);


}



function formatoFecha($fecha){

    return date(
        "d/m/Y",
        strtotime($fecha)
    );

}




function formatoDinero($valor){


    return SIMBOLO_MONEDA .
    number_format(
        $valor,
        0,
        ",",
        "."
    );


}



function subirArchivo(
    $archivo,
    $carpeta
){


    if(
        !isset($archivo["name"])
    ){

        return false;

    }



    $nombre = time()
    ."_"
    .$archivo["name"];



    $ruta =
    $carpeta.$nombre;



    if(
        move_uploaded_file(
            $archivo["tmp_name"],
            $ruta
        )
    ){

        return $nombre;

    }



    return false;


}



?>