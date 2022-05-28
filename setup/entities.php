<?php
require_once __DIR__."/../api/connection.php";
$entities = json_decode(file_get_contents(__DIR__."/data/entities.json"));

try {
    $inserUserSQL = 'INSERT INTO 
    `ENTIDADES`(
        `EMAIL`, `PASSWORD`, `NUM_DOCUMENTO`, 
        `TIPO_DOCUMENTO`, `RAZON_SOCIAL`, 
        `TIPO`, `DIRECCION`, 
        `NOMBRE`, `IMG_URL`
    ) 
    VALUES ';

    foreach ($entities as $entity) {
        $PASSWORD = $entity->PASSWORD ? password_hash($entity->PASSWORD, PASSWORD_DEFAULT) : "";
        $inserUserSQL .= "(
            '$entity->EMAIL', 
            '$PASSWORD', 
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
    echo "correcto!";
} catch(PDOException $e) {
    echo $e->getMessage();
}