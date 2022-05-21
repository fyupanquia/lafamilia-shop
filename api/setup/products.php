<?php
include('../connection.php');
$products = json_decode(file_get_contents("products.json"));

try {
    $insertSQL = 'INSERT INTO 
    `PRODUCTOS`(
        `NOMBRE`,
        `DESCRIPCION`,
        `PRECIO`,
        `ULTIMO_PRECIO`,
        `IMG_URL`,
        `CATEGORIA`,
        `BADGE`,
        `GRUPO`
    ) 
    VALUES ';

    foreach ($products as $product){
        $insertSQL .= "(
            '$product->NAME', 
            '$product->DESCRIPTION', 
            '$product->CURRENT_PRICE',
            '$product->LAST_PRICE',
            '$product->IMG_URL',
            '$product->CATEGORY',
            '$product->BADGE',
            '$product->GROUP'),";
    }
    $bd = getConnection();
    $rsp = $bd->exec(substr($insertSQL, 0, -1));
    print_r($rsp);     
} catch(PDOException $e) {
    echo $e->getMessage();
}