<?php
require_once __DIR__ . '/connection.php';

function getProviders(){
    $db = getConnection();
    $stmt = $db->prepare("SELECT `RAZON_SOCIAL`, `IMG_URL` 
                            FROM `ENTIDADES` 
                            WHERE TIPO='PROVEEDOR';");
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);
}