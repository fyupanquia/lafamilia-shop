<?php
include('../connection.php');
$entities = json_decode(file_get_contents("entities.json"));

try {
    $inserUserSQL = 'INSERT INTO 
    `ENTIDADES`(`EMAIL`, `PASSWORD`, `NUM_DOCUMENTO`, `TIPO_DOCUMENTO`, `RAZON_SOCIAL`, `TIPO`, `DIRECCION`, `NOMBRE`, `IMG_URL`) 
    VALUES ';

    foreach ($entities as $entity){
        $inserUserSQL .= "(
            '$entity->EMAIL', 
            '$entity->PASSWORD', 
            '$entity->NUM_DOCUMENTO',
            '$entity->TIPO_DOCUMENTO',
            '$entity->RAZON_SOCIAL',
            '$entity->TIPO',
            '$entity->DIRECCION',
            '$entity->NOMBRE',
            '$entity->IMG_URL'),";
    }
    $bd = getConnection();
    $rsp = $bd->exec(substr($inserUserSQL, 0, -1));
    print_r($rsp);     
} catch(PDOException $e) {
    echo $e->getMessage();
}