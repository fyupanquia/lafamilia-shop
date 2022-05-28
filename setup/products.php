<?php
require_once __DIR__."/../api/connection.php";
$products = json_decode(file_get_contents(__DIR__."/data/products.json"));

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
        `GRUPO`,
        `STOCK`
    ) 
    VALUES ';

    foreach ($products as $product){
        $STOCK = $product->STOCK ? $product->STOCK : 10;
        $insertSQL .= "(
            '$product->NAME', 
            '$product->DESCRIPTION', 
            '$product->CURRENT_PRICE',
            '$product->LAST_PRICE',
            '$product->IMG_URL',
            '$product->CATEGORY',
            '$product->BADGE',
            '$product->GROUP',
            '$STOCK'),";
    }
    $bd = getConnection();
    $rsp = $bd->exec(substr($insertSQL, 0, -1));
    echo "correcto!";
} catch(PDOException $e) {
    echo $e->getMessage();
}